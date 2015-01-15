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

		public function consulta(){
			$sql = mysql_query("SELECT * FROM ITERACION WHERE idIncid = '$this->idIncid' AND nIteracion = '$this->nIteracion'") or die(mysql_error());

			return $sql;
		}

		public function modificacion(){
			mysql_query("UPDATE ITERACION SET hFin = '$this->hFin', descripIter = '$this->descripIter', 
				costeIter = '$this->costeIter' WHERE idIncid = '$this->idIncid' AND nIteracion = '$this->nIteracion'") or die(mysql_error());
		}

		public function lista(){
			$sql = mysql_query("SELECT * FROM ITERACION WHERE idIncid = '$this->idIncid'");

			return $sql;
		}

		/**
		 * Devuelve true con la iteracion cerrada, y false con la iteracion abierta
		 */
		public function estadoIteracion(){
			$sql = mysql_query("SELECT estadoItera FROM ITERACION WHERE idIncid = '$this->idIncid' AND nIteracion='$this->nIteracion'") or die(mysql_error());
			$estado = mysql_fetch_array($sql);
			if($estado == 0){
				return false;
			} else {
				return true;
			}

		}

		public function cerrarIteracion(){
			mysql_query("UPDATE INCIDENCIA SET  estadoItera = '1' WHERE idIncid = '$this->idIncidencia' AND nIteracion='$this->nIteracion'") or die(mysql_error());
		}

	}
?>