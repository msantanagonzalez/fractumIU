<?php

include_once('usuario.php');

class externo extends usuario {

	private $cifEmpr;

	/**
	 * 
	*	$this->insertarUsuario  = '';
	*	$this->eliminarUsuario = 'DELETE FROM OPEXTERNO WHERE dniUsu = "this->$dniUsu"';
	*	$this->actualizarUsuario = 'UPDATE OPEXTERNO SET dniUsu="$this->dniUsu", cifEmpr="$this->cifEmpr" where dniUsu= "$this->dniUsu"';
	*
	 */

	protected function consultarUsuarioSql(){
		$consultarUsuario  = "SELECT * FROM OPEXTERNO WHERE dniUsu = '$this->dniUsu'";
		$resultado = mysql_query($consultarUsuario) or die(mysql_error());
		return $resultado;
	}

	protected function insertarUsuarioSql(){
		$consultarUsuario  = "INSERT INTO OPEXTERNO(dniUsu, cifEmpr) VALUES ('$this->dniUsu','$this->cifEmpr')";
		$resultado = mysql_query($consultarUsuario) or die(mysql_error());
		return $resultado;
	}


	public function setCifEmpr($cif){
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
*		$sql       = "SELECT * FROM OPEXTERNO WHERE dniUsu = "$this->dniUsu'";
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