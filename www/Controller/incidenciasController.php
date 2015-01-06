<?php
	require_once("../Model/incidencia.php");
	include_once 'bdController.php';

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
		case 'contarPendientes':
			contarPendientes();
			break;
		default:
			break;
	}

	function alta(){
		session_start();

		$incidencia = new Incidencia($_POST["idIncidencia"], $_POST["fechaApertura"], $_POST["fechaCierre"], $_POST["dniResponsable"], $_POST["dniApertura"],
										$_POST["idMaquina"],  $_POST["estadoIncidencia"], $_POST["derivada"], $_POST['descripcion']);
		$incidencia->alta();
		$tempIncidencia = $_POST["idIncidencia"];
		header("location: incidenciasController.php?accion=Consulta&idIncidencia=$tempIncidencia");
	}

	function consulta(){
		session_start();

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
				session_write_close();
				header("location: ../View/incidencias/consultarJefe.php");
				break;
			case 'I':
				header("location: ../View/incidencias/consultarInterno.php");
				session_write_close();
				break;
			case 'E':
				header("location: ../View/incidencias/consultarExterno.php");
				session_write_close();
			default:				
				break;
		}
	}

	function modificar(){
		session_start();

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
				session_write_close();
				header("location: ../View/incidencias/modificarJefe.php");
				break;
			case 'I':
				header("location: ../View/incidencias/modificarInterno.php");
				session_write_close();
				break;
			case 'E':
				header("location: ../View/incidencias/modificarExterno.php");
				session_write_close();
			default:				
				break;
		}
	}

	function modificado(){
		session_start();
		
		$idIncidencia = $_POST['idIncidencia'];
		$derivada = $_POST['derivada'];
		$dniApertura = $_POST['dniApertura'];
		$dniResponsable = $_POST['dniResponsable'];
		$fechaApertura = $_POST['fechaApertura'];
		$fechaCierre = $_POST['fechaCierre'];
		$estadoIncidencia = $_POST['estadoIncidencia'];
		$idMaquina = $_POST['idMaquina'];
		$descripcion = $_POST['descripcion'];

		$incidencia = new Incidencia($idIncidencia, $fechaApertura, $fechaCierre, $dniResponsable, $dniApertura, 
									$idMaquina, $estadoIncidencia, $derivada, $descripcion);
		$incidencia->modificacion($idIncidencia);

		header("location: ../../Controller/incidenciasController.php?accion=Consulta&idIncidencia=$idIncidencia");
	}

	function lista(){
		session_start();

		$incidencia = new Incidencia();
		$listaIncidencias = $incidencia->lista();

		$lista = array();		
		while($row = mysql_fetch_array($listaIncidencias)){
			array_push($lista, $row);
		}

		$_SESSION["listaIncidencia"] = $lista;

		switch ($_SESSION['tipo']) {
			case 'J':
				session_write_close();
				header("location: ../View/incidencias/listarJefe.php");
				break;
			case 'I':
				header("location: ../View/incidencias/listarInterno.php");
				session_write_close();
				break;
			case 'E':
				header("location: ../View/incidencias/listarExterno.php");
				session_write_close();
			default:				
				break;
		}
	}

	function pendientes(){
		session_start();

		$incidencia = new Incidencia();
		$listaIncidencias = $incidencia->pendientes();

		$lista = array();		
		while($row = mysql_fetch_array($listaIncidencias)){
			array_push($lista, $row);
		}

		$_SESSION["listaIncidencia"] = $lista;

		switch ($_SESSION['tipo']) {
			case 'J':
				session_write_close();
				header("location: ../View/incidencias/pendientesJefe.php");
				break;
			case 'I':
				header("location: ../View/incidencias/pendientesInterno.php");
				session_write_close();
				break;
			case 'E':
				header("location: ../View/incidencias/pendientesExterno.php");
				session_write_close();
			default:				
				break;
		}
	}

	function contarPendientes(){
		session_start();

		$incidencia = new Incidencia();
		$numero = $incidencia->contarPendientes();
		$result = mysql_fetch_array($numero);

		$_SESSION['pendientes'] = $result['num'];
	
		session_write_close();
	}
?>