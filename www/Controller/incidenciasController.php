<?php
	require_once("../Model/incidencia.php");

	if(isset($_GET['accion'])){
		$accion = $_GET['accion'];
	}

	if(isset($_POST['accion'])){
		$accion = $_POST['accion'];
	}

	switch ($accion) {
		case '': // value botón
			alta();
			break;
		
		default:
			# code...
			break;
	}
	// Corregir nombre campos y añadir derivada en la vista.

	$incidencia = new Incidencia();

	public function alta(){
		if(isset($_POST['operarioInterno']) && isset($_POST['responsable']) && isset($_POST['incidencia']) &&
			isset($_POST['maquina']) && isset($_POST['fechaInicio']) && isset($_POST['fechaCierre']) && 
			isset($_POST['coste']) && isset($_POST['estado']) && isset($_POST['descripcion'])){
				$incidencia->setIdIncidencia($_POST['incidencia']);
				$incidencia->setFechaApertura($_POST['fechaInicio']);
				$incidencia->setFechaCierre($_POST['fechaCierre']);
				$incidencia->setDniJefe($_POST['operarioInterno']);
				$incidencia->setDniOperarioInterno($_POST['responsable']);
				$incidencia->setIdMaquina($_POST['maquina']);
				$incidencia->setEstadoIncidencia($_POST['incidencia']);
				$incidencia->setDerivada();

				$incidencia->alta();
		}
		
		// header('Location: ');
	}

	public function consulta(){
		$incidencia = $_REQUEST['incidencia'];
		$consultaIncidencia = $incidencia->consultaIncidencia($incidencia);
		$consultaMaquinas = $incidencia->listadoMaquinas();

		$resultadoIncidencia = mysql_fetch_array($consultaIncidencia); // pasar a la vista
		$resultadoMaquinas = mysql_fetch_array($consultaMaquinas); // pasar a la vista
	}

	public function modificacion(){
		$incidencia = $_REQUEST['incidencia'];
		$incidencia->modificacion($incidencia);

		// header('Location: ');
	}

	public function lista(){
		$incidencia->lista();

		// header('Location: '); // HACER SWITCH AQUÍ!!----------------------------
		}
	
?>