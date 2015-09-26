<?php
	require_once $_SESSION['cribPath'].'Model/incidencia.php';
	require_once $_SESSION['cribPath'].'Model/interno.php';
	require_once $_SESSION['cribPath'].'Model/empresa.php';
	require_once $_SESSION['cribPath'].'Controller/bdController.php';

	if(isset($_GET['accion'])){	$accion = $_GET['accion']; }
	if(isset($_POST['accion'])){ $accion = $_POST['accion']; }

if(isset($accion)){
	switch ($accion) {
		case 'Alta':
			alta();
			break;
		case 'Consulta':
			consulta();
			break;
		case 'Modificar':
			modificar();
			break;
		case 'Modificado':
			modificado();
			break;
		case 'Listar':
			lista();
			break;
		case 'pendiente':
			pendientes();
			break;
		default:
			break;
	}
}


	function alta(){
		//session_start();
		$incidencia = new Incidencia($_POST["idIncidencia"], $_POST["fechaApertura"], $_POST["fechaCierre"], $_POST["dniResponsable"], $_POST["dniApertura"], $_POST["idMaquina"],  $_POST["estadoIncidencia"], $_POST["derivada"], $_POST["descripIncid"], $_POST["cifEmpr"]);

		$incidencia->alta();
		lista();
	}

	function consulta(){
		//session_start();
		$idIncidencia = $_GET['idIncidencia'];

		$incidencia = new Incidencia();

		$consulta = array();
		$consultaIncidencia = $incidencia->consultaIncidencia($idIncidencia);

		while($row = mysql_fetch_array($consultaIncidencia)){
			$_SESSION["consultaServicios"] = $incidencia->hasServicios($row['idMaq']);
			array_push($consulta, $row);
		}

		$_SESSION["consultaIncidencia"] = $consulta;

		switch ($_SESSION['tipo']) {
			case 'J':
				//session_write_close();
				header("location: iteracionesController.php?accion=listarIteracion&idIncid=$idIncidencia");
				break;
			case 'I':
				//session_write_close();
				header("location: iteracionesController.php?accion=listarIteracion&idIncid=$idIncidencia");
				break;
			case 'E':
				//session_write_close();
				header("location: iteracionesController.php?accion=listarIteracion&idIncid=$idIncidencia");
				break;
			default:
				break;
		}
	}

	function modificar(){
		//session_start();

		$idIncidencia = $_GET['idIncidencia'];

		$incidencia = new Incidencia();

		$consulta = array();
		$consultaIncidencia = $incidencia->consultaIncidencia($idIncidencia);
		while($row = mysql_fetch_array($consultaIncidencia)){
			$_SESSION["consultaServicios"] = $incidencia->hasServicios($row['idMaq']);
			 array_push($consulta, $row);
		 }

		$_SESSION["consultaIncidencia"] = $consulta;

		$interno = new Interno("","","","","");

		$internos = array();
		$consultaInternos = $interno->listarInternos();
		while($row2 = mysql_fetch_array($consultaInternos)){
			array_push($internos, $row2);
		}

		$_SESSION['listaInternosJefe'] = $internos;

		$empresa = new Empresa("","","","");
		$empresas = array();

		$consultaEmpresas=$empresa->listarEmpresas();
		while($row2 = mysql_fetch_array($consultaEmpresas)){
			array_push($empresas, $row2);
		}

		$_SESSION['listaEmpresasJefe'] = $empresas;

		switch ($_SESSION['tipo']) {
			case 'J':
				//session_write_close();
				header("location: ../View/incidencias/modificarJefe.php");
				break;
			case 'I':
				header("location: ../View/incidencias/modificarInterno.php");
				//session_write_close();
				break;
			case 'E':
				header("location: ../View/incidencias/modificarExterno.php");
				//session_write_close();
			default:
				break;
		}
	}

	function modificado(){
		//session_start();
		switch ($_SESSION['tipo']) {
			case 'J':
				/*if($_POST['estadoIncidencia']=='Derivada'){
					$derivada = 1;
				} else $derivada = 0;*/

				if($_POST['cifEmpr']!='DEFAULT'){
					$derivada = 1;
					$estado = 'Derivada';
				}else{
					$derivada = 0;
					$estado = $_POST['estadoIncidencia'];
				}

				$idIncidencia = $_POST['idIncidencia'];
				$dniApertura = $_POST['dniApertura'];
				$dniResponsable = $_POST['dniResponsable'];
				$fechaApertura = $_POST['fechaApertura'];
				$fechaCierre = $_POST['fechaCierre'];
				$estadoIncidencia = $estado;
				$idMaquina = $_POST['idMaquina'];
				$descripcion = $_POST['descripcion'];
				$cifEmpr = $_POST['cifEmpr'];

				$incidencia = new Incidencia($idIncidencia, $fechaApertura, $fechaCierre, $dniResponsable, $dniApertura, $idMaquina, $estadoIncidencia, $derivada, $descripcion,$cifEmpr);

				$incidencia->modificacion($idIncidencia);
				header("location: incidenciasController.php?accion=Consulta&idIncidencia=$idIncidencia");
				break;
			case 'I':
				if($_POST['estadoIncidencia']=='Derivada'){
					$derivada = 1;
				} else $derivada = 0;

				$idIncidencia = $_POST['idIncidencia'];
				$dniApertura = $_POST['dniApertura'];
				$dniResponsable = $_POST['dniResponsable'];
				$fechaApertura = $_POST['fechaApertura'];
				$fechaCierre = $_POST['fechaCierre'];
				$estadoIncidencia = $_POST['estadoIncidencia'];
				$idMaquina = $_POST['idMaquina'];
				$descripcion = $_POST['descripcion'];
				$cifEmpr = $_POST['cifEmpr'];

				$incidencia = new Incidencia($idIncidencia, $fechaApertura, $fechaCierre, $dniResponsable, $dniApertura, $idMaquina, $estadoIncidencia, $derivada, $descripcion,$cifEmpr);

				$incidencia->modificacion($idIncidencia);
				header("location: incidenciasController.php?accion=Consulta&idIncidencia=$idIncidencia");
				break;
			case 'E':
				if($_POST['estadoIncidencia']=='Pendiente Cierre'){
					$derivada = 0;
				} else $derivada = 1;

				$idIncidencia = $_POST['idIncidencia'];
				$dniApertura = $_POST['dniApertura'];
				$dniResponsable = $_POST['dniResponsable'];
				$fechaApertura = $_POST['fechaApertura'];
				$fechaCierre = $_POST['fechaCierre'];
				$estadoIncidencia = $_POST['estadoIncidencia'];
				$idMaquina = $_POST['idMaquina'];
				$descripcion = $_POST['descripcion'];
				$cifEmpr = $_POST['cifEmpr'];

				$incidencia = new Incidencia($idIncidencia, $fechaApertura, $fechaCierre, $dniResponsable, $dniApertura, $idMaquina, $estadoIncidencia, $derivada, $descripcion,$cifEmpr);

				$incidencia->modificacion($idIncidencia);
				header("location: incidenciasController.php?accion=Consulta&idIncidencia=$idIncidencia");
				break;
			default:
				break;
			}
	}

	function pendientes(){

		$incidencia = new Incidencia();

		switch ($_SESSION['tipo']){
			case 'J':
				$arrayPendientesJefe = array();
				$listaPendJefe = $incidencia->listaPendientesJefe();
				while($data = mysql_fetch_array($listaPendJefe)){array_push($arrayPendientesJefe, $data);}
				$_SESSION['PendsJefe'] = mysql_num_rows($listaPendJefe);
				$_SESSION['pendientesJefe'] = $arrayPendientesJefe;
				break;
			case 'I':
				$dniUsu = $_SESSION['dni'];
				$listaPendientes = array();
				$listaPend = $incidencia->listaPendientesInterno($dniUsu);
				while($row = mysql_fetch_array($listaPend)){array_push($listaPendientes, $row);}
				$_SESSION['cantPendientes'] = mysql_num_rows($listaPend);
				$_SESSION['pendientesInterno'] = $listaPendientes;
				break;
			case 'E':
				$dniUsu = $_SESSION['dni'];
				$listaPendientes = array();
				$listaPend = $incidencia->listaPendientesExterno();
				while($row = mysql_fetch_array($listaPend)){array_push($listaPendientes, $row);}
				$_SESSION['cantPendientesE'] = mysql_num_rows($listaPend);
				$_SESSION['pendientesExterno'] = $listaPendientes;
				break;
			default:
				break;
			}

		//header("location: ../View/incidencias/pendientesInterno.php");

	}

	function lista(){
		//session_start();
		$responsables = new interno("", "", "", "", "");

		$consultaResp = array();
		$consultaResponsables = $responsables->listarInternos();
		while($row = mysql_fetch_array($consultaResponsables)){ array_push($consultaResp, $row); }

		$_SESSION["consultaResponsables"] = $consultaResp;


		$incidencia = new Incidencia();

		switch ($_SESSION['tipo']) {
			case 'J':
				$listaIncidencias = $incidencia->lista();
				$lista = array();
				while($row = mysql_fetch_array($listaIncidencias)){
					array_push($lista, $row);
				}

				$_SESSION["listaIncidencia"] = $lista;
				header("location: ../View/incidencias/listarJefe.php");
				break;
			case 'I':
				$listaIncidencias = $incidencia->lista();
				$lista = array();
				while($row = mysql_fetch_array($listaIncidencias)){
					array_push($lista, $row);
				}

				$_SESSION["listaIncidenciasI"] = $lista;
				header("location: ../View/incidencias/listarInterno.php");
				break;
			case 'E':
				$listaIncidencia1 = $incidencia->listaIncidenciasOpE();
				$lista1 = array();

				while($row = mysql_fetch_array($listaIncidencia1)){
					array_push($lista1, $row);
				}
				$_SESSION["listaIncidencia1"] = $lista1;
				header("location: ../View/incidencias/listarExterno.php");
				break;
			default:
				break;
		}
	}
?>
