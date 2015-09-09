<?php
require_once $_SESSION['cribPath'].'Controller/bdController.php';
require_once $_SESSION['cribPath'].'Controller/incidenciasController.php';
require_once $_SESSION['cribPath'].'Model/buscador.php';
pendientesInterno();

if(isset($_POST['buscar'])){	$action = $_POST['buscar']; }

if(isset($action)){
	switch ($action) {
		case 'busquedaJefe':
			busquedaJefe();
			break;
		case 'busquedaInterno':
			busquedaInterno();
			break;
		case 'busquedaExterno':
			busquedaExterno();
			break;
		default:
			echo "Opciones no válidas :(";
			break;
	}	
}


function busquedaJefe(){

//session_start();

	if(isset($_POST['busqueda'])){	$datos = $_POST['busqueda']; }
	$buscador = new buscador($datos);
	$incidencia = $buscador->buscarIncidencia();
	$opInterno = $buscador->buscarOpInterno();
	$opExterno = $buscador->buscarOpExterno();
	$maquina = $buscador->buscarMaquina();
	$servicio = $buscador->buscarServicio();

		# ARRAYS TEMPORALES PARA ALMACENAR LOS DATOS
		$arrayIncidencia=array();
		$arrayInterno=array();
		$arrayExterno=array();
		$arrayMaquina=array();
		$arrayServicio=array();

		while($row = mysql_fetch_array($incidencia)){
			array_push($arrayIncidencia,$row);
		}
		while($row = mysql_fetch_array($opInterno)){
			array_push($arrayInterno,$row);
		}
		while($row = mysql_fetch_array($opExterno)){
			array_push($arrayExterno,$row);
		}
		while($row = mysql_fetch_array($maquina)){
			array_push($arrayMaquina,$row);
		}
		while($row = mysql_fetch_array($servicio)){
			array_push($arrayServicio,$row);
		}

		$_SESSION["busquedaIncidencia"] = $arrayIncidencia;
		$_SESSION["busquedaInterno"] = $arrayInterno;
		$_SESSION["busquedaExterno"] = $arrayExterno;
		$_SESSION["busquedaMaquina"] = $arrayMaquina;
		$_SESSION["busquedaServicio"] = $arrayServicio;
		header("location:../View/usuarios/buscarJefe.php");
}

function busquedaInterno(){

//session_start();

	if(isset($_POST['busqueda'])){	$datos = $_POST['busqueda']; }
	$buscador = new buscador($datos);
	$incidencia = $buscador->buscarIncidenciaInterno();
	$maquina = $buscador->buscarMaquina();

		# ARRAYS TEMPORALES PARA ALMACENAR LOS DATOS
		$arrayIncidencia=array();
		$arrayMaquina=array();

		while($row = mysql_fetch_array($incidencia)){
			array_push($arrayIncidencia,$row);
		}
		while($row = mysql_fetch_array($maquina)){
			array_push($arrayMaquina,$row);
		}

		$_SESSION["busquedaIncidencia"] = $arrayIncidencia;
		$_SESSION["busquedaMaquina"] = $arrayMaquina;
		header("location:../View/usuarios/buscarInterno.php");
}

function busquedaExterno(){

//session_start();

	if(isset($_POST['busqueda'])){	$datos = $_POST['busqueda']; }
	$buscador = new buscador($datos);
	$incidencia = $buscador->buscarIncidenciaExterno();
	$maquina = $buscador->buscarMaquinaExterno();
		# ARRAYS TEMPORALES PARA ALMACENAR LOS DATOS
		$arrayIncidencia=array();
		$arrayMaquina=array();

		while($row = mysql_fetch_array($incidencia)){
			array_push($arrayIncidencia,$row);
		}
		while($row = mysql_fetch_array($maquina)){
			array_push($arrayMaquina,$row);
		}

		$_SESSION["busquedaIncidencia"] = $arrayIncidencia;
		$_SESSION["busquedaMaquina"] = $arrayMaquina;
		header("location:../View/usuarios/buscarExterno.php");
}

?>
