<?php
	

	class servicio {
		private $idServ;
		private $dniUsu;
		private $cifEmpr;
		private $idMaq;
		private $periodicidad;
		private $fInicioSer;
		private $fFinSer;
		private $costeSer;
		private $descripSer;
		

		 function __construct($idServ, $dniUsu, $cifEmpr, $idMaq, $periodicidad,$fInicioSer, $fFinSer, $costeSer, $descripSer){
			$this->idServ = $idServ;
			$this->dniUsu = $dniUsu;
			$this->cifEmpr = $cifEmpr;
			$this->idMaq = $idMaq;
			$this->periodicidad = $periodicidad;
			$this->fInicioSer = $fInicioSer;
			$this->fFinSer = $fFinSer;
			$this->costeSer = $costeSer;
			$this->descripSer = $descripSer;
		
		}

		public function alta(){
			
			$sql = "INSERT INTO SERVICIO(idServ, dniUsu, cifEmpr, idMaq, periodicidad,fInicioSer,fFinSer, costeSer, descripSer) VALUES ('$this->idServ','$this->dniUsu','$this->cifEmpr','$this->idMaq','$this->periodicidad','$this->fInicioSer','$this->fFinSer','$this->costeSer','$this->descripSer')";
			$resultado = mysql_query($sql) or die(mysql_error());
			return $resultado;
		
		}

		public function consultaServicio($idServ){
			
			$sql = mysql_query("SELECT * FROM SERVICIO WHERE idServ = '$idServ'") or die(mysql_error());
			
			return $sql;
		}

		public function modificar($idServ){
				
			$sql = mysql_query("UPDATE SERVICIO SET dniUsu = '$this->dniUsu', periodicidad = '$this->periodicidad', fInicioSer = '$this->fInicioSer',
						fFinSer = '$this->fFinSer', costeSer = '$this->costeSer', descripSer = '$this->descripSer'
						WHERE idServ = '$idServ'") or die(mysql_error());
			
			return $sql;
			
		}

		public function listar(){
			
			$sql = mysql_query("SELECT * FROM SERVICIO") or die(mysql_error());
			
			return $sql;
			
		}
		
		public function baja(){
		$eliminar = "DELETE FROM SERVICIO WHERE idServ = '$this->idServ'";
		$resultado = mysql_query($eliminar) or die(mysql_error());

		return $resultado;
	}

	}
?>













