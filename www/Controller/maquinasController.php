<?php
	require_once("../Model/maquina.php");
	require_once 'bdController.php';
	require_once 'generalController.php';

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
		case 'eliminarDocumento':
			eliminarDocumento();
			break;	
	}

	function alta(){
		//session_start();

		$maquina = new Maquina($_POST["idMaq"], $_POST["nSerie"], $_POST["descripMaq"],$_POST["nomMaq"], $_POST["costeMaq"]);
		$maquina->alta();
		$tempMaquina = $_POST["idMaq"];
		
		# Subida de archivo
		if(empty($_FILES['docMaquina'])){
			anadirMensaje("|WARNING| Maquina: ".$_POST["idMaq"]." creada sin documentacion","warning");
		}else{
			list($guardado,$path,$nombreArchivo) = subirArchivo($_POST["idMaq"],"","","maquina");
			if($guardado==1){
				$maquina->setPathImage($_POST["idMaq"],$path,$nombreArchivo);
				anadirMensaje("|SUCCESS| Maquina: ".$idMaquina." creada con documentacion","success");
			}else{
			anadirMensaje("|WARNING| Maquina: ".$idMaquina." creada sin documentacion","warning");
			}
		}
		
		//header("location: maquinasController.php?accion=Consulta&idMaq=$tempMaquina");
		lista();
	}

	function consulta(){
		//session_start();

		$maquina = new Maquina();

		$idMaquina = $_REQUEST['idMaq'];
		$consultaMaquina = $maquina->consultaMaquina($idMaquina);
		$consulta = array();		
		while($row = mysql_fetch_array($consultaMaquina)){
			array_push($consulta, $row);
		}
		
		$_SESSION["consultaMaquina"] = $consulta;

		$consultaIncidencia = $maquina->listarIncidenciasAsociadas($idMaquina);
		$consulta2 = array();
		while($row = mysql_fetch_array($consultaIncidencia)){
			array_push($consulta2, $row);
		}
		$_SESSION["consultaIncidenciaMaquina"] = $consulta2;
	
		$documentoMaquina = $maquina->getPathImage($idMaquina);
		$consulta = array();		
		while($row = mysql_fetch_array($documentoMaquina)){
			array_push($consulta, $row);
		}
		
		$_SESSION["documentoMaquina"] = $consulta;
		
		switch ($_SESSION['tipo']) {
			case 'J':
				//session_write_close();
				header("location: ../View/maquinas/consultarJefe.php");
				break;
			case 'I':
				//session_write_close();
				header("location: ../View/maquinas/consultarInterno.php");
				break;
			case 'E':
				//session_write_close();
				header("location: ../View/maquinas/consultarExterno.php");
				
			default:				
				break;
		}
	}
	function modificar(){
		//session_start();
		$maquina = new Maquina();

	
		$idMaquina = $_REQUEST['idMaq'];
		$consultaMaquina = $maquina->consultaMaquina($idMaquina);
		
		$consulta = array();		
		while($row = mysql_fetch_array($consultaMaquina)){
			array_push($consulta, $row);
		}

		$_SESSION["consultaMaquina"] = $consulta;
		
		$documentoMaquina = $maquina->getPathImage($idMaquina);
		$consulta = array();		
		while($row = mysql_fetch_array($documentoMaquina)){
			array_push($consulta, $row);
		}
		
		$_SESSION["documentoMaquina"] = $consulta;

		if($_SESSION['tipo'] == 'J') {
				//session_write_close();
				header("location: ../View/maquinas/modificarJefe.php");
				
		}
	}
	function modificado(){
		//session_start();
		
		$idMaq = $_POST['idMaq'];
		$nSerie = $_POST['nSerie'];
		$descripMaq = $_POST['descripMaq'];
		$nomMaq = $_POST['nomMaq'];		
		$costeMaq = $_POST['costeMaq'];
			
		$maquina = new Maquina($idMaq, $nSerie, $descripMaq, $nomMaq, $costeMaq);
		$maquina->modificacion($idMaq);
		
		# Subida de archivo
		if(!empty($_FILES['docMaquina'])){
			list($guardado,$path,$nombreArchivo) = subirArchivo($idMaq,"","","maquina");
			if($guardado==1){
				$maquina->setPathImage($idMaq,$path,$nombreArchivo);
			}
		}
		
		anadirMensaje("|SUCCESS| Maquina: ".$idMaq." modificada","success");
		//header("location: ../Controller/maquinasController.php?accion=Consulta&idMaq=$idMaq");
		lista();
	}
	
	function lista(){
		//session_start();

		$maquina = new Maquina();
		
		switch ($_SESSION['tipo']) {
			case 'J':
				$listaMaquinas = $maquina->lista();
				$lista = array();
				
				while($row = mysql_fetch_array($listaMaquinas)){
					array_push($lista, $row);
				}
				$_SESSION["listaMaquina"] = $lista;
				//session_write_close();
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
				//session_write_close();
				break;
			case 'E':
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
				
				header("location: ../View/maquinas/listarExterno.php");
				//session_write_close();
				break;
			default:				
				break;
		}
	}
	///comprobar
					
	function eliminar(){
	//session_start();
		$idMaq    = $_GET['idMaq'];
		$maquina = new Maquina ($idMaq,"","","","");
		$resultado  = $maquina->consultaMaquina($idMaq);
		
		if ($resultado){
			$dir= "../Resources/documents/".$idMaq."/";
			eliminarDir($dir);
			$maquina->borrar();
			$maquina->delPathImage($idMaq);
		}
		anadirMensaje("|SUCCESS| Maquina: ".$idMaq." eliminada","success");
		//header("location: maquinasController.php?accion=Listar");
		lista();
	}
	
	function eliminarDocumento(){
		$idMaq    = $_GET['idMaq'];
		$path    = $_GET['path'];
		$maquina = new Maquina ($idMaq,"","","","");
		$maquina->getPathImage($idMaq);
		$maquina->delPathImage($idMaq);
		
		unlink($path);
		anadirMensaje("|SUCCESS| Documento de Maquina: ".$idMaq." eliminado","success");
		consulta();
	}

	function listarIncidencias(){
		//session_start();
			$idMaquina = $_GET['idMaq'];

			$maquina = new Maquina();

			$resultado = $maquina->listarIncidencias($idMaquina);
	}
?>	