<?php
include_once('usuario.php');

class interno extends usuario {

	private $telefOpeInt;
	private $mailOpeInt;


	public $consultarUsuario  = 'SELECT * FROM OPINTERNO WHERE dniUsu = "$this->dniUsu"';
	public $insertarUsuario   = 'INSERT INTO OPINTERNO(dniUsu,mailOpeInt, telefOpeInt) VALUES ("$this->$dniUsu", "$this->$mailOpeInt", "$this->$telefOpeInt")';
	public $eliminarUsuario   = 'DELETE FROM OPINTERNO WHERE dniUsu = "$this->dniUsu"';
	public $actualizarUsuario = 'UPDATE OPINTERNO SET dniUsu="$this->dniUsu", mailOpeInt = "$this->$mailOpeInt", telefOpeInt="$this->telefOpeInt" where dniUsu= "$this->dniUsu"';

	public function setTelefOpeInt($telef){
		$this->telefOpeInt = $telef;
	}

	public function setMailOpeInt($mail){
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