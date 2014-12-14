<?php
switch ($userType){
	case "jefe":
		headerJefe();	
	break;
	case "interno":
		headerInterno();
	break;	
	case "externo":
		headerExterno();
	break;
}

function headerJefe(){
?>
<html>
<head>
	<title>·Fractum!</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<script src="../../../Resources/js/jquery.min.js"></script>
	<script src="../../../Resources/js/skel.min.js"></script>
	<script src="../../../Resources/js/skel-layers.min.js"></script>
	<script src="../../../Resources/js/initJefe.js"></script>
	<script src="../../../Resources/js/Validaciones.js"></script>
	<noscript>
		<link rel="stylesheet" href="../../../Resources/css/skel.css" />
		<link rel="stylesheet" href="../../../Resources/css/style.css" />
		<link rel="stylesheet" href="../../../Resources/css/style-desktop.css" />
		<link rel="stylesheet" href="../../../Resources/css/style-wide.css" />
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
<html>
<head>
	<title>·Fractum!</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<script src="../../../Resources/js/jquery.min.js"></script>
	<script src="../../../Resources/js/skel.min.js"></script>
	<script src="../../../Resources/js/skel-layers.min.js"></script>
	<script src="../../../Resources/js/initInterno.js"></script>
	<script src="../../../Resources/js/Validaciones.js"></script>
	<noscript>
		<link rel="stylesheet" href="../../../Resources/css/skel.css" />
		<link rel="stylesheet" href="../../../Resources/css/style.css" />
		<link rel="stylesheet" href="../../../Resources/css/style-desktop.css" />
		<link rel="stylesheet" href="../../../Resources/css/style-wide.css" />
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
<html>
<head>
	<title>·Fractum!</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<script src="../../../Resources/js/jquery.min.js"></script>
	<script src="../../../Resources/js/skel.min.js"></script>
	<script src="../../../Resources/js/skel-layers.min.js"></script>
	<script src="../../../Resources/js/initExterno.js"></script>
	<script src="../../../Resources/js/Validaciones.js"></script>
	<noscript>
		<link rel="stylesheet" href="../../../Resources/css/skel.css" />
		<link rel="stylesheet" href="../../../Resources/css/style.css" />
		<link rel="stylesheet" href="../../../Resources/css/style-desktop.css" />
		<link rel="stylesheet" href="../../../Resources/css/style-wide.css" />
	</noscript>
</head>
<body class="left-sidebar">
	<div id="wrapper"><!--WRAPPER-->
		<div id="content"><!--CONTENIDO-->
			<div class="inner"><!--INNER--> 
<?php
}
?>	