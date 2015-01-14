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
?>