<?php
	include_once '../../Controller/common.php';
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
			<h1 id="headerJefe"><a><i>Login</i></a></h1>
				<form method="POST" action="../../Controller/usuariosController.php">
					<table class="default">
						<tr>
							<td width="25%"><?php echo $lang['USUARIO']; ?></td>
							<td width="25%"><input title="Por favor introduzca un nombre de usuario" required type="text" class="text" name="dniUsu" placeholder="DNI:"/></td>
							<td width="25%"><?php echo $lang['CONTRASENA']; ?> </td>
							<td width="25%"><input title="Por favor introduzca su password" required type="password" class="text" name="passUsu" placeholder="Contraseña:" /></td>
						</tr>
						<tr>
							<td>Seleccione un idioma: </td>
							<td width="25%">
								<select required title="Selecciona un idioma" name='idioma' >
									<option selected value='es'><?php echo $lang['ESPAÑOL']; ?></option>
									<option value='ga'><?php echo $lang['GALLEGO']; ?></option>
								</select>
							</td>
							<!--<td width="25%"><a href="login.php?lang=es"><?php echo $lang['ESPAÑOL']; ?></a></td>
							<td width="25%"><a href="login.php?lang=ga"><?php echo $lang['GALLEGO']; ?></a></td>-->
						</tr>
						<tr>
							<td width="20%" colspan="4"><input type="submit" name="accion" value="login"></td>
						</tr>
					</table>
				</form>
				<?php require_once $_SESSION['cribPath'].'View/crearMensaje.php'; ?>
		</div>
	</body>
</html>
