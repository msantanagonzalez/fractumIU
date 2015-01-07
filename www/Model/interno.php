<?php
include_once('usuario.php');

class interno extends usuario {

	private $telefOpeInt;
	private $mailOpeInt;


	/**
	 * Sin constructor, heredado de la class usuario, solamente setters para sus valores propios.
	 */

	public function setTelefOpeInt($telef){
		$this->telefOpeInt = $telef;
	}

	public function setMailOpeInt($mail){
		$this->mailOpeInt = $mail;
	}

	/**
	 * Funciones SQL difirenciadas en cada clase.
	 */

	protected function consultarUsuarioSql(){
		$consultarUsuario  = "SELECT * FROM OPINTERNO WHERE dniUsu = '$this->dniUsu'";
		$resultado = mysql_query($consultarUsuario) or die(mysql_error());
		return $resultado;
	}

	protected function insertarUsuarioSql(){
		$insertarUsuario  = "INSERT INTO OPINTERNO(dniUsu, telefOpeInt, mailOpeInt) VALUES ('$this->dniUsu', '$this->telefOpeInt', '$this->mailOpeInt')";
		$resultado = mysql_query($insertarUsuario) or die(mysql_error());
		return $resultado;
	}

	protected function eliminarUsuarioSql(){
		$eliminarUsuario = "DELETE FROM OPINTERNO WHERE dniUsu = '$this->dniUsu'";
		$resultado = mysql_query($eliminarUsuario) or die(mysql_error());
		return $resultado;
	}

	protected function actualizarUsuarioSql(){
		$actualizarUsuario = "UPDATE OPINTERNO SET mailOpeInt = '$this->$mailOpeInt', telefOpeInt='$this->telefOpeInt' where dniUsu= '$this->dniUsu'";
		$resultado = mysql_query($actualizarUsuario) or die(mysql_error());
		return $resultado;
	}
	
	public function altaUsuario(){
		$resultado = $this->consultarUsuarioSql();
		if ($resultado) {
			$resultado1 = $this->insertarUsuarioSql();
			return true;
		} else {
			return false;
		}
	}
	
	public function bajaUsuario(){
		$resultado = $this->consultarUsuarioSql();
		if ($resultado) {
			$resultado1 = $this->eliminarUsuarioSql();
			return true;
		} else {
			return false;
		}
	}

	public function listarInternos(){
		$sql = "SELECT * FROM USUARIO,OPINTERNO WHERE USUARIO.dniUsu = OPINTERNO.dniUsu";
		$resul1 = mysql_query($sql) or die(mysql_error());
		return $resul1;
	}
	
	public function consultarUsuario(){
		$resultado = $this->consultarUsuarioSql();
		if ($resultado) {
			return $resultado;
		} else {
			return false;
		}
	}
}
?>