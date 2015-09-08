<?php

require_once $_SESSION['cribPath'].'Model/servicio.php';
require_once $_SESSION['cribPath'].'Controller/bdController.php';
require_once $_SESSION['cribPath'].'Controller/generalController.php';

require_once $_SESSION['cribPath'].'Model/maquina.php';
require_once $_SESSION['cribPath'].'Model/empresa.php';


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
	case 'accesoAltaServicio':
	listarMaquinaSinServicio();
	listarEmpresas();
	accesoAltaServicio();
	break;
}

	function alta(){
		//session_start();

		$servicio = new servicio($_POST["idServ"], $_SESSION["dni"], $_POST["cifEmpr"],$_POST["idMaq"], $_POST["periodicidad"],$_POST["fInicioSer"], $_POST["fFinSer"],  $_POST["costeSer"], $_POST["descripSer"]);
		$servicio->alta();
		$tempServicio = $_POST["idServ"];
		anadirMensaje("|SUCCESS| Servicio: ".$_POST["idServ"]." creado","success");
		listar();
	}


	function consultar(){

		//session_start();

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
				//session_write_close();
				header("location: ../View/servicios/consultarJefe.php");
				break;
			case 'E':
				//session_write_close();
				header("location: ../View/servicios/consultarExterno.php");
				break;
		}
	}


	function listar(){

		//session_start();

		$servicio = new servicio("","","","","","","","","");


		switch($_SESSION['tipo']){

			case 'J':
				$listaServicios = $servicio->listar();

				$lista = array();
				while($row = mysql_fetch_array($listaServicios)){
					array_push($lista, $row);
				}

				$_SESSION["listaServicios"] = $lista;
				//session_write_close();
				header("location: ../View/servicios/gestorJefe.php");
				break;
			case 'E':
				$listaServicios = $servicio->listarExterno();

				$lista = array();
				while($row = mysql_fetch_array($listaServicios)){
					array_push($lista, $row);
				}

				$_SESSION["listaServicios"] = $lista;

				//session_write_close();
				header("location: ../View/servicios/gestorExterno.php");
				break;
		}
	}
	function modificar(){

		//session_start();

		$servicio = new servicio();

		$idServicio = $_REQUEST['idServ'];
		$consultaServicio = $servicio->consultaServicio($idServicio);

		$consulta = array();
		while($row = mysql_fetch_array($consultaServicio)){
			array_push($consulta, $row);
		}

		$_SESSION["consultaServicio"] = $consulta;

		if ($_SESSION['tipo'] == 'J') {

				//session_write_close();
				header("location: ../View/servicios/modificarJefe.php");

		}
	}

	function modificado(){
		//session_start();

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
		anadirMensaje("|SUCCESS| Servicio: ".$idServ." modificado","success");
		listar();
	}

	function trabajar(){

		//session_start();
		$idServ = $_POST['idServ'];
		$dniUsu = $_SESSION['dni'];
		$fecha=date('Y-m-d');
		$trabajo = new servicio($idServ, "", "", "", "", "", "", "", "");
		$trabajo->trabajar( $dniUsu,$fecha);

		listar();

	}

	function eliminar(){
		//session_start();
		$idServ = $_GET['idServ'];
		$servicio = new Servicio($idServ, "", "", "", "", "", "", "", "");
		$resultado  = $servicio->consultaServicio($idServ);
		if ($resultado){
			$servicio->baja();
		}
		anadirMensaje("|SUCCESS| Servicio: ".$idServ." eliminado","success");
		//header("location: serviciosController.php?accion=Listar");
		listar();
	}

	function listarMaquinaSinServicio(){
				//session_start();
				$maquina = new Maquina();
				$listaMaquinas = $maquina->listaMaquinaSinServicio();
				$lista = array();

				while($row = mysql_fetch_array($listaMaquinas)){
					array_push($lista, $row);
				}
				$_SESSION["maquinaSinServicio"] = $lista;
				//session_write_close();
	}

	function listarEmpresas(){
		//session_start();
		$empresa = new Empresa();
		$listaEmpresas = $empresa->listarEmpresas();

		$lista = array();
		while($row = mysql_fetch_array($listaEmpresas)){
			array_push($lista, $row);
		}

		$_SESSION["listaEmpresas"] = $lista;
	}

	function accesoAltaServicio(){
		if(empty($_SESSION["maquinaSinServicio"])){
			anadirMensaje("| ERROR | Todas las maquinas tienen un servicio asociado","danger");
			listar();
		}else{
			header("location:../View/servicios/altaJefe.php");
		}
	}



?>
