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
		$sql = mysql_query(" SELECT m.idMaq, s.idServ, MAX(i.idIncid) AS idIncid, m.nomMaq, d.urlDocMaq, d.nDocMaq
		FROM maquina m, servicio s, incidencia i, docmaquina d
		WHERE i.idMaq = m.idMaq AND s.idMaq = m.idMaq AND d.idMaq = m.idMaq  GROUP BY idMaq

		UNION -- SI SERV, NO INCID, SI DOC
		SELECT m.idMaq, s.idServ, NULL, m.nomMaq, d.urlDocMaq, d.nDocMaq
		FROM maquina m, servicio s, docmaquina d
		WHERE NOT EXISTS(
			SELECT idMaq
			FROM incidencia
			WHERE m.idMaq = idMaq
		) AND s.idMaq = m.idMaq AND d.idMaq = m.idMaq GROUP BY idMaq

		UNION -- NO SERV, SI INCID, SI DOC
		SELECT m.idMaq, NULL, MAX(i.idIncid) AS idIncid, m.nomMaq, d.urlDocMaq, d.nDocMaq
		FROM maquina m, incidencia i, docmaquina d
		WHERE NOT EXISTS(
			SELECT idMaq
			FROM servicio
			WHERE m.idMaq = idMaq
		) AND i.idMaq = m.idMaq AND d.idMaq = m.idMaq GROUP BY idMaq

		UNION -- NO SERV, NO INCID, SI DOC
		SELECT m.idMaq, NULL, NULL, m.nomMaq, d.urlDocMaq, d.nDocMaq
		FROM maquina m, docmaquina d
		WHERE NOT EXISTS(
			SELECT idMaq
			FROM incidencia
			WHERE m.idMaq = idMaq
		) AND NOT EXISTS(
			SELECT idMaq
			FROM servicio
			WHERE m.idMaq = idMaq
		) AND d.idMaq = m.idMaq GROUP BY idMaq

		UNION-- SI SERV, SI INCID, NO DOC
		SELECT m.idMaq, s.idServ, MAX(i.idIncid) AS idIncid, m.nomMaq, NULL, NULL
		FROM maquina m, servicio s, incidencia i
		WHERE NOT EXISTS(
			SELECT idMaq
			FROM docmaquina
			WHERE m.idMaq = idMaq
		) AND i.idMaq = m.idMaq AND s.idMaq = m.idMaq  GROUP BY idMaq

		UNION -- SI SERV, NO INCID, NO DOC
		SELECT m.idMaq, s.idServ, NULL, m.nomMaq, NULL, NULL
		FROM maquina m, servicio s
		WHERE NOT EXISTS(
			SELECT idMaq
			FROM incidencia
			WHERE m.idMaq = idMaq
		) AND NOT EXISTS(
			SELECT idMaq
			FROM docmaquina
			WHERE m.idMaq = idMaq
		) AND s.idMaq = m.idMaq GROUP BY idMaq

		UNION -- NO SERV, SI INCID, NO DOC
		SELECT m.idMaq, NULL, MAX(i.idIncid) AS idIncid, m.nomMaq, NULL, NULL
		FROM maquina m, incidencia i
		WHERE NOT EXISTS(
			SELECT idMaq
			FROM servicio
			WHERE m.idMaq = idMaq
		) AND NOT EXISTS(
			SELECT idMaq
			FROM docmaquina
			WHERE m.idMaq = idMaq
		) AND i.idMaq = m.idMaq GROUP BY idMaq

		UNION -- NO SERV, NO INCID, NO DOC
		SELECT m.idMaq, NULL, NULL, m.nomMaq, NULL, NULL
		FROM maquina m
		WHERE NOT EXISTS(
			SELECT idMaq
			FROM incidencia
			WHERE m.idMaq = idMaq
		) AND NOT EXISTS(
			SELECT idMaq
			FROM servicio
			WHERE m.idMaq = idMaq
		) AND NOT EXISTS(
			SELECT idMaq
			FROM docmaquina
			WHERE m.idMaq = idMaq
		) GROUP BY idMaq; ");

		return $sql;
	}


	public function listaMaquinasOpEservicio(){
		$sql = mysql_query("SELECT DISTINCT M.*
		FROM OPEXTERNO O
		INNER JOIN EMPRESA E ON O.cifEmpr = E.cifEmpr
		INNER JOIN SERVICIO S ON O.cifEmpr = S.cifEmpr
		INNER JOIN MAQUINA M ON S.idMaq = M.idMaq
		WHERE O.dniUsu = '".$_SESSION['dni']."'");
		return $sql;
	}

	public function listaMaquinasOpEIncidencia(){
		$sql = mysql_query(
			"SELECT DISTINCT M . * , I.fAper
			FROM OPEXTERNO O
			INNER JOIN INCIDENCIA I ON O.cifEmpr = I.cifEmpr
			INNER JOIN MAQUINA M ON I.idMaq = M.idMaq
			INNER JOIN SERVICIO S ON O.cifEmpr = S.cifEmpr
			WHERE O.dniUsu ='".$_SESSION['dni']."'");

		return $sql;
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
