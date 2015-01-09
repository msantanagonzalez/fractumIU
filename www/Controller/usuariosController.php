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
	case 'logOut':
		logOut();
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
		consultarUsuario();
		break;
	case 'eliminar':
		eliminarUsuario();
		gestionUsuarios();
		break;
	case 'Guardar':
		guardarModificacion();
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
					header("location:../View/usuarios/homeJefeJefe.php");
					//require_once("../View/usuarios/jefe/homeJefe.php");
					break;
				case 'I':
					header("location:../View/usuarios/homeInternoInterno.php");
					//require_once("../View/usuarios/jefe/homeJefe.php");
					break;
				case 'E':
					header("location:../View/usuarios/homeExternoExterno.php");
					//require_once("../View/usuarios/jefe/homeJefe.php");
					break;
				default:
					echo "Usuario y contrase;a bien, tipo usuario mal.";
					break;
			}
		}else{
			# Implementar mensaje de error
			header("location:../View/Login.php");
		}
	}
	
	function logOut()
	{
		session_start();
		session_unset(); 
		session_destroy(); 
		header("location:../View/Login.php");
	}
	
	function gestionUsuarios(){
		session_start();
		listarUsuariosInternos();
		listarUsuariosExternos();
		session_write_close();
		header("location:../View/usuarios/listarUsuariosJefe.php");
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
	
	function consultarUsuario(){
	
	session_start();
		
	$dniUsu =$_GET['dniUsu'];
	$usuario = new usuario($dniUsu, "", "", "", "" );
	$recurso = $usuario->consultarUsuario();
	
	# Create a temporal array to save the data
				$datosUsuario=array();
				
				while($row = mysql_fetch_array($recurso)){
						array_push($datosUsuario,$row);
				}
			$_SESSION["datosUsuario"] = $datosUsuario;
		foreach ($datosUsuario as $row){
			switch ($_SESSION['tipo']){
					case 'J':
						switch ($row['tipoUsu']){
							case 'J':
								$jefe = new jefe($row['dniUsu'],"","","","");
								$recurso  = $jefe->consultarUsuario();
								$datosUsuario=array();
								while($row = mysql_fetch_array($recurso)){
												array_push($datosUsuario,$row);
								}
								$_SESSION["datosJefe"] = $datosUsuario;
								header("location:../View/usuarios/consultarJefeJefe.php");
							break;
							case 'I':
								$interno = new interno($row['dniUsu'],"","","","");
								$recurso  = $interno->consultarUsuario();
								$datosUsuario=array();
								while($row = mysql_fetch_array($recurso)){
												array_push($datosUsuario,$row);
								}
								$_SESSION["datosInterno"] = $datosUsuario;	
								header("location:../View/usuarios/consultarInternoJefe.php");
							break;
							case 'E':
								$externo = new externo($row['dniUsu'],"","","","");
								$recurso  = $externo->consultarUsuario();
								$datosUsuario=array();
								while($row = mysql_fetch_array($recurso)){
												array_push($datosUsuario,$row);
								}
								$_SESSION["datosExterno"] = $datosUsuario;	
								header("location:../View/usuarios/consultarExternoJefe.php");
							break;
							default:
								echo "ERROR";
							break;
						}
						break;
					case 'I':
						$interno = new interno($row['dniUsu'],"","","","");
						$recurso  = $interno->consultarUsuario();
						$datosUsuario=array();
						while($row = mysql_fetch_array($recurso)){
										array_push($datosUsuario,$row);
						}
						$_SESSION["datosInterno"] = $datosUsuario;
						header("location:../View/usuarios/consultarInternoInterno.php");
					break;
					case 'E':
						$externo = new externo($row['dniUsu'],"","","","");
						$recurso  = $externo->consultarUsuario();
						$datosUsuario=array();
						while($row = mysql_fetch_array($recurso)){
										array_push($datosUsuario,$row);
						}
						$_SESSION["datosExterno"] = $datosUsuario;
						header("location:../View/usuarios/consultarExternoExterno.php");
						break;
					default:
						echo "ERROR";
						break;
				}
		}		
	session_write_close();
	}
	
	function guardarModificacion(){
		session_start();
		switch ($_SESSION['tipo']){
			case 'J':
			
					$dniUsu = $_GET['dniUsu'];
					$usuario = new usuario($dniUsu, "", "", "", "" );
					$recurso = $usuario->consultarUsuario();
					
					$datosUsuario=array();
					while($row = mysql_fetch_array($recurso)){
						array_push($datosUsuario,$row);
					}
					foreach ($datosUsuario as $datos){
						# Datos de todo tipo de usuarios
						if (!empty($_POST['nomUsu'])){
						$nomUsu = $_POST['nomUsu'];
						}else{$nomUsu = $datos['nomUsu'];}
						
						if (!empty($_POST['apellUsu'])){
						$apellUsu = $_POST['apellUsu'];
						}else{$apellUsu = $datos['apellUsu'];}
						
						if (!empty($_POST['passUsu'])){
						$passUsu = $_POST['passUsu']; 
						}else{$passUsu = $datos['passUsu'];}	
						
						switch($datos['tipoUsu'])
						{
							case 'J':
								$jefe = new jefe($datos['dniUsu'],"","","","");
								$recurso  = $jefe->consultarUsuario();
								
								$datosJefe=array();
								while($row = mysql_fetch_array($recurso)){
									array_push($datosJefe,$row);
								}
								foreach ($datosJefe as $jefe){
									# Datos especificos de operario interno	
									if (!empty($_POST['correoUsu'])){
									$correoUsu = $_POST['correoUsu'];
									}else{$correoUsu = $jefe['mailJefe'];}
									echo $jefe['mailJefe'];
									if (!empty($_POST['telUsu'])){
									$telUsu = $_POST['telUsu'];
									}else{$telUsu = $jefe['telefJefe'];}
								}
								$jefe = new jefe($datos['dniUsu'],"","","","");
								$jefe->setTelefJefe($telUsu);
								$jefe->setMailJefe($correoUsu);
								$jefe->modificarUsuario();
							break;
							case 'I':
								$interno = new interno($datos['dniUsu'],"","","","");
								$recurso  = $interno->consultarUsuario();
								
								$datosInterno=array();
								while($row = mysql_fetch_array($recurso)){
									array_push($datosInterno,$row);
								}
								foreach ($datosInterno as $interno){
									# Datos especificos de operario interno	
									if (!empty($_POST['correoUsu'])){
									$correoUsu = $_POST['correoUsu'];
									}else{$correoUsu = $interno['mailOpeInt'];}
									
									if (!empty($_POST['telUsu'])){
									$telUsu = $_POST['telUsu'];
									}else{$telUsu = $interno['telfOpeInt'];}
								}
								$interno = new interno($datos['dniUsu'],"","","","");
								$interno->setTelefOpeInt($telUsu);
								$interno->setMailOpeInt($correoUsu);
								$interno->modificarUsuario();
							break;
							case 'E':
								$externo = new externo($datos['dniUsu'],"","","","");
								$recurso  = $externo->consultarUsuario();
								
								$datosExterno=array();
								while($row = mysql_fetch_array($recurso)){
									array_push($datosExterno,$row);
								}
								foreach ($datosExterno as $externo){
									# Datos especificos de operario externo
									if (!empty($_POST['cifEmpr'])){
									$cifEmpr = $_POST['cifEmpr']; 
									}else{$cifEmpr = $externo['cifEmpr'];}
								}
								$externo = new externo($datos['dniUsu'],"","","","");
								$externo->setCifEmpr($cifEmpr);
								$externo->modificarUsuario();
							break;
						}
						
						$usuario->setNomUsu($nomUsu);
						$usuario->setApellUsu($apellUsu);
						$usuario->setPassUsu($passUsu);
						$usuario->modificarUsuario();
						header("location:../View/usuarios/homeJefeJefe.php");
					}
				break;
			case ($_SESSION['tipo'] == 'I' || $_SESSION['tipo'] == 'E'):
					$newPass = $_POST['pass'];
					$dniUsu = $_SESSION['dni'];
					$usuario = new usuario($dniUsu, "", "", "", "" );
					$usuario->setPassUsu($newPass);
					$usuario->modificarPass();
					if($_SESSION['tipo'] == 'I'){
						header("location:../View/usuarios/homeInternoInterno.php");
					}else{
						header("location:../View/usuarios/homeExternoExterno.php");
					}
				break;
			default:
				
				break;
		}
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