<?php
	include '../Controller/bdController.php';
	include 'usuario.php';

	class Incidencia{
		private $idIncidencia;
		private $fechaApertura;
		private $fechaCierre;
		private $dniJefe;
		private $dniOperarioInterno;
		private $idMaquina;
		private $estadoIncidencia;
		private $derivada;

		public function __construct($idIncidencia = NULL, $fechaApertura = NULL, $fechaCierre = NULL, $dniJefe = NULL, $dniOperarioInterno = NULL, 
									$idMaquina = NULL, $estadoIncidencia = NULL, $derivada = NULL){
			$this->idIncidencia = $idIncidencia;
			$this->fechaApertura = $fechaApertura;
			$this->fechaCierre = $fechaCierre;
			$this->dniJefe = $dniJefe;
			$this->dniOperarioInterno = $dniOperarioInterno;
			$this->idMaquina = $idMaquina;
			$this->estadoIncidencia = $estadoIncidencia;
			$this->derivada = $derivada;
		}

		public function setIdIncidencia($idIncidencia){
			$this->idIncidencia = $idIncidencia;
		}

		public function setFechaApertura($fechaApertura){
			$this->fechaApertura = $fechaApertura;
		}

		public function setFechaCierre($fechaCierre){
			$this->fechaCierre = $fechaCierre;
		}

		public function setDniJefe($dniJefe){
			$this->dniJefe = $dniJefe;
		}

		public function setDniOperarioInterno($dniOperarioInterno){
			$this->dniOperarioInterno = $dniOperarioInterno;
		}

		public function setIdMaquina($idMaquina){
			$this->idMaquina = $idMaquina;
		}

		public function setEstadoIncidencia($estadoIncidencia){
			$this->estadoIncidencia = $estadoIncidencia;
		}

		public function setDerivada($derivada){
			$this->derivada = $derivada;
		}


		public function alta(){
			$this->ConectDB();

			mysql_query("INSERT INTO incidencia(idIncid, fAper, fCier, dniJefe, dniOpeInt, idMaq, estadoIncid, derivada) 
						VALUES('$idIncidencia','$fechaApertura','fechaCierre','$dniJefe','$dniOperarioInterno','$idMaquina','$estadoIncidencia','$derivada')")
						or die();
		}

		public function consultaIncidencia($incidencia){
			$this->ConectDB();

			$sql = mysql_query("SELECT * FROM incidencia WHERE idIncid = '$incidencia'") or die();

			return $sql;
		}

		public function listadoMaquinas(){
			$this->ConectDB();

			$sql = mysql_query("SELECT * FROM maquina") or die();

			return $sql;
		}

		public function modificacion($incidencia){
			$this->ConectDB();

			if(isset($_POST['responsable'])){
				$responsable = $_POST['responsable'];
				mysql_query("UPDATE incidencia SET responsable = '$responsable' WHERE idIncid = '$incidencia'");
			}
		}

		public function lista(){
			$this->ConectDB();

			$sql = mysql_query("SELECT * FROM incidencia");

			return $sql;
		}
	}
?>