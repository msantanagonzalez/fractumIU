<?php
	require_once 'usuario.php';
	require_once 'servicio.php';

	class Incidencia{
		private $idIncidencia;
		private $fechaApertura;
		private $fechaCierre;
		private $dniResponsable;
		private $dniApertura;
		private $idMaquina;
		private $estadoIncidencia;
		private $derivada;
		private $cifEmpr;

		public function __construct($idIncidencia = NULL, $fechaApertura = NULL, $fechaCierre = NULL, $dniResponsable = NULL, $dniApertura = NULL, $idMaquina = NULL, $estadoIncidencia = NULL, $derivada = NULL, $descripcion = NULL, $cifEmpr = NULL){
			$this->idIncidencia = $idIncidencia;
			$this->fechaApertura = $fechaApertura;
			$this->fechaCierre = $fechaCierre;
			$this->dniResponsable = $dniResponsable;
			$this->dniApertura = $dniApertura;
			$this->idMaquina = $idMaquina;
			$this->estadoIncidencia = $estadoIncidencia;
			$this->derivada = $derivada;
			$this->descripcion = $descripcion;
			$this->cifEmpr = $cifEmpr;
		}

		public function alta(){
			mysql_query("INSERT INTO INCIDENCIA(idIncid, fAper, fCier, dniResponsable, dniApertura, idMaq, estadoIncid, derivada, descripIncid, cifEmpr) VALUES ('$this->idIncidencia','$this->fechaApertura','$this->fechaCierre','$this->dniResponsable','$this->dniApertura','$this->idMaquina', '$this->estadoIncidencia','$this->derivada', '$this->descripcion', '$this->cifEmpr')") or die(mysql_error());
		}

		public function consultaIncidencia($incidencia){
			$sql = mysql_query("SELECT * FROM INCIDENCIA WHERE idIncid = '$incidencia'") or die(mysql_error());

			return $sql;
		}

		public function modificacion($idIncidencia){
			mysql_query("UPDATE INCIDENCIA SET fAper = '$this->fechaApertura', fCier = '$this->fechaCierre', dniResponsable = '$this->dniResponsable',
				estadoIncid = '$this->estadoIncidencia', derivada = '$this->derivada', cifEmpr = '$this->cifEmpr' WHERE idIncid = '$idIncidencia'") or die(mysql_error());
		}

		public function cambiarEstado($idIncidencia, $estado){

			mysql_query("UPDATE INCIDENCIA SET estadoIncid = '$estado' WHERE idIncid = '$idIncidencia'") or die(mysql_error());

		}

		public function lista(){
			$sql = mysql_query("SELECT * FROM INCIDENCIA");

			return $sql;
		}

		public function listaPendientesInterno($dniUsu){

			$sql = mysql_query("SELECT * FROM INCIDENCIA WHERE dniResponsable='$dniUsu' AND (estadoIncid='Abierta' OR estadoIncid='Programada' OR estadoIncid='Pendiente Derivar' OR estadoIncid='En Curso') ");

			return $sql;
		}

		public function listaPendientesJefe(){
			$sql = mysql_query("SELECT * FROM INCIDENCIA WHERE estadoIncid='Pendiente Derivar' OR estadoIncid='Programada'");
			return $sql;
		}

		public function listaPendientesExterno(){
			$sql = mysql_query("SELECT * FROM OPEXTERNO O INNER JOIN INCIDENCIA I ON O.cifEmpr = I.cifEmpr	WHERE O.dniUsu ='".$_SESSION['dni']."' AND (I.estadoIncid = 'Derivada' OR I.estadoIncid='En Curso Externo')");

			return $sql;
		}


		public function listaIncidenciasOpE(){
			//session_start();
			$sql = mysql_query("SELECT * FROM OPEXTERNO O RIGHT JOIN INCIDENCIA I ON O.cifEmpr = I.cifEmpr WHERE O.dniUsu = '".$_SESSION['dni']."' AND derivada = 1") ;
			return $sql;
		}



		public function contarPendientes($tipo){
			switch ($tipo) {
				case 'J':
					$sql = mysql_query("SELECT count(*) AS num FROM INCIDENCIA WHERE estadoIncid='Pendiente Derivar' OR estadoIncid='Programada'");
					return $sql;
					break;
				case 'I':
					$sql = mysql_query("SELECT count(distinct(i.idIncid)) AS num, i.estadoIncid, i.fAper FROM INCIDENCIA i, USUARIO u
										WHERE i.estadoIncid = 'Abierta' OR (i.estadoIncid='Pendiente Cierre' AND i.dniResponsable=u.dniUsu)");
					return $sql;
					break;
				case 'E':
					$sql = mysql_query("SELECT count(*) AS num FROM INCIDENCIA WHERE estadoIncid='Derivada'");
					return $sql;
					break;
			}
		}

		public function pendientes($tipo){
			switch ($tipo) {
				case 'J':
					$sql = mysql_query("SELECT * FROM INCIDENCIA WHERE estadoIncid='Pendiente Derivar' OR estadoIncid='Programada'");
					return $sql;
					break;
				case 'I':
					$sql = mysql_query("SELECT distinct(i.idIncid), i.estadoIncid, i.fAper FROM INCIDENCIA i, USUARIO u
										WHERE i.estadoIncid = 'Abierta' OR (i.estadoIncid='Pendiente Cierre' AND i.dniResponsable=u.dniUsu)");
					return $sql;
					break;
				case 'E':
					$sql = mysql_query("SELECT * FROM INCIDENCIA WHERE estadoIncid='Derivada'");
					return $sql;
					break;
			}
		}

		public function ultimaIncidMaq($idMaq){
			$sql = mysql_query("SELECT idIncid FROM incidencia WHERE idMaq = '$idMaq' ORDER BY fAper DESC");

			return $sql;
		}

		public function hasServicios($maquina){
			$servicio = new servicio("","","","","","","","","");
			$hasServicios	= $servicio->checkMaquina($maquina);

			return $hasServicios;
		}

	}
?>
