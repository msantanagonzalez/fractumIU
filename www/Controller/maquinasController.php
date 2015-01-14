<?php
	require_once("../Model/maquina.php");
	include_once 'bdController.php';

	if(isset($_GET['accion'])){	$accion = $_GET['accion']; }
	if(isset($_POST['accion'])){ $accion = $_POST['accion']; }
	
	
//var_dump($_SESSION["dni"]); die();
	
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
		case 'Guardar':
			modificado();
			break;
		case 'Listar':
			lista();
			break;
		case 'Buscar':
			buscar();
			break;
		case 'Eliminar':
			eliminar();
			break;
	}

	function alta(){
		session_start();

		$maquina = new Maquina($_POST["idMaq"], $_POST["nSerie"], $_POST["descripMaq"],$_POST["nomMaq"], $_POST["costeMaq"]);
		$maquina->alta();
		$tempMaquina = $_POST["idMaq"];
		header("location: maquinasController.php?accion=Consulta&idMaq=$tempMaquina");
	}

	function consulta(){
		session_start();

		$maquina = new Maquina();

		$idMaquina = $_REQUEST['idMaq'];
		$consultaMaquina = $maquina->consultaMaquina($idMaquina);
		$consulta = array();		
		while($row = mysql_fetch_array($consultaMaquina)){
			array_push($consulta, $row);
		}

		$_SESSION["consultaMaquina"] = $consulta;
	
		switch ($_SESSION['tipo']) {
			case 'J':
				session_write_close();
				header("location: ../View/maquinas/consultarJefe.php");
				break;
			case 'I':
				header("location: ../View/maquinas/consultarInterno.php");
				session_write_close();
				break;
			case 'E':
				header("location: ../View/maquinas/consultarExterno.php");
				session_write_close();
			default:				
				break;
		}
	}
	function modificar(){
		session_start();
		$maquina = new Maquina();

	
		$idMaquina = $_REQUEST['idMaq'];
		$consultaMaquina = $maquina->consultaMaquina($idMaquina);
		
		$consulta = array();		
		while($row = mysql_fetch_array($consultaMaquina)){
			array_push($consulta, $row);
		}

		$_SESSION["consultaMaquina"] = $consulta;


		if($_SESSION['tipo'] == 'J') {
				session_write_close();
				header("location: ../View/maquinas/modificarJefe.php");
				
		}
	}
	function modificado(){
		session_start();
		
		$idMaq = $_POST['idMaq'];
		$nSerie = $_POST['nSerie'];
		$descripMaq = $_POST['descripMaq'];
		$nomMaq = $_POST['nomMaq'];		
		$costeMaq = $_POST['costeMaq'];
			
		$maquina = new Maquina($idMaq, $nSerie, $descripMaq, $nomMaq, $costeMaq);
		$maquina->modificacion($idMaq);
		
		header("location: ../Controller/maquinasController.php?accion=Consulta&idMaq=$idMaq");
	}
	
	function lista(){
		session_start();

		$maquina = new Maquina();
		$listaMaquinas = $maquina->lista();
		$lista = array();
		
		while($row = mysql_fetch_array($listaMaquinas)){
			array_push($lista, $row);
		}
		$_SESSION["listaMaquina"] = $lista;

		switch ($_SESSION['tipo']) {
			case 'J':
			$listaMaquinas = $maquina->lista();
		$lista = array();
		
		while($row = mysql_fetch_array($listaMaquinas)){
			array_push($lista, $row);
		}
		$_SESSION["listaMaquina"] = $lista;
				session_write_close();
				header("location: ../View/maquinas/listarJefe.php");
				break;
			case 'I':
			$listaMaquinas = $maquina->lista();
		$lista = array();
		
		while($row = mysql_fetch_array($listaMaquinas)){
			array_push($lista, $row);
		}
		$_SESSION["listaMaquina"] = $lista;
				header("location: ../View/maquinas/listarInterno.php");
				session_write_close();
				break;
			case 'E':
				
				
				$listaMaquinas = $maquina->listaMaquinasOpE();
		$lista = array();
		
		while($row = mysql_fetch_array($listaMaquinas)){
			array_push($lista, $row);
		}
		$_SESSION["listaMaquina"] = $lista;
				header("location: ../View/maquinas/listarExterno.php");
				session_write_close();
			default:				
				break;
		}
	}
	///comprobar
					
	function eliminar(){
	session_start();
		$idMaq    = $_GET['idMaq'];
		$maquina = new Maquina ($idMaq,"","","","");
		$resultado  = $maquina->consultaMaquina($idMaq);
		
		if ($resultado){
			$maquina->borrar();
		}
		header("location: maquinasController.php?accion=Listar");
		
			
		
		
	
	}
	