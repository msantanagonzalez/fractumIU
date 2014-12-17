<?php

include_once('usuario.php');

class externo extends usuario {

	private $cifEmpr;

	protected $consultarUsuario  = "SELECT * FROM OPEXTERNO WHERE dniUsu = '$this->dniUsu'";
	protected $insertarUsuario   = "INSERT INTO OPEXTERNO(dniUsu, cifEmpr) VALUES ('$this->dniUsu','$this->cifEmpr')";
	protected $eliminarUsuario   = "DELETE FROM OPEXTERNO WHERE dniUsu = 'this->$dniUsu'";
	protected $actualizarUsuario = "UPDATE OPEXTERNO SET dniUsu='$this->dniUsu', cifEmpr='$this->cifEmpr' where dniUsu= '$this->dniUsu'";

	private function setCifEmpr($cif){
		$this->cifEmpr = $cif;
	}




/**
*	function __construct($cifEmpr){
*		$this->cifEmpr =$cifEmpr;
*	}
*
*
*	private function altaUsuario(){
*		$this->ConectDB();
*		$sql       = "SELECT * FROM OPEXTERNO WHERE dniUsu = '$this->dniUsu'";
*		$resultado = mysql_query($sql) or die(mysql_error());
*		if (!$resultado) {
*			$sql1       = "INSERT INTO OPEXTERNO(dniUsu, cifEmpr) VALUES ('this->$dniUsu','this->$cifEmpr')";
*			$resultado1 = mysql_query($sql1) or die(mysql_error());
*		} else {
*			return false;
*		}
*	}
*
*	private function bajaUsuario(){
*		$this->ConectDB();
*		$sql = "SELECT dniUsu FROM OPEXTERNO WHERE dniUsu = '$this->dniUsu'";
*		$resultado = mysql_query($sql) or die(mysql_error());
*		if (!$resultado) {
*			return false;
*		} else {
*			$sql1="DELETE FROM OPEXTERNO WHERE dniUsu = 'this->$dniUsu'";
*			$resultado1 = mysql_query($sql1) or die(mysql_error());	
*			return true;
*		}
*	}
*/
}
?>