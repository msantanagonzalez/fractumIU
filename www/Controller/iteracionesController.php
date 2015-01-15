<?php
	require_once("../Model/iteracion.php");
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
		case 'Modificado':
			modificado();
			break;
		case 'Listar':
			lista();
			break;
		case 'GUARDAR TRABAJO':
			guardarTrabajo();
			break;
		case 'FINALIZAR TRABAJO':
			guardarTrabajo();
			cerrarIteracion();
			break;
	}

	function alta(){
		session_start();

		$iteracion = new Iteracion($_POST["idIncid"], $_POST["nIteracion"], $_POST["fechaIter"], $_POST["hInicio"], $_POST["hFin"],
										$_POST["estadoItera"],  $_POST["descripIter"], $_POST["costeIter"]);
		$iteracion->alta();
		$tempIteracion = $_POST["idIncid"];
		$nIteracion = $_POST['nIteracion'];
		header("location: iteracionesController.php?accion=Consulta&idIncidencia=$tempITERACION&nIteracion=$nIteracion");
	}

	function consulta(){
		session_start();

		$idIncid = $_REQUEST['idIncid'];
		$nIteracion = $_REQUEST['nIteracion'];

		$iteracion = new Iteracion($idIncid, $nIteracion);
		$consultaIncidencia = $incidencia->consultaIncidencia();

		$consulta = array();		
		while($row = mysql_fetch_array($consultaIncidencia)){
			array_push($consulta, $row);
		}

		$_SESSION["consultaIteracion"] = $consulta;

		switch ($_SESSION['tipo']) {
			case 'J':
				session_write_close();
				header("location: ../View/iteraciones/consultarJefe.php");
				break;
			case 'I':
				header("location: ../View/iteraciones/consultarInterno.php");
				session_write_close();
				break;
			case 'E':
				header("location: ../View/iteraciones/consultarExterno.php");
				session_write_close();
			default:				
				break;
		}
	}

	function modificar(){
		session_start();


		$idIteracion = $_REQUEST['idIncid'];
		$nIteracion = $_REQUEST['nIteracion'];
		
		$iteracion = new Iteracion($idIncidencia, $nIteracion);
		$consultaIteracion = $iteracion->consultaIteracion();

		$consulta = array();		
		while($row = mysql_fetch_array($consultaIteracion)){
			array_push($consulta, $row);
		}

		$_SESSION["consultaIteracion"] = $consulta;

		switch ($_SESSION['tipo']) {
			case 'J':
				session_write_close();
				header("location: ../View/iteraciones/modificarJefe.php");
				break;
			case 'I':
				header("location: ../View/iteraciones/modificarInterno.php");
				session_write_close();
				break;
			case 'E':
				header("location: ../View/iteraciones/modificarExterno.php");
				session_write_close();
			default:				
				break;
		}
	}

	function modificado(){
		session_start();
		
		$idIncid = $_POST['idIncid'];
		$nIteracion = $_POST['nIteracion'];
		$fechaIter = $_POST['fechaIter'];
		$hInicio = $_POST['hInicio'];
		$hFin = $_POST['hFin'];
		$estadoItera = $_POST['estadoItera'];
		$descripIter = $_POST['descripIter'];
		$costeIter = $_POST['costeIter'];
		

		$iteracion = new Iteracion($idIncid, $nIteracion, $fechaIter, $hInicio, $hFin, $estadoItera, $descripIter, $costeIter);
		$iteracion->modificacion($idIncid, $nIteracion);

		header("location: ../Controller/iteracionesController.php?accion=Consulta&idIncidencia=$idIncidencian&nIteracion=$nIteracion"); /*otra vz aqui*/
	}

	function lista(){
		session_start();

		$iteracion = new Iteracion();
		$listaIteraciones = $iteracion->lista();

		$lista = array();		
		while($row = mysql_fetch_array($listaIteraciones)){
			array_push($lista, $row);
		}

		$_SESSION["listaIteraciones"] = $lista;

		switch ($_SESSION['tipo']) {
			case 'J':
				session_write_close();
				header("location: ../View/iteraciones/listarJefe.php");
				break;
			case 'I':
				session_write_close();
				header("location: ../View/iteraciones/listarInterno.php");
				break;
			case 'E':
				session_write_close();
				header("location: ../View/iteraciones/listarExterno.php");
			default:				
				break;
		}
	}

	function guardarTrabajo(){
		session_start();

		$idIncid = $_POST['idIncid'];
		$nIteracion = $_POST['nIteracion'];

		$iteracion = new Iteracion($idIncid, $nIteracion);
		$consultaIteracion = $iteracion->cerrarIteracion();
		session_write_close();
		lista();
	}

	function cerrarIteracion(){
		session_start();

		$idIncid = $_POST['idIncid'];
		$nIteracion = $_POST['nIteracion'];

		$iteracion = new Iteracion($idIncid, $nIteracion);
		$consultaIteracion = $iteracion->cerrarIteracion();
		session_write_close();
		lista();

	}

?>