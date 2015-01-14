<?php

include_once '../Model/servicio.php';
include_once 'bdController.php';


if(isset($_GET['accion'])){	$accion = $_GET['accion']; }
if(isset($_POST['accion'])){ $accion = $_POST['accion']; }


$action =$_REQUEST['accion'];

switch ($action) {
	case 'Alta':
		alta();
		break;
	case 'Consulta':
		consultar();
		break;	
	case 'Modificar':
		Modificar();
		break;	
	case 'Listar':
		listar();
		break;
	case 'Guardar':
		modificado();
		break;
	case 'Eliminar':
		eliminar();
		break;
	case 'Trabajar':
		trabajar();
		break;
}

	function alta(){
		session_start();

		$servicio = new servicio($_POST["idServ"], $_SESSION["dni"], $_POST["cifEmpr"],$_POST["idMaq"], $_POST["periodicidad"],$_POST["fInicioSer"], $_POST["fFinSer"],  $_POST["costeSer"], $_POST["descripSer"]);
		$servicio->alta();
		$tempServicio = $_POST["idServ"];
		
		listar();
	
	}

	
	function consultar(){
		
		session_start();

		$servicio = new servicio();

		$idServicio= $_REQUEST['idServ'];
		$consultaServicio = $servicio->consultaServicio($idServicio);

		$consulta = array();		
		while($row = mysql_fetch_array($consultaServicio)){
			array_push($consulta, $row);
		}
	
		
		$_SESSION["consultaServicio"] = $consulta;
		
		switch($_SESSION['tipo']){
		
			case 'J':
				session_write_close();
				header("location: ../View/servicios/consultarJefe.php");
				break;
			case 'E':
				session_write_close();
				header("location: ../View/servicios/consultarExterno.php");
				break;
		}
	}
	
	
	function listar(){
		
		session_start();

		$servicio = new servicio();
		$listaServicios = $servicio->listar();

		$lista = array();		
		while($row = mysql_fetch_array($listaServicios)){
			array_push($lista, $row);
		}

		$_SESSION["listaServicios"] = $lista;
		
		switch($_SESSION['tipo']){
		
			case 'J':
				session_write_close();
				header("location: ../View/servicios/gestorJefe.php");
				break;
			case 'E':
				session_write_close();
				header("location: ../View/servicios/gestorExterno.php");
				break;
		}
	}
	function modificar(){
		
		session_start();

		$servicio = new servicio();

		$idServicio = $_REQUEST['idServ'];
		$consultaServicio = $servicio->consultaServicio($idServicio);

		$consulta = array();		
		while($row = mysql_fetch_array($consultaServicio)){
			array_push($consulta, $row);
		}

		$_SESSION["consultaServicio"] = $consulta;
		
		if ($_SESSION['tipo'] == 'J') {
			
				session_write_close();
				header("location: ../View/servicios/modificarJefe.php");
				
		}
	}
	
	function modificado(){
		session_start();
		
		$idServ = $_POST['idServ'];
		$dniUsu = $_POST['dniUsu'];
		$cifEmpr = $_POST['cifEmpr'];
		$idMaquina = $_POST['idMaq'];
		$periodicidad = $_POST['periodicidad'];
		$fInicioSer = $_POST['fInicioSer'];
		$fFinSer = $_POST['fFinSer'];
		$costSer = $_POST['costeSer'];
		$descripSer = $_POST['descripSer'];

		$servicio = new servicio($idServ, $dniUsu, $cifEmpr, $idMaquina, $periodicidad,$fInicioSer, $fFinSer, $costSer, $descripSer);
		$servicio->modificar($idServ);
		
		listar();
	}
	
	function trabajar(){
		
		session_start();
		$idServ = $_POST['idServ'];
		$dniUsu = $_SESSION['dni'];
		$fecha=date('Y-m-d');
		$trabajo = new servicio($idServ, "", "", "", "", "", "", "", "");
		$trabajo->trabajar( $dniUsu,$fecha);
		
		listar();
		
	}
	
	function eliminar(){
		session_start();
		$idServ = $_GET['idServ'];
		$servicio = new Servicio($idServ, "", "", "", "", "", "", "", "");
		$resultado  = $servicio->consultaServicio($idServ);
		if ($resultado){
			$servicio->baja();
		}
		header("location: serviciosController.php?accion=Listar");
	}
	
	
	

?>