<?php
session_start();
require_once $_SESSION['cribPath'].'Controller/bdController.php';
require_once $_SESSION['cribPath'].'Controller/generalController.php';



require_once $_SESSION['cribPath'].'Model/jefe.php';
require_once $_SESSION['cribPath'].'Model/externo.php';
require_once $_SESSION['cribPath'].'Model/interno.php';
require_once $_SESSION['cribPath'].'Model/empresa.php';
require_once $_SESSION['cribPath'].'Model/maquina.php';
require_once $_SESSION['cribPath'].'Model/incidencia.php';
require_once $_SESSION['cribPath'].'Model/iteracion.php';
require_once $_SESSION['cribPath'].'Model/servicio.php';

# NOTA: CAMBIAR LOS REQUEST POR POST O GETS.....
$action = $_REQUEST['accion'];

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
	case 'accesoAltaExterno':
		listarEmpresas();
		accesoAltaExterno();
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
					listaMaquinaJefeAndInterno();
					listaIncidenciaJefeAndInterno();
					header('location:../View/usuarios/homeJefeJefe.php');
					break;
				case 'I':
					listaMaquinaJefeAndInterno();
					listaIncidenciaJefeAndInterno();
					header('location:../View/usuarios/homeInternoInterno.php');
					break;
				case 'E':
					listaMaquinasExternoProvisional();
					listaIncidenciasExternoProvisional();

					header('location:../View/usuarios/homeExternoExterno.php');
					break;
			}
		}else{
			anadirMensaje("|ERROR| Usuario o Pass Incorrecto","danger");
			//header('location:../View/usuarios/Login.php');
			header('location:../index.php');
		}
	}

	function logOut()
	{
		//session_start();
		session_unset();
		session_destroy();
		//anadirMensaje("|Success| Sesión cerrada correctamente","success");
		//header("location:../View/usuarios/Login.php");
		header('location:../index.php');
	}

	function gestionUsuarios(){
		//session_start();
		listarUsuariosInternos();
		listarUsuariosExternos();
		//session_write_close();
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

	//session_start();

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
	//session_write_close();
	}

	function guardarModificacion(){
		//session_start();
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

								anadirMensaje("| SUCCESS | Usuario: ".$datos['dniUsu']." modificado","success");
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

								anadirMensaje("| SUCCESS | Usuario interno: ".$datos['dniUsu']." modificado","success");
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

								anadirMensaje("| SUCCESS | Usuario externo: ".$datos['dniUsu']." modificado","success");
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
					anadirMensaje("| SUCCESS | Password modificado","success");
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

		anadirMensaje("| SUCCESS | Usuario Interno: ".$dniUsu." creado","success");
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

		anadirMensaje("| SUCCESS | Usuario Externo: ".$dniUsu." creado","success");
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

						anadirMensaje("| SUCCESS | Usuario Interno: ".$dniUsu." eliminado","success");
						break;
						case 'E':
						$externo = new externo ($dniUsu, "", "", "", "");
						$externo->bajaUsuario();

						anadirMensaje("| SUCCESS | Usuario Externo: ".$dniUsu." eliminado","success");
						break;
					}
				}
		$recurso  = $usuario->bajaUsuario();
	 }

//Esto deberia estar en controlador de empresas
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

//Esto deberia estar en controlador de maquinas
	function listaMaquinaJefeAndInterno(){
				$servicio = new Servicio();

				$listaServHome = array();
				$listaServicios = $servicio->listar();
				while($row = mysql_fetch_array($listaServicios)){ array_push($listaServHome, $row);}


				$maquina = new Maquina();

				$lista = array();
				$listaMaquinas = $maquina->lista();
				while($row = mysql_fetch_array($listaMaquinas)){ array_push($lista, $row); }


				$_SESSION["listaServHome"] = $listaServHome;
				$_SESSION["listaMaquina"] = $lista;

				//$servicio = new servicio(); CREAR SIEMPRE EL OBJETO CON LOS ARGUMENTOS DE LA CLASE,AUNQUE SEAN VACIOS
				$servicio = new servicio("","","","","","","","","");
				$servicios = array();
				$incidencia = new Incidencia();
				$incidencias = array();

				foreach ($lista as $maquina) {
					$serviciosMaq = array();
					$incidenciasMaq = array();
					$idMaquina = $maquina['idMaq'];
					$aux3 = $servicio->tieneServicio($idMaquina);
					$aux4 = $incidencia->ultimaIncidMaq($idMaquina);

					while($row2 = mysql_fetch_array($aux4)){
						array_push($incidenciasMaq, $row2);
					}

					array_push($servicios, $aux3);
					array_push($incidencias, $incidenciasMaq);
				}

				$_SESSION['listaServicios'] = $servicios;
				$_SESSION['listaIncidMaquina'] = $incidencias;
	}
//Esto deberia estar en controlador de incidencias
	function listaIncidenciaJefeAndInterno(){
				$incidencia = new Incidencia();
				$listaIncidencias = $incidencia->lista();

				$lista = array();
				while($row = mysql_fetch_array($listaIncidencias)){
					array_push($lista, $row);
				}

				$_SESSION["listaIncidencia"] = $lista;

				// Listar iteraciones (se necesita para ult. operario y ult. iteración)
				$iteracion = new Iteracion();

				$incidencias = array();
				foreach ($lista as $incidencia){
					$iteraciones = array();
					$idIncid = $incidencia['idIncid'];
					$aux = $iteracion->listaItHomeI($idIncid);
					while($row2 = mysql_fetch_array($aux)){
						array_push($iteraciones, $row2);
					}
					array_push($incidencias, $iteraciones);
				}

				$_SESSION['listaOp'] = $incidencias;

				$ultIt = array();
				foreach($lista as $incidencia){
					$fechasIt = array();
					$idIncid = $incidencia['idIncid'];
					$aux2 = $iteracion->listaIteracionesHomeI($idIncid);
					while($row3 = mysql_fetch_array($aux2)){
						array_push($fechasIt, $row3);
					}
					array_push($ultIt, $fechasIt);
				}

				$_SESSION['listaIt'] = $ultIt;
	}

	function accesoAltaExterno(){
		//session_start();
		if(empty($_SESSION["listaEmpresas"])){
			anadirMensaje("| ERROR | No hay empresas en el sistema","danger");
			gestionUsuarios();
		}else{
			header("location:../View/usuarios/altaExternoJefe.php");
		}
	}




// --------- CODIGO PROVISIONAL --------------
	function listaMaquinasExternoProvisional(){
		$maquina = new Maquina();
		$servicio = new Servicio();
		$listaMaquinas1 = $maquina->listaMaquinasOpEservicio();
		$lista1 = array();
		while($row = mysql_fetch_array($listaMaquinas1)){
			array_push($lista1, $row);
		}
		$_SESSION["listaMaquina1"] = $lista1;
		$listaMaquinas2 = $maquina->listaMaquinasOpEIncidencia();
		$lista2 = array();
		while($row = mysql_fetch_array($listaMaquinas2)){
			array_push($lista2, $row);
		}
		$_SESSION["listaMaquina2"] = $lista2;
	}


	function listaIncidenciasExternoProvisional(){
		$responsables = new interno("", "", "", "", "");
		$consultaResp = array();
		$consultaResponsables = $responsables->listarInternos();
		while($row = mysql_fetch_array($consultaResponsables)){ array_push($consultaResp, $row); }
		$_SESSION["consultaResponsables"] = $consultaResp;
		$incidencia = new Incidencia();
		$listaIncidencia1 = $incidencia->listaIncidenciasOpE();
		$lista1 = array();
		while($row = mysql_fetch_array($listaIncidencia1)){
			array_push($lista1, $row);
		}
		$_SESSION["listaIncidencia1"] = $lista1;
	}




?>
