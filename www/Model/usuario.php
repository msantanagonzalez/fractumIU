<?php

class usuario {

	protected $dniUsu;
	private $nomUsu;
	private $apellUsu;
	private $passUsu;
	private $tipoUsu;

	public $consultarUsuario;
	public $insertarUsuario;
	public $eliminarUsuario;
	public $actualizarUsuario;

/**
*
*		$this->eliminarUsuario ='DELETE FROM USUARIO WHERE dniUsu = "this->$dniUsu"';
*		$this->actualizarUsuario = 'UPDATE USUARIO SET dniUsu="$this->dniUsu", nomUsu ="$this->nomUsu", apellUsu="$this->apellUsu", passUsu="$this->passUsu", tipoUsu="$this->tipoUsu" where dniUsu="$this->dniUsu"';
*	
*
*/

	function __construct($dniUsu, $nomUsu, $apellUsu, $passUsu, $tipoUsu){
		$this->dniUsu   = $dniUsu;
		$this->nomUsu   = $nomUsu;
		$this->apellUsu = $apellUsu;
		$this->passUsu  = $passUsu;
		$this->tipoUsu  = $tipoUsu;
	}

	protected function consultarUsuarioSql(){
		$consultarUsuario  = "SELECT * FROM USUARIO WHERE dniUsu = '$this->dniUsu'";
		$resultado = mysql_query($consultarUsuario) or die(mysql_error());
		return $resultado;
	}

	protected function insertarUsuarioSql(){
		$consultarUsuario  = "INSERT INTO USUARIO(dniUsu, nomUsu, apellUsu, passUsu, tipoUsu) VALUES ('$this->dniUsu', '$this->nomUsu','$this->apellUsu','$this->passUsu','$this->tipoUsu')";
		$resultado = mysql_query($consultarUsuario) or die(mysql_error());
		return $resultado;
	}


	public function login(){
		$sql = "SELECT tipoUsu FROM USUARIO WHERE dniUsu = '$this->dniUsu' and passUsu = '$this->passUsu'";
		$result = mysql_query($sql) or die(mysql_error());
		if (mysql_num_rows($result) == 0){
			return false;
		} else {
			session_start();
			$_SESSION["dni"]  = $this->dniUsu;
			$_SESSION["tipo"] = $this->tipoUsu;
			return $result;
		}
	}

	public function getTipoUsu(){
		return $this->tipoUsu;
	}

	public function altaUsuario(){
		$resultado = $this->consultarUsuarioSql();

		/** $resultado = $consultarUsuario -> execute() or die(mysql_error()); */
		if ($resultado) {
			$resultado1 = $this->insertarUsuarioSql();
			return true;
		} else {
			return false;
		}

	}

	
	public function bajaUsuario(){
		$sql = "SELECT dniUsu FROM USUARIO WHERE dniUsu = '$this->dniUsu'";
		$resultado = mysql_query($sql) or die(mysql_error());
		if (!$resultado) {
			return false;
		} else {
			$resultado1 = mysql_query($eliminarUsuario) or die(mysql_error());	
			return true;
		}
	}

	public function modificarUsuario(){
		$resultado = mysql_query($consultarUsuario) or die(mysql_error());
		if ($resultado) {
			$resultado1 = mysql_query($actualizarUsuario) or die(mysql_error());
			return true;
		} else {
			return false;
		}
	}

	public function consultarUsuario(){
		$resultado = mysql_query($consultarUsuario) or die(mysql_error());
		if ($resultado) {
			return $resultado;
		} else {
			return false;
		}
	}

}

?>