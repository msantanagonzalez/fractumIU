<?php
//Recibimos el valor de la variable "accion" enviada mediante un post
if (!isset($_POST['accion'])) {
      $_POST['accion'] = NULL; 
    }
$accion = $_POST['accion'];

//Validamos el valor de la variable "accion" 
switch ($accion)
{
	default:
		header("location:View/Login.php");
		break;
}
?>