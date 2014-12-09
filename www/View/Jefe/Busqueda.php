<!DOCTYPE HTML>
<?php 
require "php/Clase_Usuario.php";
require 'php/Nav.php';
session_start();
Validar_Sesion();
$nav = new Nav;
$busqueda = $_POST['busqueda'];
?>
<html>

	<head>
		<title>> To-Do (IU4L)</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/initJefe.js"></script>
		<script src="js/Validaciones.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>
	</head>
	
	<body class="left-sidebar">
		<div id="wrapper"><!--WRAPPER-->
			<div id="content"><!--CONTENIDO-->
				<div class="inner">
				</div>
			</div>
		
			<div id='sidebarJefe'> <!--BARRA LATERAL-->
			<h1 id='header'><a href='homeJefe.html'>·Fractum!</a></h1>		
                <nav id='nav'> 
              		<ul>
                		<div align='center'>
                       		<li class='current'>
                            	<a href='perfil.html'>
                            		<img src='images/DefaultAvatar.png'><em><strong><br>".$jefeNegocio"</strong></em><strong></strong></img>
                            	</a>
                         	</li>
							<li class='current'><a href='gestorIncidencias.html'>GESTIONAR INCIDENCIAS</a></li>
                           	<li class='current'><a href='gestorUsuarios.html'>GESTIONAR USUARIOS</a></li>
                           	<li class='current'><a href='gestorMaquinas.html'>GESTIONAR MÁQUINAS</a></li>
							<li class='current'><a href='gestorServicios.html'>GESTIONAR SERVCICOS</a></li>
							<li class='current'><a href='../login.html'>>Log Out</a></li>
                            <!--<form method='POST' action='AdminResultadosBusqueda.php' style='text-align:center'>-->
                        	<section class='box search'>
								<input type='text' name='busqueda' placeholder='Buscar...' value=''/>
                      		</section>
								<div hidden><input type='submit' name='buscar'/></div>
                            <!--</form>-->
                      	</div>
					</ul>
				</nav>
		</div>
		</div>
		<!-- FIN BARRA LATERAL -->
	</body>
</html>