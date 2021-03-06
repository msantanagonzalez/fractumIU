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
		private $dniUsu;

		public function __construct($idIncid = NULL, $nIteracion = NULL, $fechaIter = NULL, $hInicio = NULL, $hFin = NULL,
									$estadoItera = NULL, $descripIter = NULL, $costeIter = NULL, $dniUsu = NULL){
			$this->idIncid = $idIncid;
			$this->nIteracion = $nIteracion;
			$this->fechaIter = $fechaIter;
			$this->hInicio = $hInicio;
			$this->hFin = $hFin;
			$this->estadoItera = $estadoItera;
			$this->descripIter = $descripIter;
			$this->costeIter = $costeIter;
			$this->dniUsu = $dniUsu;
		}

		public function setEstado($estadoItera){

			$this->estadoItera = $estadoItera;

		}

		public function alta(){
			mysql_query("INSERT INTO ITERACION(idIncid, nIteracion, fechaIter, hInicio, hFin, estadoItera, descripIter, costeIter, dniUsu)
						VALUES ('$this->idIncid','$this->nIteracion','$this->fechaIter','$this->hInicio','$this->hFin','$this->estadoItera',
							'$this->descripIter','$this->costeIter','$this->dniUsu')") or die(mysql_error());
		}

/*		NO USO ESTE METODO CONSULTA PORQUE NECESITO USAR EL ID DE MÁQUINA PARA MODIFICAR DESDE LA CONSULTA POR ESO USO EL DE DEBAJO
		public function consulta(){
			$sql = mysql_query("SELECT * FROM ITERACION WHERE idIncid = '$this->idIncid' AND nIteracion = '$this->nIteracion'") or die(mysql_error());

			return $sql;
		}*/

		public function consulta(){
			$sql = mysql_query("SELECT * FROM ITERACION, INCIDENCIA WHERE ITERACION.idIncid=INCIDENCIA.idIncid AND ITERACION.idIncid = '$this->idIncid' AND ITERACION.nIteracion = '$this->nIteracion'") or die(mysql_error());

			return $sql;
		}

		public function modificacion(){
			mysql_query("UPDATE ITERACION SET hFin = '$this->hFin', descripIter = '$this->descripIter',
				costeIter = '$this->costeIter' WHERE idIncid = '$this->idIncid' AND nIteracion = '$this->nIteracion'") or die(mysql_error());
		}

		public function modEstado(){
			mysql_query("UPDATE ITERACION SET estadoItera = '$this->estadoItera' WHERE idIncid = '$this->idIncid' AND nIteracion = '$this->nIteracion'") or die(mysql_error());
		}

		public function lista($idIncid){
			$sql = mysql_query("SELECT i.idIncid, i.nIteracion, i.dniUsu, i.estadoItera, d.urlDocItr, i.costeIter FROM ITERACION i JOIN DOCITERACION d WHERE i.idIncid = '$idIncid' AND i.nIteracion=d.nIteracion GROUP BY nIteracion
			UNION
			SELECT i.idIncid, i.nIteracion, i.dniUsu, i.estadoItera, NULL, i.costeIter FROM ITERACION i WHERE i.idIncid = '$idIncid' AND NOT EXISTS(SELECT nIteracion FROM DOCITERACION WHERE i.nIteracion=nIteracion) GROUP BY nIteracion
			ORDER BY 1");

			return $sql;
		}

		public function listaItHomeI($idIncid){
			$sql = mysql_query("SELECT dniUsu FROM ITERACION WHERE idIncid = '$idIncid' ORDER BY fechaIter DESC");

			return $sql;
		}

		public function listaIteracionesHomeI($idIncid){
			$sql = mysql_query("SELECT fechaIter FROM iteracion WHERE idIncid = '$idIncid' ORDER BY fechaIter DESC");

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
			mysql_query("UPDATE ITERACION SET estadoItera = '1' WHERE idIncid = '$this->idIncidencia' AND nIteracion='$this->nIteracion'") or die(mysql_error());
		}

		public function nextId(){
			$sql = mysql_query("SELECT MAX(nIteracion) FROM ITERACION") or die(mysql_error());
			if(!$sql){
				return 1;
			} else {
				return $sql;
			}

		}

		public function existe(){
			$sql = mysql_query("SELECT nIteracion FROM ITERACION") or die(mysql_error());
			if(!$sql){
				return false;
			} else {
				return true;
			}
		}

		public function setPathImage($idI,$id,$path,$nombreArchivo){
			$sql = "INSERT INTO DOCITERACION(idIncid,nIteracion,urlDocItr,nDocIter)VALUES('$idI','$id','$path','$nombreArchivo')";
			mysql_query($sql) or die(mysql_error());
		}

		public function delPathImage($idIncid,$nIteracion){
			$sql = "DELETE FROM DOCITERACION WHERE idIncid = '$idIncid' AND nIteracion = '$nIteracion'";
			mysql_query($sql) or die(mysql_error());
		}

		public function getPathImage($idIncid,$nIteracion){
			$sql = "SELECT * FROM DOCITERACION WHERE idIncid = '$idIncid' AND nIteracion = '$nIteracion'";
			$resultado = mysql_query($sql) or die(mysql_error());
			return $resultado;
		}

		public function ultimaIteraIncid($idIncid){
			$sql = mysql_query("SELECT estadoItera FROM iteracion WHERE idIncid = '$idIncid' ORDER BY nIteracion DESC ");
			if(mysql_num_rows($sql)==0){
				return false;
			}else{
				$estado = mysql_fetch_array($sql);
				return $estado;
			}
		}

	}
?>
