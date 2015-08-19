<?php 
/**
* Clase jefe que hereda de clase usuario.
*/

require_once $_SESSION['cribPath'].'Model/usuario.php';

class jefe extends usuario {
	private $telefJefe;
	private $mailJefe;

	/**
	* Usa el mismo constructor que usuario, solamente le damos valor a esos atributos
	*/

	public function setTelefJefe($telef){
		$this->telefJefe = $telef;
	}

	public function setMailJefe($mail){
		$this->mailJefe = $mail;
	}

	/**
	 * Funciones Sobreescritas de la clase usuario en la clase JEFE necesarias para insetar, borrar, modificar y actualizar la clase JEFE
	 */
	protected function consultarUsuarioSql(){
		$consultarUsuario  = "SELECT * FROM JEFE WHERE dniUsu = '$this->dniUsu'";
		$resultado = mysql_query($consultarUsuario) or die(mysql_error());
		return $resultado;
	}

	protected function insertarUsuarioSql(){
		$insertarUsuario  = "INSERT INTO JEFE(dniUsu, telefJefe ,mailJefe) VALUES ('$this->dniUsu','$this->telefJefe','$this->mailJefe')";
		$resultado = mysql_query($insertarUsuario) or die(mysql_error());
		return $resultado;
	}

	protected function eliminarUsuarioSql(){
		$eliminarUsuario =  "DELETE FROM JEFE WHERE dniUsu = '$this->dniUsu'";
		$resultado = mysql_query($eliminarUsuario) or die(mysql_error());
		return $resultado;
	}

	protected function actualizarUsuarioSql(){
		$actualizarUsuario = "UPDATE JEFE SET telefJefe='$this->telefJefe', mailJefe='$this->mailJefe' where dniUsu= '$this->dniUsu'";
		$resultado = mysql_query($actualizarUsuario) or die(mysql_error());
		return $resultado;
	}
	
	public function consultarUsuario(){
		$resultado = $this->consultarUsuarioSql();
		if ($resultado) {
			return $resultado;
		} else {
			return false;
		}
	}
	
	public function modificarUsuario(){
		$resultado = $this->consultarUsuarioSql();
		if ($resultado) {
			$resultado1 = $this->actualizarUsuarioSql();
			return true;
		} else {
			return false;
		}
	}

}


?>


