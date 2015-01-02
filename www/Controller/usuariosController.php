<?php
include 'bdController.php';

include '../Model/jefe.php';
include '../Model/externo.php';
include '../Model/interno.php';


$action =$_REQUEST['accion'];

switch ($action) {
	case 'login':
		loginUsuario();
		break;
	case 'listarUsuarios':
		listarUsuarios();
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
		$dniUsu = $_POST["dniUsu"];
		$passUsu = $_POST["passUsu"];
		
		$usuario   = new usuario($dniUsu, "", "", $passUsu, "" );
		$recurso	=	$usuario->login();
		
		# This is how to use the "Recurso"
		if($recurso != FALSE )
		{
				# Create a temporal array to save the data, fetch array moves the pointer
				$tipoUsuario=array();
				
				while ($row = mysql_fetch_array($recurso)){
						array_push($tipoUsuario,$row[0]);
				}
				 
				switch ($tipoUsuario[0]){
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
				}
		}else{
			# Implementar mensaje de error
			require_once "../View/Login.php";
		}
}

	
	function listarUsuarios(){
		require_once '../View/usuarios/jefe/listarUsuarios.php';
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