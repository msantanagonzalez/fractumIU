<?php
	require_once("../Model/incidencia.php");

	if(isset($_GET['accion'])){	$accion = $_GET['accion']; }
	if(isset($_POST['accion'])){ $accion = $_POST['accion']; }

	$tipoUsuario = $_SESSION['tipo'];
	$incidencia = new Incidencia();
	
	switch ($accion) {
		case 'Alta':
			alta();
			break;
		case 'Consulta':
			consulta();
			break;
		case 'Modificar':
			modificacion();
			break;
		case 'Listar':
			lista();
			break;
		default:
			break;
	}

	public function alta(){
		$consultaMaquinas = $incidencia->listadoMaquinas();
		$resultadoMaquinas = mysql_fetch_array($consultaMaquinas); // pasar a la vista

		if(isset($_POST['dniApertura']) && isset($_POST['dniResponsable']) && isset($_POST['idIcidencia']) && isset($_POST['idMaquina']) && 
			isset($_POST['fechaApertura']) && isset($_POST['fechaCierre']) && isset($_POST['estadoIncidencia']) && isset($_POST['derivada'])){
				$incidencia->setIdIncidencia($_POST['dniApertura']);
				$incidencia->setFechaApertura($_POST['dniResponsable']);
				$incidencia->setFechaCierre($_POST['idIcidencia']);
				$incidencia->setDniJefe($_POST['idMaquina']);
				$incidencia->setDniOperarioInterno($_POST['fechaApertura']);
				$incidencia->setIdMaquina($_POST['fechaCierre']);
				$incidencia->setEstadoIncidencia($_POST['estadoIncidencia']);
				$incidencia->setDerivada($_POST['derivada']);

				$incidencia->alta();
		}
		
		switch ($tipoUsuario) {
			case 'J':
				require_once("../View/incidencias/listarJefe.php");
				break;
			case 'I':
				require_once("../View/incidencias/listarInterno.php");
				break;
			default:				
				break;
		}
	}

	public function consulta(){
		$idIncidencia = $_REQUEST['idIncidencia'];
		$consultaIncidencia = $incidencia->consultaIncidencia($idIncidencia);

		$resultadoIncidencia = mysql_fetch_array($consultaIncidencia); // pasar a la vista
	}

	public function modificacion(){
		$idIncidencia = $_REQUEST['idIncidencia'];
		$incidencia->modificacion($incidencia);

		switch ($tipoUsuario) {
			case 'J':
				require_once("../View/incidencias/consultarJefe.php?idIncidencia=$idIncidencia");
				break;
			case 'I':
				require_once("../View/incidencias/consultarInterno.php?idIncidencia=$idIncidencia");
				break;
			case 'E':
				require_once("../View/incidencias/consultarExterno.php?idIncidencia=$idIncidencia");
			default:				
				break;
		}
	}

	public function lista(){
		$consultaIncidencias = $incidencia->lista();	
	}	
?>