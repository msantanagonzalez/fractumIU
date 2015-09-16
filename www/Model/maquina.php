<?php
/**
* Clase maquina
*/


class Maquina {

	private $idMaquina;
	private $numeroSerie;
	private $descripcionMaquina;
	private $nombreMaquina;
	private $costeMaquina;



	/*Constructor de maquina.*/

	function __construct($idMaquina = NULL, $numeroSerie = NULL, $descripcionMaquina = NULL, $nombreMaquina = NULL, $costeMaquina = NULL){
		$this->idMaquina     	   = $idMaquina;
		$this->numeroSerie    	   = $numeroSerie;
		$this->descripcionMaquina  = $descripcionMaquina;
		$this->nombreMaquina       = $nombreMaquina;
		$this->costeMaquina  	   = $costeMaquina;
	}

	/*Inicio de las funciones SQL*/

	public function alta(){
		if(!mkdir("../Resources/documents/".$this->idMaquina)){ die('Fallo al crear las carpetas...'); }
		mysql_query(
			"INSERT INTO MAQUINA(idMaq, nSerie, descripMaq, nomMaq, costeMaq)
			VALUES ('$this->idMaquina','$this->numeroSerie','$this->descripcionMaquina','$this->nombreMaquina','$this->costeMaquina')")
			or die(mysql_error());
	}

	public function consultaMaquina($maquina){
			$sql = mysql_query( "SELECT * FROM MAQUINA WHERE idMaq = '$maquina'") or die(mysql_error());
			return $sql;
		}


	public function modificacion($idMaquina){
		mysql_query(
			"UPDATE MAQUINA SET nomMaq = '$this->nombreMaquina', costeMaq = '$this->costeMaquina',descripMaq = '$this->descripcionMaquina',nSerie = '$this->numeroSerie'
			WHERE idMaq = '$idMaquina'")
		or die(mysql_error());
	}


	public function lista(){
		$sql = mysql_query("SELECT * FROM MAQUINA");
		return $sql;
	}

	public function listaJefe(){
		$sql = mysql_query(
			"SELECT m.idMaq, s.idServ, max(i.idIncid) idIncid, m.nomMaq, d.urlDocMaq
			FROM maquina m
			RIGHT JOIN incidencia i ON m.idMaq = i.idMaq
			RIGHT JOIN servicio s ON m.idMaq = s.idMaq
			RIGHT JOIN docmaquina d ON m.idMaq = d.idMaq
			WHERE m.idMaq IS NOT NULL GROUP BY m.idMaq

			UNION

			SELECT m.idMaq, s.idServ, max(i.idIncid) idIncid, m.nomMaq, d.urlDocMaq
			FROM maquina m
			LEFT JOIN incidencia i ON m.idMaq = i.idMaq
			LEFT JOIN servicio s ON m.idMaq = s.idMaq
			LEFT JOIN docmaquina d ON m.idMaq = d.idMaq
			WHERE m.idMaq IS NOT NULL GROUP BY m.idMaq;"
		); return $sql;
	}

	public function listaExterno($cifEmpr){
		$sql = mysql_query(
			"SELECT m.idMaq, s.idServ, max(i.idIncid) idIncid, m.nomMaq, d.urlDocMaq
			FROM MAQUINA m
			RIGHT JOIN INCIDENCIA i ON m.idMaq = i.idMaq
			RIGHT JOIN SERVICIO s ON m.idMaq = s.idMaq
			RIGHT JOIN DOCMAQUINA d ON m.idMaq = d.idMaq
			WHERE m.idMaq IS NOT NULL 
			AND i.cifEmpr = '$cifEmpr' OR s.cifEmpr = '$cifEmpr' GROUP BY m.idMaq 

			UNION

			SELECT m.idMaq, s.idServ, max(i.idIncid) idIncid, m.nomMaq, d.urlDocMaq
			FROM MAQUINA m
			LEFT JOIN INCIDENCIA i ON m.idMaq = i.idMaq
			LEFT JOIN SERVICIO s ON m.idMaq = s.idMaq
			LEFT JOIN DOCMAQUINA d ON m.idMaq = d.idMaq
			WHERE m.idMaq IS NOT NULL 
			AND i.cifEmpr = '$cifEmpr' OR s.cifEmpr = '$cifEmpr' GROUP BY m.idMaq;"
		); return $sql;
	}


	public function borrar(){
		$borrarMaquina = "DELETE FROM MAQUINA WHERE idMaq = '$this->idMaquina'";
		$resultado = mysql_query($borrarMaquina) or die(mysql_error());
		return $resultado;
	}

	public function listaMaquinaSinServicio(){
		$sql = mysql_query("SELECT idMaq,nomMaq FROM MAQUINA t1 WHERE NOT EXISTS(SELECT idMaq FROM SERVICIO t2 WHERE t1.idMaq = t2.idMaq)");
		return $sql;
	}

	public function setPathImage($idMaq,$path,$nombreArchivo){
		$sql = "INSERT INTO DOCMAQUINA(idMaq,urlDocMaq,nDocMaq)VALUES('$idMaq','$path','$nombreArchivo')";
		mysql_query($sql) or die(mysql_error());
	}

	public function delPathImage($idMaq){
		$sql = "DELETE FROM DOCMAQUINA WHERE idMaq = '$idMaq'";
		mysql_query($sql) or die(mysql_error());
	}

	public function getPathImage($idMaq){
		$sql = "SELECT * FROM DOCMAQUINA WHERE idMaq = '$idMaq'";
		$resultado = mysql_query($sql) or die(mysql_error());
		return $resultado;
	}

	public function listarIncidenciasAsociadas($idMaquina){
		$resultado = mysql_query("SELECT idIncid, dniResponsable, dniApertura, estadoIncid FROM INCIDENCIA i WHERE idMaq = '$idMaquina'") or die(mysql_error());
		return $resultado;
	}

	public function listarServiciosAsociados($idMaquina){
		$resultado = mysql_query("SELECT idServ, periodicidad, costeSer FROM SERVICIO WHERE idMaq='$idMaquina'") or die(mysql_error());
		return $resultado;
	}

}

?>
