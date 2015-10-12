<?php
function checkIfLogged(){
	if($_SESSION['userIn'] != 1){
	anadirMensaje("|ERROR| Inicia sesion para continuar","danger");
	header('location:../../index.php');
	//header('location:View/usuarios/Login.php');
	}
}

if(isset($acceso)){
	switch ($acceso)
	{
		case "ON":
			anadirMensaje("|INFO| Acceso jefe: Usuario=12345678E Pass=1234","info");
			header('location:View/usuarios/Login.php');
		break;
	}
}

function anadirMensaje($mensaje, $alerta){
		////session_start();();
		if(!isset($_SESSION['notificaciones']))
		{
			$_SESSION['notificaciones']=array();
		array_push($_SESSION['notificaciones'],array('alerta' => $alerta, 'mensaje' => $mensaje));
		}else{
		array_push($_SESSION['notificaciones'],array('alerta' => $alerta, 'mensaje' => $mensaje));
		}
}

function subirArchivo($idMaquina,$idIncidencia,$idIteracion,$tipo){
	$ext_permitidas = array('jpg','jpeg','png','pdf','txt','doc','docx');
	# 5000kb
	$limite = 5000 * 1024;
	switch($tipo){
		case "maquina":
			list($guardado,$path,$nombreArchivo) = subirMaquina($idMaquina,$ext_permitidas,$limite);
			return array($guardado,$path,$nombreArchivo);
		break;
		case "iteracion":
			//$dir= "../Resources/documents/".$idMaquina."/".$idIncidencia."/".$idIteracion."/";
			//subirIteracion();
			//echo "Aqui se para";
			list($guardado,$path,$nombreArchivo) = subirIteracion($idMaquina,$idIncidencia,$idIteracion,$ext_permitidas,$limite);
			return array($guardado,$path,$nombreArchivo);
		break;
	}
}

function subirMaquina($idMaquina,$ext_permitidas,$limite){
		$dir= "../Resources/documents/".$idMaquina."/";
		$nombre = $_FILES['docMaquina']['name'];
		$path= $dir.$nombre;
		$nombre_tmp = $_FILES['docMaquina']['tmp_name'];
		$tipo = $_FILES['docMaquina']['type'];
		$tamano = $_FILES['docMaquina']['size'];
		$partes_nombre = explode('.', $nombre);
		$extension = end( $partes_nombre );
		$ext_correcta = in_array($extension, $ext_permitidas);

		if($ext_correcta && $tamano <= $limite ){
					if(file_exists($dir.$nombre)){
					anadirMensaje("|ERROR| Ya hay un archivo con ese nombre: ".$nombre."|".$tipo."|".$tamano."Mb" ,"danger");
				  }else{
					//mkdir($dir);
					move_uploaded_file($nombre_tmp,$path);
					anadirMensaje("|INFO| Archivo: ".$nombre."|".$tipo."|".$tamano."Mb - Guardado" ,"info");
					return array(1,$path,$nombre);
				  }
			}
		//else{
		// 	anadirMensaje("|ERROR|Error al subir archivo: ".$nombre."|".$tipo."|".$tamano."Mb" ,"danger");
		// }
	}

	function subirIteracion($idMaquina,$idIncidencia,$idIteracion,$ext_permitidas,$limite){
		$dir= "../Resources/documents/".$idMaquina."/Incid_".$idIncidencia."/Itera_".$idIteracion."/";
		$nombre = $_FILES['docIteracion']['name'];
		$path= $dir.$nombre;
		$nombre_tmp = $_FILES['docIteracion']['tmp_name'];
		$tipo = $_FILES['docIteracion']['type'];
		$tamano = $_FILES['docIteracion']['size'];
		$partes_nombre = explode('.', $nombre);
		$extension = end( $partes_nombre );
		$ext_correcta = in_array($extension, $ext_permitidas);

		if($ext_correcta && $tamano <= $limite ){
			if(!file_exists($dir)){
				mkdir($dir,0777,true);
			}
			if(file_exists($dir.$nombre)){
			anadirMensaje("|ERROR| Ya hay un archivo con ese nombre: ".$nombre."|" ,"danger");
			}else{
			//mkdir($dir);
			move_uploaded_file($nombre_tmp,$path);
			anadirMensaje("|INFO| Archivo: ".$nombre." - Guardado" ,"info");
			return array(1,$path,$nombre);
			}
		}
		// else{
		// 	anadirMensaje("|ERROR|Error al subir archivo: ".$nombre."|" ,"danger");
		// }
	}

	function eliminarDir($carpeta)
	{
		foreach(glob($carpeta . "/*") as $archivos_carpeta)
		{
		//si es un directorio volvemos a llamar recursivamente.
		if (is_dir($archivos_carpeta))
		eliminarDir($archivos_carpeta);
		else//si es un archivo lo eliminamos.
		unlink($archivos_carpeta);
		}
		//Eliminacion de carpeta.
		rmdir($carpeta);
		anadirMensaje("|INFO|Carpeta: ".$carpeta." eliminada","info");
	}
?>
