<?php
include_once('usuario.php');

class interno extends usuario {

	private $telefOpeInt;
	private $mailOpeInt;


	protected $consultarUsuario  = "SELECT * FROM OPINTERNO WHERE dniUsu = '$this->dniUsu'";
	protected $insertarUsuario   = "INSERT INTO OPINTERNO(dniUsu,mailOpeInt, telefOpeInt) VALUES ('$this->$dniUsu', '$this->$mailOpeInt', '$this->$telefOpeInt')";
	protected $eliminarUsuario   = "DELETE FROM OPINTERNO WHERE dniUsu = '$this->dniUsu'";
	protected $actualizarUsuario = "UPDATE OPINTERNO SET dniUsu='$this->dniUsu', mailOpeInt = '$this->$mailOpeInt', telefOpeInt='$this->telefOpeInt' where dniUsu= '$this->dniUsu'";

	private function setTelefOpeInt($telef){
		$this->telefOpeInt = $telef;
	}

	private function setMailOpeInt($mail){
		$this->mailOpeInt = $mail;
	}


/**
*
*	function __construct($telefOpeInt, $mailOpeInt){
*		$this->telefOpeInt=$telefOpeInt;
*		$this->mailOpeInt=$mailOpeInt;
*	}
*
*	function altaUsuario(){
*		$this->ConectDB();
*		$sql = "SELECT * FROM OPINTERNO WHERE dniUsu = '$this->dniUsu'";
*		$resultado = mysql_query($sql) or die(mysql_error());
*		if (!$resultado) {
*			$sql1= "INSERT INTO OPINTERNO(dniUsu, telefOpeInt, mailOpeInt) VALUES ('this->$dniUsu', 'this->$telefOpeInt','this->$mailOpeInt')";
*			$resultado1 = mysql_query($sql1) or die(mysql_error());
*		} else {
*			return false;
*		}
*	}
*	
*/
}

?>