<?php
include_once 'bdController.php';

include_once '../Model/jefe.php';
include_once '../Model/externo.php';
include_once '../Model/interno.php';

# NOTA: CAMBIAR LOS REQUEST POR POST O GETS..... 
$action =$_REQUEST['accion'];

switch ($action) {
	case 'login':
		loginUsuario();
		break;
	case 'gestionUsuarios':
		gestionUsuarios();
		break;	
	case 'altaInterno':
		nuevoUsuarioInterno();
		gestionUsuarios();
		break;
	case 'altaExterno':
		nuevoUsuarioExterno();
		gestionUsuarios();
		break;
	case 'Guardar Externo':
		modificarUsuarioExterno();
		break;
	case 'consultar':
		# code...
		break;
	case 'eliminar':
		eliminarUsuario();
		gestionUsuarios();
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
	
	function gestionUsuarios(){
		session_start();
		listarUsuariosInternos();
		listarUsuariosExternos();
		session_write_close();
		header("location:../View/usuarios/jefe/listarUsuarios.php");
	}

	function listarUsuariosInternos(){
		$interno = new interno("","","","","");
		$recurso  = $interno->listarInternos();
		# Create a temporal array to save the data
				$listaInternos=array();
				
				while($row = mysql_fetch_array($recurso)){
						array_push($listaInternos,$row);
				}

		$_SESSION["listaInternos"] = $listaInternos;
	}
	
	function listarUsuariosExternos(){
		$externo = new externo("","","","","");
		$recurso  = $externo->listarExternos();
		# Create a temporal array to save the data
				$listaExternos=array();
				
				while($row = mysql_fetch_array($recurso)){
						array_push($listaExternos,$row);
				}
		$_SESSION["listaExternos"] = $listaExternos;
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
		$usuario->altaUsuario();
		# NOTA: Se crea el objeto de tipo interno haciendo referencia al constructor 
		# de la clase padre, de lo contrario peta, echarle un vistazo al ejemplo:
		# http://php.net/manual/en/language.oop5.inheritance.php
		$interno  = new interno($dniUsu, $nombre, $apellidos, $dniUsu, 'I' );
		$interno->setTelefOpeInt($telefono);
		$interno->setMailOpeInt($email);
		$interno->altaUsuario();
	}

	function nuevoUsuarioExterno(){
		$dniUsu    = $_REQUEST['dni'];
		$nombre    = $_REQUEST['nombre'];
		$apellidos = $_REQUEST['apellidos'];
		$cifEmpr   = $_REQUEST['cif'];
		
		# Cuando este implementado empresa se tiene que validar el CIF
		
		$usuario = new usuario($dniUsu, $nombre, $apellidos, $dniUsu, 'E' );
		$usuario->altaUsuario();
		# NOTA: Se crea el objeto de tipo interno haciendo referencia al constructor 
		# de la clase padre, de lo contrario peta, echarle un vistazo al ejemplo:
		# http://php.net/manual/en/language.oop5.inheritance.php
		$externo = new externo($dniUsu, $nombre, $apellidos, $dniUsu, 'E' );
		$externo->setCifEmpr($cifEmpr);
		$externo->altaUsuario();
	}

	/**
	 * Fin de creacion de usuarios.
	 */

	 function eliminarUsuario(){
		$dniUsu    = $_GET['dniUsu'];
		$usuario = new usuario ($dniUsu, "", "", "", "");
		$recurso  = $usuario->consultarUsuario();
		
		# Create a temporal array to save the data
				$datosUsuario=array();
				
				while($row = mysql_fetch_array($recurso)){
						array_push($datosUsuario,$row);
				}
				
		# Accedemos al array		
				foreach($datosUsuario as $row)
				{
					switch ($row['tipoUsu']){
						case 'I':
						$interno = new interno ($dniUsu, "", "", "", "");
						$interno->bajaUsuario();
						break;
						case 'E':
						$externo = new externo ($dniUsu, "", "", "", "");
						$externo->bajaUsuario();
						break;
						case 'J':
						# ELIMINAMOS JEFE?
						break;
					}
				}
		$recurso  = $usuario->bajaUsuario();		
	 }
	 
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