<?php

class externo {

	private $dniOpeExt;
	private $cifEmpr;

	function __construct($dniOpeExt, $cifEmpr){
		$this->dniOpeExt=$dniOpeExt;
		$this->cifEmpr=$cifEmpr;
	}

	function altaUsuario(){
		$this->ConectDB();
		$sql = "SELECT * FROM OPEXTERNO WHERE dniOpeExt = '$this->dniOpeExt'";
		$resultado = mysql_query($sql) or die(mysql_error());
		if (!$resultado) {
			$sql1="INSERT INTO OPEXTERNO(dniOpeExt, cifEmpr) VALUES ('this->$dniOpeExt','this->$cifEmpr')";
			$resultado1 = mysql_query($sql1) or die(mysql_error());
		} else {
			return false;
		}
	}
	

}

?>