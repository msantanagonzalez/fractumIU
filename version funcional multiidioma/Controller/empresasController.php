<?php
	require_once $_SESSION['cribPath'].'Model/empresa.php';
	require_once $_SESSION['cribPath'].'Controller/bdController.php';
	require_once $_SESSION['cribPath'].'Controller/generalController.php';

	if(isset($_GET['accion'])){	$accion = $_GET['accion']; }
	if(isset($_POST['accion'])){ $accion = $_POST['accion']; }

	switch ($accion) {
		case 'Alta':
			alta();
			break;
		case 'Consulta':
			consulta();
			break;
		case 'Modificar':
			modificar();
			break;
		case 'Guardar':
			modificado();
			break;
		case 'Listar':
			lista();
			break;
		case 'Eliminar':
			eliminar();
	}


	function alta(){
		//session_start();

		$empresa = new Empresa($_POST["cifEmpr"], $_POST["nomEmpr"], $_POST["telefEmpr"], $_POST["mailEmpr"]);
		$empresa->altaEmpresa();
		$tempEmpresa = $_POST["cifEmpr"];

		anadirMensaje("| SUCCESS | Empresa: ".$_POST["cifEmpr"]." creada","success");
		header("location: empresasController.php?accion=Listar");
	}


	function consulta(){
		//session_start();

		$empresa = new Empresa();

		$cifEmpresa = $_REQUEST['cifEmpr'];
		$consultaEmpresa = $empresa->consultaEmpresa($cifEmpresa);

		$consulta = array();
		while($row = mysql_fetch_array($consultaEmpresa)){
			array_push($consulta, $row);
		}

		$_SESSION["consultaEmpresa"] = $consulta;

		switch ($_SESSION['tipo']) {
			case 'J':
				//session_write_close();
				header("location: ../View/empresas/consultarJefe.php");
				break;
		}
	}


	function modificar(){
		//session_start();

		$empresa = new Empresa();

		$cifEmpr = $_REQUEST['cifEmpr'];
		$consultaEmpresa = $empresa->consultaEmpresa($cifEmpr);

		$consulta = array();
		while($row = mysql_fetch_array($consultaEmpresa)){
			array_push($consulta, $row);
		}

		$_SESSION["consultaEmpresa"] = $consulta;
		switch ($_SESSION['tipo']) {
			case 'J':
				//session_write_close();
				header("location: ../View/empresas/modificarJefe.php");
				break;
		}
	}


	function modificado(){
		//session_start();

		$cifEmpr = $_POST['cifEmpr'];
		$nomEmpr = $_POST['nomEmpr'];
		$telefEmpr = $_POST['telefEmpr'];
		$mailEmpr = $_POST['mailEmpr'];

		$empresa = new Empresa($cifEmpr, $nomEmpr, $telefEmpr, $mailEmpr);
		$empresa->modificarEmpresa($cifEmpr);

		anadirMensaje("| SUCCESS | Empresa: ".$cifEmpr." modificada","success");
		header("location: empresasController.php?accion=Listar");
	}


	function lista(){
		//session_start();

		$empresa = new Empresa();
		$listaEmpresas = $empresa->listarEmpresas();

		$lista = array();
		while($row = mysql_fetch_array($listaEmpresas)){
			array_push($lista, $row);
		}

		$_SESSION["listaEmpresas"] = $lista;

		switch ($_SESSION['tipo']) {
			case 'J':
				//session_write_close();
				header("location: ../View/empresas/listarJefe.php");
				break;
		}

	}


	function eliminar(){
		//session_start();
		$cifEmpr = $_GET['cifEmpr'];
		$empresa = new Empresa($cifEmpr, "", "", "");
		$resultado  = $empresa->consultaEmpresa($cifEmpr);
		if ($resultado){
			$empresa->bajaEmpresa();
		}

		anadirMensaje("| SUCCESS | Empresa: ".$cifEmpr." eliminada","success");
		header("location: empresasController.php?accion=Listar");
	}

?>
