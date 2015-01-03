<?php
include_once 'bdController.php';

include_once '../Model/jefe.php';
include_once '../Model/externo.php';
include_once '../Model/interno.php';


$action =$_REQUEST['accion'];

switch ($action) {
	case 'login':
		loginUsuario();
		break;
	case 'OPERARIOS INTERNOS':
		listarUsuariosInternos();
		session_write_close();
		header("location:../View/usuarios/jefe/listarUsuarios.php");
		break;	
	case 'altaInterno':
		nuevoUsuarioInterno();
		break;
	case 'altaExterno':
		nuevoUsuarioExterno();
		break;
	case 'Guardar Externo':
		modificarUsuarioExterno();
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
		echo "Revisa la accion del form, por aqui paso!";
		break;
}

	function loginUsuario(){
		$dniUsu  = $_POST["dniUsu"];
		$passUsu = $_POST["passUsu"];
		
		$usuario = new usuario($dniUsu, "", "", $passUsu, "" );
		$recurso = $usuario->login();

		# This is how to use the "Recurso"
		if($recurso != false )
		{			
			switch ($_SESSION['tipo']){
				case 'J':
					header("location:../View/usuarios/jefe/homeJefe.php");
					//require_once("../View/usuarios/jefe/homeJefe.php");
					break;
				case 'I':
					header("location:../View/usuarios/interno/homeInterno.php");
					//require_once("../View/usuarios/jefe/homeJefe.php");
					break;
				case 'E':
					header("location:../View/usuarios/externo/homeExterno.php");
					//require_once("../View/usuarios/jefe/homeJefe.php");
					break;
				default:
					echo "Usuario y contrase;a bien, tipo usuario mal.";
					break;
			}
		}else{
			# Implementar mensaje de error
			require_once "../View/Login.php";
		}
	}

	function listarUsuariosInternos(){
		$interno = new interno("","","","","");
		session_start();
		$usu  = $interno->listarInternos();
		$_SESSION["usu"] = $usu;
	}
	
	
	/**
	 * Creacion de usuarios.
	 */

	function nuevoUsuarioInterno(){
		$dniUsu    = $_REQUEST['dni'];
		$nombre    = $_REQUEST['nombre'];
		$apellidos = $_REQUEST['apellidos'];
		$telefono  = $_REQUEST['tlf'];
		$email     = $_REQUEST['correo'];
		
		$usuario = new usuario($dniUsu, $nombre, $apellidos, $dniUsu, 'I' );
		$intero  = $usuario;
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
		$externo = $usuario;
		$usuario->altaUsuario();
		$externo->setCifEmpr($cifEmpr);
		$externo->altaUsuario();
	}

	/**
	 * Fin de creacion de usuarios.
	 */

	/**
	 * Inicio de modificacion de usuarios
	 */
	function modificarUsuarioExterno(){
		$dniUsu    = $_REQUEST['peDNI'];
		$nombre    = $_REQUEST['peNombre'];
		$apellidos = $_REQUEST['peApellidos'];
		$pass      = $_REQUEST['pePass'];

		$usuario = new usuario ($dniUsu, $nombre, $apellidos, $pass, 'E');
		$result  = $usuario->consultarUsuario();
		if($result){
			$usuario->modificarUsuario();
		} else {
			false;
		}
	}

	/**
	 * Fin de modificacion de usuarios
	 */

?>