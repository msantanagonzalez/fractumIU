<?php
include 'bdController.php';

include '../Model/usuario.php';
include '../Model/externo.php';
include '../Model/interno.php';


$action =$_REQUEST['accion'];

switch ($action) {
	case 'altaInterno':
		nuevoUsuarioInterno();
		break;
	case 'altaExterno':
		nuevoUsuarioExterno();
		break;
	case 'modificar':
		# code...
		break;
	case 'consultar':
		# code...
		break;
	case 'alta':
		# code...
		break;
	case 'alta':
		# code...
		break;
	case 'alta':
		# code...
		break;
	
	default:
		# code...
		break;
}
	function nuevoUsuarioInterno(){
		$dniUsu    = $_REQUEST['dni'];
		$nombre    = $_REQUEST['nombre'];
		$apellidos = $_REQUEST['apellidos'];
		$telefono  = $_REQUEST['tlf'];
		$email     = $_REQUEST['correo'];
		
		$usuario   = new usuario($dniUsu, $nombre, $apellidos, $dniUsu, 'I' );
		$intero = $usuario;
		$usuario->altaUsuario();
		$interno->setTelefOpeInt($telefono);
		$interno->setMailOpeInt($mail);
		$interno->altaUsuario();
	}

	function nuevoUsuarioExterno(){
		$dniUsu    = $_REQUEST['dni'];
		$nombre    = $_REQUEST['nombre'];
		$apellidos = $_REQUEST['apellidos'];
		$cifEmpr   = $_REQUEST['cif'];
		

		$usuario = new usuario($dniUsu, $nombre, $apellidos, $dniUsu, 'E' );
		$externo = new externo($dniUsu, $nombre, $apellidos, $dniUsu, 'E' );
		$usuario->altaUsuario();
		$externo->setCifEmpr($cifEmpr);
		$externo->altaUsuario();
	}






?>