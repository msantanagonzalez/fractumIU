<?php

class buscador{

	private $datos;
	/**
	*	Constructor de usuarios.
	*/

	function __construct($datos){
		$this->datos   = $datos;
	}
	/**
	 * Inicio de las funciones SQL
	 */
	protected function buscarIncidenciaSql(){
		$consultarIncidencia  = "SELECT * FROM INCIDENCIA WHERE idIncid LIKE '%$this->datos%' OR dniResponsable LIKE '%$this->datos%' OR dniApertura LIKE '%$this->datos%' OR idMaq LIKE '%$this->datos%' OR cifEmpr LIKE '%$this->datos%'";
 		$resultado = mysql_query($consultarIncidencia) or die(mysql_error());
 		return $resultado;
 	}
	protected function buscarIncidenciaInternoSql(){
		$consultarIncidencia  = "SELECT * FROM INCIDENCIA WHERE derivada=0 AND idIncid LIKE '%$this->datos%' OR dniResponsable LIKE '%$this->datos%' OR dniApertura LIKE '%$this->datos%' OR idMaq LIKE '%$this->datos%' OR cifEmpr LIKE '%$this->datos%'";
 		$resultado = mysql_query($consultarIncidencia) or die(mysql_error());
 		return $resultado;
 	}
	protected function buscarIncidenciaExternoSql(){
		$consultarIncidencia  = "SELECT * FROM INCIDENCIA INNER JOIN MAQUINA ON MAQUINA.idMaq=INCIDENCIA.idMaq WHERE INCIDENCIA.derivada=1 AND INCIDENCIA.idIncid LIKE '%$this->datos%' OR INCIDENCIA.dniResponsable LIKE '%$this->datos%' OR INCIDENCIA.idMaq LIKE '%$this->datos%' OR INCIDENCIA.cifEmpr LIKE '%$this->datos%' OR MAQUINA.nSerie LIKE '%$this->datos%'";
 		$resultado = mysql_query($consultarIncidencia) or die(mysql_error());
 		return $resultado;
 	}
	protected function buscarOpInternoSql(){
		$consultarInterno  = "SELECT * FROM USUARIO INNER JOIN OPINTERNO ON USUARIO.dniUsu=OPINTERNO.dniUsu WHERE USUARIO.dniUsu LIKE '%$this->datos%' OR USUARIO.nomUsu LIKE '%$this->datos%' OR USUARIO.apellUsu LIKE '%$this->datos%' OR OPINTERNO.telefOpeInt LIKE '%$this->datos%' OR OPINTERNO.mailOpeInt LIKE '%$this->datos%'";
		$resultado = mysql_query($consultarInterno) or die(mysql_error());
		return $resultado;
	}
	protected function buscarOpExternoSql(){
		$consultarExterno  = "SELECT * FROM USUARIO INNER JOIN OPEXTERNO ON USUARIO.dniUsu=OPEXTERNO.dniUsu INNER JOIN EMPRESA ON OPEXTERNO.cifEmpr=EMPRESA.cifEmpr WHERE OPEXTERNO.dniUsu LIKE '%$this->datos%' OR OPEXTERNO.cifEmpr LIKE '%$this->datos%'";
		$resultado = mysql_query($consultarExterno) or die(mysql_error());
		return $resultado;
	}
	protected function buscarMaquinaSql(){
		$consultarMaquina  = "SELECT * FROM MAQUINA WHERE idMaq LIKE '%$this->datos%' OR nSerie LIKE '%$this->datos%'";
		$resultado = mysql_query($consultarMaquina) or die(mysql_error());
		return $resultado;
	}
	protected function buscarMaquinaExternoSql(){
		$consultarMaquina  = "SELECT * FROM INCIDENCIA INNER JOIN MAQUINA ON MAQUINA.idMaq=INCIDENCIA.idMaq WHERE INCIDENCIA.derivada=1 AND MAQUINA.idMaq LIKE '%$this->datos%' OR MAQUINA.nSerie LIKE '%$this->datos%' OR INCIDENCIA.idIncid LIKE '%$this->datos%' OR INCIDENCIA.cifEmpr LIKE '%$this->datos%'";
		$resultado = mysql_query($consultarMaquina) or die(mysql_error());
		return $resultado;
	}
	protected function buscarServicioSql(){
		$consultarMaquina  = "SELECT * FROM SERVICIO WHERE idServ LIKE '%$this->datos%' OR dniUsu LIKE '%$this->datos%' OR cifEmpr LIKE '%$this->datos%' OR idMaq LIKE '%$this->datos%'";
		$resultado = mysql_query($consultarMaquina) or die(mysql_error());
		return $resultado;
	}
/*
	protected function busquedaJefeSql(){
		$busquedaJefe  = "SELECT INCIDENCIA.*, USUARIO.*, MAQUINA.*
		FROM INCIDENCIA,USUARIO,MAQUINA
		WHERE 'INCIDENCIA.idIncid' LIKE %datos% OR 'USUARIO.dniUsu' LIKE %datos% OR 'MAQUINA.idMaq' LIKE %datos%";
		//$consultarMaquina  = "SELECT * FROM MAQUINA WHERE idMaq LIKE %datos% OR nSerie LIKE %datos%";
		$resultado = mysql_query($consultarMaquina) or die(mysql_error());
		return $resultado;
	} +/

	/**
	 * Fin de las funciones SQL
	 */

	public function buscarIncidencia(){
		$resultado = $this->buscarIncidenciaSql();
		if ($resultado) {
			return $resultado;
		} else {
			return false;
		}
	}

	public function buscarIncidenciaInterno(){
		$resultado = $this->buscarIncidenciaInternoSql();
		if ($resultado) {
			return $resultado;
		} else {
			return false;
		}
	}

	public function buscarIncidenciaExterno(){
		$resultado = $this->buscarIncidenciaExternoSql();
		if ($resultado) {
			return $resultado;
		} else {
			return false;
		}
	}

	public function buscarOpInterno(){
		$resultado = $this->buscarOpInternoSql();
		if ($resultado) {
			return $resultado;
		} else {
			return false;
		}
	}

	public function buscarOpExterno(){
		$resultado = $this->buscarOpExternoSql();
		if ($resultado) {
			return $resultado;
		} else {
			return false;
		}
	}

	public function buscarMaquina(){
		$resultado = $this->buscarMaquinaSql();
		if ($resultado) {
			return $resultado;
		} else {
			return false;
		}
	}

	public function buscarMaquinaExterno(){
		$resultado = $this->buscarMaquinaExternoSql();
		if ($resultado) {
			return $resultado;
		} else {
			return false;
		}
	}

	public function buscarServicio(){
		$resultado = $this->buscarServicioSql();
		if ($resultado) {
			return $resultado;
		} else {
			return false;
		}
	}
}

?>
