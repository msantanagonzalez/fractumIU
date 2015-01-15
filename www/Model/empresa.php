<?php

class Empresa {

	private $cifEmpr;
	private $nomEmpr;
	private $telefEmpr;
	private $mailEmpr;

	/**
	*	Constructor de empresas.
	*/

	function __construct($cifEmpr = NULL, $nomEmpr = NULL, $telefEmpr = NULL, $mailEmpr = NULL){
		$this->cifEmpr   = $cifEmpr;
		$this->nomEmpr   = $nomEmpr;
		$this->telefEmpr = $telefEmpr;
		$this->mailEmpr  = $mailEmpr;
	}

	/**
	 * Inicio de las funciones SQL
	 */

	public function altaEmpresa(){
		mysql_query("INSERT INTO EMPRESA(cifEmpr, nomEmpr, telefEmpr, mailEmpr) VALUES ('$this->cifEmpr','$this->nomEmpr','$this->telefEmpr','$this->mailEmpr')") or die(mysql_error());
	}

	public function consultaEmpresa($cifEmpr){
		$sql = mysql_query("SELECT * FROM EMPRESA WHERE cifEmpr = '$cifEmpr'") or die(mysql_error());
		return $sql;
	}
	
	public function modificarEmpresa($cifEmpr){
		$actualizarEmpresa = "UPDATE EMPRESA SET nomEmpr ='$this->nomEmpr', telefEmpr='$this->telefEmpr', mailEmpr='$this->mailEmpr' where cifEmpr='$this->cifEmpr'";
		$resultado = mysql_query($actualizarEmpresa) or die(mysql_error());
		return $resultado;
	}
	
	public function listarEmpresas(){
		$sql = mysql_query("SELECT * FROM EMPRESA") or die(mysql_error());
		return $sql;
	}

	public function bajaEmpresa(){
		$eliminarEmpresa = "DELETE FROM EMPRESA WHERE cifEmpr = '$this->cifEmpr'";
		$resultado = mysql_query($eliminarEmpresa) or die(mysql_error());

		return $resultado;
	}
	/**
	 * Fin de las funciones SQL
	 */
	
}

?>