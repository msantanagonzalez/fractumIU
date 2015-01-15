<?php
	function connectBD(){
        mysql_connect("localhost","AdminFractum","Fractum");
		mysql_select_db("FractumDB");
	}

	function contarPendientes(){
		require_once("incidencia.php");
		session_start();
			$incidencia = new Incidencia();
			$numero = $incidencia->contarPendientes();
			$result = mysql_fetch_array($numero);

			$_SESSION['pendientes'] = $result['num'];
		session_write_close();
	}
?>