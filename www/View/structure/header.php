<?php
//----------|Get the path|----------//
$path = dirname(__FILE__); //Gets the full path
$smallPath = mb_substr($path,0,28); //gets the server path
define('cribPath',$smallPath.'/');
//---------------------------------//

	session_start();
	//header("location: ../../../Controller/incidenciasController.php?accion=contarPendientes");
	//header("../../Controller/incidenciasController.php?accion=Pendientes");
	switch ($_SESSION['tipo']){
		case "J":
			headerJefe();
		break;
		case "I":
			headerInterno();
		break;
		case "E":
			headerExterno();
		break;
}

//require_once("../messages/messages_ga.php");
require_once cribPath.'Model/I18n.php';



function headerJefe(){
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>·Fractum!</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<script src="../../Resources/js/jquery.min.js"></script>
	<script src="../../Resources/js/skel.min.js"></script>
	<script src="../../Resources/js/skel-layers.min.js"></script>
	<script src="../../Resources/js/initJefe.js"></script>
	<script src="../../Resources/js/Validaciones.js"></script>
	<noscript>
		<link rel="stylesheet" href="../../Resources/css/skel.css" />
		<link rel="stylesheet" href="../../Resources/css/style.css" />
		<link rel="stylesheet" href="../../Resources/css/style-desktop.css" />
		<link rel="stylesheet" href="../../Resources/css/style-wide.css" />
	</noscript>
</head>
<body class="left-sidebar">
	<div id="wrapper"><!--WRAPPER-->
		<div id="content"><!--CONTENIDO-->
			<div class="inner"><!--INNER-->

<?php
}
function headerInterno(){
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>·Fractum!</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<script src="../../Resources/js/jquery.min.js"></script>
	<script src="../../Resources/js/skel.min.js"></script>
	<script src="../../Resources/js/skel-layers.min.js"></script>
	<script src="../../Resources/js/initInterno.js"></script>
	<script src="../../Resources/js/Validaciones.js"></script>
	<noscript>
		<link rel="stylesheet" href="../../Resources/css/skel.css" />
		<link rel="stylesheet" href="../../Resources/css/style.css" />
		<link rel="stylesheet" href="../../Resources/css/style-desktop.css" />
		<link rel="stylesheet" href="../../Resources/css/style-wide.css" />
	</noscript>
</head>
<body class="left-sidebar">
	<div id="wrapper"><!--WRAPPER-->
		<div id="content"><!--CONTENIDO-->
			<div class="inner"><!--INNER-->
<?php
}
function headerExterno(){
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>·Fractum!</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<script src="../../Resources/js/jquery.min.js"></script>
	<script src="../../Resources/js/skel.min.js"></script>
	<script src="../../Resources/js/skel-layers.min.js"></script>
	<script src="../../Resources/js/initExterno.js"></script>
	<script src="../../Resources/js/Validaciones.js"></script>
	<noscript>
		<link rel="stylesheet" href="../../Resources/css/skel.css" />
		<link rel="stylesheet" href="../../Resources/css/style.css" />
		<link rel="stylesheet" href="../../Resources/css/style-desktop.css" />
		<link rel="stylesheet" href="../../Resources/css/style-wide.css" />
	</noscript>
</head>
<body class="left-sidebar">
	<div id="wrapper"><!--WRAPPER-->
		<div id="content"><!--CONTENIDO-->
			<div class="inner"><!--INNER-->
<?php
}
?>
