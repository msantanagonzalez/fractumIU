<?php
	require_once $_SESSION['cribPath'].'Model/incidencia.php';
	require_once $_SESSION['cribPath'].'Controller/bdController.php';

	if(isset($_GET['accion'])){	$accion = $_GET['accion']; }
	if(isset($_POST['accion'])){ $accion = $_POST['accion']; }

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
		case 'Pendientes':
			pendientes();
			break;
	}

	function alta(){
		//session_start();
		$incidencia = new Incidencia($_POST["idIncidencia"], $_POST["fechaApertura"], $_POST["fechaCierre"], $_POST["dniResponsable"], $_POST["dniApertura"], $_POST["idMaquina"],  $_POST["estadoIncidencia"], $_POST["derivada"], $_POST["descripIncid"], $_POST["cifEmpr"]);

		$incidencia->alta();
		lista();
	}

	function consulta(){
		//session_start();

		$incidencia = new Incidencia();

		$idIncidencia = $_REQUEST['idIncidencia'];
		$consultaIncidencia = $incidencia->consultaIncidencia($idIncidencia);

		$consulta = array();
		while($row = mysql_fetch_array($consultaIncidencia)){
			array_push($consulta, $row);
		}

		$_SESSION["consultaIncidencia"] = $consulta;

		switch ($_SESSION['tipo']) {
			case 'J':
				//session_write_close();
				header("location: iteracionesController.php?accion=Listar&idIncid=$idIncidencia");
				break;
			case 'I':
				//session_write_close();
				header("location: iteracionesController.php?accion=Listar&idIncid=$idIncidencia");
				break;
			case 'E':
				//session_write_close();
				header("location: iteracionesController.php?accion=Listar&idIncid=$idIncidencia");
				break;
			default:
				break;
		}
	}

	function modificar(){
		//session_start();

		$incidencia = new Incidencia();

		$idIncidencia = $_REQUEST['idIncidencia'];
		$consultaIncidencia = $incidencia->consultaIncidencia($idIncidencia);

		$consulta = array();
		while($row = mysql_fetch_array($consultaIncidencia)){
			array_push($consulta, $row);
		}

		$_SESSION["consultaIncidencia"] = $consulta;

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

		$incidencia = new Incidencia($idIncidencia, $fechaApertura, $fechaCierre, $dniResponsable, $dniApertura, $idMaquina, $estadoIncidencia, $derivada, $descripcion);

		$incidencia->modificacion($idIncidencia);
		header("location: incidenciasController.php?accion=Consulta&idIncidencia=$idIncidencia");
	}

	function lista(){
		//session_start();
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

	function pendientes(){
		//session_start();

		$tipo = $_SESSION['tipo'];

		$incidencia = new Incidencia();
		$listaIncidencias = $incidencia->pendientes($tipo);

		$lista = array();
		while($row = mysql_fetch_array($listaIncidencias)){
			array_push($lista, $row);
		}

		$_SESSION["listaIncidencia"] = $lista;

		switch ($_SESSION['tipo']) {
			case 'J':
				//session_write_close();
				header("location: ../View/incidencias/pendientesJefe.php");
				break;
			case 'I':
				header("location: ../View/incidencias/pendientesInterno.php");
				//session_write_close();
				break;
			case 'E':
				header("location: ../View/incidencias/pendientesExterno.php");
				//session_write_close();
			default:
				break;
		}
	}
?>
