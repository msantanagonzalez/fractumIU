<?php

	class Iteracion{
		private $idIncid;
		private $nIteracion;
		private $fechaIter;
		private $hInicio;
		private $hFin;
		private $estadoItera;
		private $descripIter;
		private $costeIter;

		public function __construct($idIncid = NULL, $nIteracion = NULL, $fechaIter = NULL, $hInicio = NULL, $hFin = NULL, 
									$estadoItera = NULL, $descripIter = NULL, $costeIter = NULL){
			$this->idIncid = $idIncid;
			$this->nIteracion = $nIteracion;
			$this->fechaIter = $fechaIter;
			$this->hInicio = $hInicio;
			$this->hFin = $hFin;
			$this->estadoItera = $estadoItera;
			$this->descripIter = $descripIter;
			$this->costeIter = $costeIter;
		}

		public function alta(){
			mysql_query("INSERT INTO ITERACION(idIncid, nIteracion, fechaIter, hInicio, hFin, estadoItera, descripIter, costeIter) 
						VALUES ('$this->idInciD','$this->nIteracion','$this->fechaIter','$this->hInicio','$this->hFin','$this->estadoItera',
							'$this->descripIter','$this->costeIter')") or die(mysql_error());
		}

		public function consulta($idIncid, $nIteracion){
			$sql = mysql_query("SELECT * FROM ITERACION WHERE idIncid = '$incidencia' AND nIteracion = '$nIteracion'") or die(mysql_error());

			return $sql;
		}

		public function modificacion($idIncidencia, $nIteracion){
			mysql_query("UPDATE INCIDENCIA SET hFin = '$this->hFin', estadoItera = '$this->estadoItera', descripIter = '$this->descripIter', 
				costeIter = '$this->costeIter' WHERE idIncid = '$idIncidencia' AND nIteracion='$nIteracion'") or die(mysql_error());
		}

		public function lista(){
			$sql = mysql_query("SELECT * FROM ITERACION");

			return $sql;
		}

	}
?>