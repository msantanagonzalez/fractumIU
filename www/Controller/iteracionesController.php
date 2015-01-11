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
		case 'Modificar':
			modificar();
			break;
		case 'Listar':
			lista();
			break;
	}

	function alta(){
		session_start();

		$iteracion = new Iteracion($_POST["idIncid"], $_POST["nIteracion"], $_POST["fechaIter"], $_POST["hInicio"], $_POST["hFin"],
										$_POST["estadoItera"],  $_POST["descripIter"], $_POST["costeIter"]);
		$iteracion->alta();
		$tempIteracion = $_POST["idIncid"];
		header("location: iteracionesController.php?accion=Consulta&idIncidencia=$tempITERACION");/*Hay un problema aqui que no se resolver, y es que en las iteraciones tenemos que tener en cuenta no solo el idIncid sino tambien el nIteracion y no se como incluirlo*/
	}

	function consulta(){
		session_start();

		$iteracion = new Iteracion();

		$idIncid = $_REQUEST['idIncid'];
		$nIteracion = $_REQUEST['nIteracion'];
		$consultaIncidencia = $incidencia->consultaIncidencia($idIncid, $nIteracion);

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

		$iteracion = new Iteracion();

		$idIteracion = $_REQUEST['idIncid'];
		$nIteracion = $_REQUEST['nIteracion'];
		
		$consultaIteracion = $iteracion->consultaIteracion($idIncidencia, $nIteracion);

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
		

		$iteracion = new Iteracion($idIncid, $nIteracion, $fechaIter, $hInicio, $hFin, 
									$estadoItera, $descripIter, $costeIter);
		$iteracion->modificacion($idIncid, $nIteracion);

		header("location: ../../Controller/iteracionesController.php?accion=Consulta&idIncidencia=$idIncidencia"); /*otra vz aqui*/
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
				header("location: ../View/iteraciones/listarInterno.php");
				session_write_close();
				break;
			case 'E':
				header("location: ../View/iteraciones/listarExterno.php");
				session_write_close();
			default:				
				break;
		}
	}

?>