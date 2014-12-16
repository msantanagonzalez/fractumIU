<?php
include ('../Controller/bdController.php');

class usuario {

	protected $dniUsu;
	private $nomUsu;
	private $apellUsu;
	private $passUsu;
	private $tipoUsu;

	protected $consultarUsuario  = "SELECT * FROM USUARIO WHERE dniUsu = '$this->dniUsu'";
	protected $insertarUsuario   = "INSERT INTO USUARIO(dniUsu, nomUsu, apellUsu, passUsu, tipoUsu) VALUES ('$this->dniUsu', '$this->nomUsu','$this->apellUsu','$this->passUsu','$this->tipoUsu')";
	protected $eliminarUsuario   = "DELETE FROM USUARIO WHERE dniUsu = 'this->$dniUsu'";
	protected $actualizarUsuario = "UPDATE USUARIO SET dniUsu='$this->dniUsu', nomUsu ='$this->nomUsu', apellUsu='$this->apellUsu', passUsu='$this->passUsu', tipoUsu='$this->tipoUsu' where dniUsu='$this->dniUsu'";



	function __construct($dniUsu, $nomUsu, $apellUsu, $passUsu, $tipoUsu){
		$this->dniUsu   =$dniUsu;
		$this->nomUsu   =$nomUsu;
		$this->apellUsu =$apellUsu;
		$this->passUsu  =$passUsu;
		$this->tipoUsu  =$tipoUsu;
	}

	private function login(){
		$this->ConectDB();
		$sql = "SELECT tipoUsu FROM USUARIO WHERE dniUsu = '$this->dniUsu' and passUsu = '$this->passUsu'";
		$result = mysql_query($sql) or die(mysql_error());
		if (!$result){
			return false;
		} else {
			return $result;
		}
	}

	private function getTipoUsu(){
		return $this->tipoUsu;
	}

	protected function altaUsuario(){
		$this->ConectDB();
		$resultado = mysql_query($consultarUsuario) or die(mysql_error());
		if (!$resultado) {
			$resultado1 = mysql_query($insertarUsuario) or die(mysql_error());
		} else {
			return false;
		}

	}

	
	protected function bajaUsuario(){
		$this->ConectDB();
		$sql = "SELECT dniUsu FROM USUARIO WHERE dniUsu = '$this->dniUsu'";
		$resultado = mysql_query($sql) or die(mysql_error());
		if (!$resultado) {
			return false;
		} else {
			$resultado1 = mysql_query($eliminarUsuario) or die(mysql_error());	
			return true;
		}
	}

	protected function modificarUsuario(){
		$this->ConectDB();
		$resultado = mysql_query($consultarUsuario) or die(mysql_error());
		if ($resultado) {
			$resultado1 = mysql_query($actualizarUsuario) or die(mysql_error());
		} else {
			return false;
		}
	}

}

?>