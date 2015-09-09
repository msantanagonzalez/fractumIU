<?php
	require_once $_SESSION['cribPath'].'Model/iteracion.php';
	require_once $_SESSION['cribPath'].'Controller/bdController.php';
	require_once $_SESSION['cribPath'].'Model/incidencia.php';

	if(isset($_GET['accion'])){	$accion = $_GET['accion']; }
	if(isset($_POST['accion'])){ $accion = $_POST['accion']; }

	switch ($accion) {
		case 'altaIteracion':
			altaIteracion();
			break;
		case 'consultaIteracion':
			consultaIteracion();
			break;
		case 'modificadoIteracion':
			modificadoIteracion();
			break;
		case 'modificarIteracion':
			modificarIteracion();
			break;
		case 'listarIteracion':
			listaIteracion();
			break;
		case 'GUARDAR TRABAJO':
			modificadoIteracion();
			break;
		case 'FINALIZAR TRABAJO':
			modificadoIteracion();
			cerrarIteracion();
			break;
		case 'NEXTID':
			siguienteIteracion();
			break;
	}

	function altaIteracion(){
		//session_start();

		$iteracion2 = new Iteracion();
		$id = $iteracion2->nextId();
		$idI = $_POST["idIncid"];

		$iteracion = new Iteracion($idI, $id, $_POST["fechaIter"], $_POST["hInicio"], $_POST["hFin"],
										$_POST["estadoItera"],  $_POST["descripIter"], $_POST["costeIter"], $_SESSION['dni']);
		$iteracion->alta();
		
		modEstadoIncidencia();
		listaIteracion();
	}

	function consultaIteracion(){
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

	function modificarIteracion(){
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

	function modificadoIteracion(){
		//session_start();

		$idIncid = $_POST['idIncid'];
		$estadoIter = $_POST['estadoItera'];
		$nIteracion = $_POST['nIteracion'];
		$fechaIter = $_POST['fechaIter'];
		$hInicio = $_POST['hInicio'];
		$hFin = $_POST['hFin'];
		$descripIter = $_POST['descripIter'];
		$costeIter = $_POST['costeIter'];


		$iteracion = new Iteracion($idIncid, $nIteracion, $fechaIter, $hInicio, $hFin, '', $descripIter, $costeIter);
		$iteracion->setEstado($estadoIter);
		$iteracion->modEstado();
		$iteracion->modificacion();

		header("location: iteracionesController.php?accion=Consulta&idIncid=$idIncid&nIteracion=$nIteracion");
	}
	
	function modEstadoIncidencia(){
		
		$idIncid = $_POST['idIncid'];
		$incidencia = new Incidencia("", "", "", "", "", "", "", "", "", "");
		$incidencia->cambiarEstado($idIncid,'En Curso');
		
	}

	function listaIteracion(){
		//session_start();
		$idIncid =$_REQUEST['idIncid'];
		$iteracion = new Iteracion($idIncid);
		$listaIteraciones = $iteracion->lista();

		$lista = array();
		while($row = mysql_fetch_array($listaIteraciones)){
			array_push($lista, $row);
		}

		$_SESSION["listaIteraciones"] = $lista;
		

		$incidencia = new Incidencia();

		$consulta = array();
		$consultaIncidencia = $incidencia->consultaIncidencia($idIncid);

		while($row = mysql_fetch_array($consultaIncidencia)){
			$_SESSION["consultaServicios"] = $incidencia->hasServicios($row['idMaq']);
			array_push($consulta, $row);
		}

		$_SESSION["consultaIncidencia"] = $consulta;

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
		listaIteracion();

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
