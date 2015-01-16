<?php
session_start();
require_once("../messages/messages_ga.php");
require_once("../../Model/I18n.php");
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
		<div style="width:50%; height:50%; margin:auto auto">
			<h1 id="headerJefe"><a><i><?= i18n("Login") ?></i></a></h1>
				<form method="POST" action="../../Controller/usuariosController.php">
					<table class="default">
						<tr> 
							<td width="25%"><?= i18n("Usuario:") ?> </td> 
							<td width="25%"><input type="text" class="text" name="dniUsu" placeholder="DNI:"/></td> 
							<td width="25%"><?= i18n("Contraseña:") ?> </td> 
							<td width="25%"> <input type="password" class="text" name="passUsu" placeholder="Contraseña:" /></td>
						</tr>
						<tr>
							<td width="20%" colspan="4"><input type="submit" name="accion" value="login"></td>
						</tr> 
					</table>
				</form>
				<?php 
				require '../crearMensaje.php'; 
				?>
				<ul>
				<li><a href="../../Controller/LanguageController.php?lang=es">español
				<?php i18n("Español"); ?>
				</a></li>
				<li><a href="../../Controller/LanguageController.php?lang=ga">gallego
				<?php i18n("Galego"); ?>
				</a></li>
			</ul>
		</div>	
	</body>
</html>