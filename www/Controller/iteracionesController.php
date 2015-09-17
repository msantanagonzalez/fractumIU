<?php
	require_once $_SESSION['cribPath'].'Model/iteracion.php';
	require_once $_SESSION['cribPath'].'Controller/bdController.php';
	require_once $_SESSION['cribPath'].'Controller/generalController.php';
	require_once $_SESSION['cribPath'].'Model/incidencia.php';

	if(isset($_GET['accion'])){	$accion = $_GET['accion']; }
	if(isset($_POST['accion'])){ $accion = $_POST['accion']; }

if(isset($accion)){
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
		case 'Modificar_Iteracion':
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
		case 'eliminarDocIteracion':
			eliminarDocumento();
			break;
	}
}else{
	echo "AQUI, ACCION SIN VALOR";
}

	function altaIteracion(){
		//session_start();
		$idI = $_POST["idIncid"];
		$iteracion2 = new Iteracion("","","","","","","","","");
		//$id = NULL;
		$idMaquina = $_POST["idMaq"];

		$iteracion = new Iteracion($idI,"", $_POST["fechaIter"], $_POST["hInicio"], $_POST["hFin"],
										$_POST["estadoItera"],  $_POST["descripIter"], $_POST["costeIter"], $_SESSION['dni']);
		$iteracion->alta();
		$id = mysql_fetch_row($iteracion2->nextId());
		//$id[0]++;

		if(empty($_FILES['docIteracion'])){
			anadirMensaje("|WARNING| Iteracion: ".$id[0]." creada sin documentacion","warning");
		}else{
			list($guardado,$path,$nombreArchivo) = subirArchivo($idMaquina,$idI,$id[0],"iteracion");
			if($guardado==1){
				$iteracion->setPathImage($idI,$id[0],$path,$nombreArchivo);
				anadirMensaje("|SUCCESS| Iteracion: ".$id[0]." creada con documentacion","success");
			}else{
			anadirMensaje("|WARNING| Iteracion: ".$id[0]." creada sin documentacion ERROR INTERNO","warning");
			}
		}


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

		$consulta = array();
		$documentoIteracion = $iteracion->getPathImage($idIncid,$nIteracion);
		while($row = mysql_fetch_array($documentoIteracion)){
			array_push($consulta, $row);
		}

		$_SESSION["documentoIteracion"] = $consulta;

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
		$idIteracion = $_GET['idIncidencia'];
		$nIteracion = $_GET['nIteracion'];

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
		$idMaquina = $_POST['idMaq'];
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

		# Subida de archivo
		if(!empty($_FILES['docIteracion'])){
			list($guardado,$path,$nombreArchivo) = subirArchivo($idMaquina,$idIncid,$nIteracion,"iteracion");
			if($guardado==1){
				$iteracion->setPathImage($idIncid,$nIteracion,$path,$nombreArchivo);
			}
		}

		header("location: iteracionesController.php?accion=consultaIteracion&idIncid=$idIncid&nIteracion=$nIteracion");
	}

	function modEstadoIncidencia(){
		switch ($_SESSION['tipo']) {
			case 'J':
				$idIncid = $_POST['idIncid'];
				$incidencia = new Incidencia("", "", "", "", "", "", "", "", "", "");
				$incidencia->cambiarEstado($idIncid,'En Curso');
				break;
			case 'I':
				$idIncid = $_POST['idIncid'];
				$incidencia = new Incidencia("", "", "", "", "", "", "", "", "", "");
				$incidencia->cambiarEstado($idIncid,'En Curso');
				break;
			case 'E':
				$idIncid = $_POST['idIncid'];
				$incidencia = new Incidencia("", "", "", "", "", "", "", "", "", "");
				$incidencia->cambiarEstado($idIncid,'En Curso Externo');
				break;
			default:
				break;
		}

	}

	function listaIteracion(){
		//session_start();
		$idIncid =$_REQUEST['idIncid'];
		$iteracion = new Iteracion();
		$listaIteraciones = $iteracion->lista($idIncid);

		$lista = array();
		while($row = mysql_fetch_array($listaIteraciones)){
			array_push($lista, $row);
		}

		$_SESSION["listaIteraciones"] = $lista;
/*---------------------------------------------------------------------------*/
				$iteracion = new Iteracion("","","","","","","","","");
				$estadoIteracion= $iteracion->ultimaIteraIncid($idIncid);

				/*
				$ultItera = array();
				while($row = mysql_fetch_array($estadoIteracion)){
					array_push($ultItera, $row);
				}
				*/
				$_SESSION["estadoIteracion"] = $estadoIteracion;

/*-----------------------------------------------------------------------------*/

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

		$idIncidencia = $_GET['idIncid'];
		$idMaq = $_GET['idMaq'];

		header("location: ../View/iteraciones/altaExterno.php?idIncidencia=$idIncidencia&idMaq=$idMaq");
	}

	function eliminarDocumento(){
		$idIncid    = $_GET['idIncid'];
		$idItera = $_GET['nIteracion'];
		$path    = $_GET['path'];
		$iteracion = new Iteracion ($idIncid,$idItera);
		$iteracion->getPathImage($idIncid,$idItera);
		$iteracion->delPathImage($idIncid,$idItera);

		unlink($path);
		anadirMensaje("|SUCCESS| Documento de Iteracion: ".$idItera." eliminado","success");
		consultaIteracion();
	}

?>
