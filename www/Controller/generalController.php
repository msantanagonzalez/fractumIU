<?php
if(isset($acceso)){
	switch ($acceso)
	{
		case "ON":
			anadirMensaje("|ERROR| Ejemplo de mensaje TIPO:success","success");
			anadirMensaje("|ERROR| Ejemplo de mensaje TIPO:info","info");
			anadirMensaje("|ERROR| Ejemplo de mensaje TIPO:warning","warning");
			anadirMensaje("|ERROR| Ejemplo de mensaje TIPO:danger","danger");
			header("location:View/usuarios/Login.php");
		break;
	}
}

function anadirMensaje($mensaje, $alerta){
		session_start();
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
			subirMaquina($idMaquina,$ext_permitidas,$limite);
		break;
		case "iteracion":
			//$dir= "../Resources/documents/".$idMaquina."/".$idIncidencia."/".$idIteracion."/";
			subirIteracion();
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
				echo '<br/>El archivo ya existe: ' . $nombre;
			  }else{
				move_uploaded_file($nombre_tmp,$path);
				echo "<br/>Guardado en: ".$path;
				anadirMensaje("|SUCCESS| Maquina: ".$idMaquina." creada con documentacion","success");
				anadirMensaje("|INFO| Archivo: ".$nombre."|".$tipo."|".$tamano."Mb - Guardado" ,"info");
			  }
		}else{
			anadirMensaje("|ERROR|Error al subir archivo: ".$nombre."|".$tipo."|".$tamano."Mb" ,"danger");
			anadirMensaje("|WARNING| Maquina: ".$idMaquina." creada sin documentacion","warning");
		}
	}
	
	function subirIteracion(){
		echo "implementar subida documentacion en iteracion";
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