<?php

class interno {

	private $dniOpeInt;
	private $telefOpeInt;
	private $mailOpeInt;

	function __construct($dniOpeInt, $telefOpeInt, $mailOpeInt){
		$this->dniOpeInt=$dniOpeInt;
		$this->telefOpeInt=$telefOpeInt;
		$this->mailOpeInt=$mailOpeInt;
	}

	function altaUsuario(){
		$this->ConectDB();
		$sql = "SELECT * FROM OPINTERNO WHERE dniOpeInt = '$this->dniOpeInt'";
		$resultado = mysql_query($sql) or die(mysql_error());
		if (!$resultado) {
			$sql1= "INSERT INTO OPINTERNO(dniOpeInt, telefOpeInt, mailOpeInt) VALUES ('this->$dniOpeInt', 'this->$telefOpeInt','this->$mailOpeInt')";
			$resultado1 = mysql_query($sql1) or die(mysql_error());
		} else {
			return false;
		}
	}
	

}

?>