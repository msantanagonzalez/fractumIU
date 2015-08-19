<?php
	require_once("../Model/iteracion.php");
	require_once 'bdController.php';

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
		case 'Modificar':
			modificar();
			break;
		case 'Listar':
			lista();
			break;
		case 'GUARDAR TRABAJO':
			modificado();
			break;
		case 'FINALIZAR TRABAJO':
			modificado();
			cerrarIteracion();
			break;
		case 'NEXTID':
			siguienteIteracion();
			break;
	}

	function alta(){
		//session_start();

		$iteracion2 = new Iteracion();
		$id = $iteracion2->nextId();
		$idI = $_POST["idIncid"];

		$iteracion = new Iteracion($idI, $id, $_POST["fechaIter"], $_POST["hInicio"], $_POST["hFin"],
										$_POST["estadoItera"],  $_POST["descripIter"], $_POST["costeIter"], $_SESSION['dni']);
		$iteracion->alta();
		
		header("location: iteracionesController.php?accion=Consulta&idIncid=$idI&nIteracion=$id");

	}

	function consulta(){
		//session_start();

		$idIncid = $_REQUEST['idIncid'];
		$nIteracion = $_REQUEST['nIteracion'];

		$iteracion = new Iteracion($idIncid, $nIteracion);
		$consultaIteracion = $iteracion->consulta();

		$consulta = array();		
		while($row = mysql_fetch_array($consultaIteracion)){
			array_push($consulta, $row);
		}

		$_SESSION["consultaIteracion"] = $consulta;

		switch ($_SESSION['tipo']) {
			case 'J':
				//session_write_close();
				header("location: ../View/iteraciones/consultarJefe.php");
				break;
			case 'I':
				header("location: ../View/iteraciones/consultarInterno.php");
				//session_write_close();
				break;
			case 'E':
				header("location: ../View/iteraciones/consultarExterno.php");
				//session_write_close();
			default:				
				break;
		}
	}

	function modificar(){
		//session_start();


		$idIteracion = $_REQUEST['idIncidencia'];
		$nIteracion = $_REQUEST['nIteracion'];
		
		$iteracion = new Iteracion($idIteracion, $nIteracion);
		$consultaIteracion = $iteracion->consulta();

		$consulta = array();		
		while($row = mysql_fetch_array($consultaIteracion)){
			array_push($consulta, $row);
		}

		$_SESSION["consultaIteracion"] = $consulta;

		switch ($_SESSION['tipo']) {
			case 'J':
				//session_write_close();
				header("location: ../View/iteraciones/modificarJefe.php");
				break;
			case 'I':
				//session_write_close();
				header("location: ../View/iteraciones/modificarInterno.php");
				break;
			case 'E':
				//session_write_close();
				header("location: ../View/iteraciones/modificarExterno.php");
			default:				
				break;
		}
	}

	function modificado(){
		//session_start();
		
		$idIncid = $_POST['idIncid'];
		$nIteracion = $_POST['nIteracion'];
		$fechaIter = $_POST['fechaIter'];
		$hInicio = $_POST['hInicio'];
		$hFin = $_POST['hFin'];
		$descripIter = $_POST['descripIter'];
		$costeIter = $_POST['costeIter'];
		

		$iteracion = new Iteracion($idIncid, $nIteracion, $fechaIter, $hInicio, $hFin, '', $descripIter, $costeIter);
		$iteracion->modificacion();

		header("location: iteracionesController.php?accion=Consulta&idIncid=$idIncid&nIteracion=$nIteracion");
	}

	function lista(){
		//session_start();
		$idIncid =$_REQUEST['idIncid'];
		$iteracion = new Iteracion($idIncid);
		$listaIteraciones = $iteracion->lista();

		$lista = array();		
		while($row = mysql_fetch_array($listaIteraciones)){
			array_push($lista, $row);
		}

		$_SESSION["listaIteraciones"] = $lista;

		switch ($_SESSION['tipo']) {
			case 'J':
				//session_write_close();
				header("location: ../View/incidencias/consultarJefe.php");
				break;
			case 'I':
				header("location: ../View/incidencias/consultarInterno.php");
				//session_write_close();
				break;
			case 'E':
				header("location: ../View/incidencias/consultarExterno.php");
				//session_write_close();
				break;
			default:					
				break;
		}
	}

	function cerrarIteracion(){
		//session_start();

		$idIncid = $_POST['idIncid'];
		$nIteracion = $_POST['nIteracion'];

		$iteracion = new Iteracion($idIncid, $nIteracion);
		$consultaIteracion = $iteracion->cerrarIteracion();
		//session_write_close();
		lista();

	}

	function siguienteIteracion(){
		//session_start();

		$idIncid = $_POST['idIncid'];
		$iteracion = new Iteracion($idIncid);

		$nIteracion = $iteracion->nextId();

		$_SESSION["idIncid"] = $idIncid;
		$_SESSION["nIteracion"] = $nIteracion;

		if($nIteracion == 1){
			header("location: ../../View/iteraciones/altaExterno.php");
		} else {
			header("location: ../../View/iteraciones/altaExterno.php");

		}
	}

?>