<?php
	include 'usuario.php';

	class Incidencia{
		private $idIncidencia;
		private $fechaApertura;
		private $fechaCierre;
		private $dniResponsable;
		private $dniApertura;
		private $idMaquina;
		private $estadoIncidencia;
		private $derivada;

		public function __construct($idIncidencia = NULL, $fechaApertura = NULL, $fechaCierre = NULL, $dniResponsable = NULL, $dniApertura = NULL, 
									$idMaquina = NULL, $estadoIncidencia = NULL, $derivada = NULL, $descripcion = NULL){
			$this->idIncidencia = $idIncidencia;
			$this->fechaApertura = $fechaApertura;
			$this->fechaCierre = $fechaCierre;
			$this->dniResponsable = $dniResponsable;
			$this->dniApertura = $dniApertura;
			$this->idMaquina = $idMaquina;
			$this->estadoIncidencia = $estadoIncidencia;
			$this->derivada = $derivada;
			$this->descripcion = $descripcion;
		}

		public function alta(){
			mysql_query("INSERT INTO INCIDENCIA(idIncid, fAper, fCier, dniResponsable, dniApertura, idMaq, estadoIncid, derivada, descripIncid) 
						VALUES ('$this->idIncidencia','$this->fechaApertura','$this->fechaCierre','$this->dniResponsable','$this->dniApertura','$this->idMaquina',
							'$this->estadoIncidencia','$this->derivada', '$this->descripcion')") or die(mysql_error());
		}

		public function consultaIncidencia($incidencia){
			$sql = mysql_query("SELECT * FROM INCIDENCIA WHERE idIncid = '$incidencia'") or die(mysql_error());

			return $sql;
		}

		public function modificacion($idIncidencia){
			mysql_query("UPDATE INCIDENCIA SET fAper = '$this->fechaApertura', fCier = '$this->fechaCierre', dniResponsable = '$this->dniResponsable', 
				estadoIncid = '$this->estadoIncidencia' WHERE idIncid = '$idIncidencia'") or die(mysql_error());
		}

		public function lista(){
			$sql = mysql_query("SELECT * FROM INCIDENCIA");

			return $sql;
		}

		public function pendientes(){
			$sql = mysql_query("SELECT * FROM INCIDENCIA WHERE estadoIncid = '$this->estadoIncidencia' ORDER BY estadoIncid") or die(mysql_error());

			return $sql;
		}

		public function contarPendientes(){
			$sql = mysql_query("SELECT count(*) as num FROM INCIDENCIA WHERE estadoIncid = 'Abierta'") or die(mysql_error());

			return $sql;
		}
	}
?>