<!DOCTYPE HTML>
<html>
	<head>
		<title>.Fractum!</title>
	</head>
	<body>
	<h1 id="headerJefe"><a><i>Login</i></a></h1>
		<form method="POST" action="Controller/usuariosController.php">
			<table class="default">
				<tr> 
					<td width="25%">Usuario: </td> 
					<td width="25%"><input type="text" class="text" name="dniUsu" placeholder="DNI:"/></td> 
					<td width="25%">Contraseña: </td> 
					<td width="25%"> <input type="password" class="text" name="passUsu" placeholder="Contraseña:" /></td>
				</tr>
				<tr>
					<td width="20%" colspan="4"><input type="submit" name="accion" value="login"></td>
				</tr> 
			</table>
		</form>
		
		<!-- TEMPORAL -->
		<h1 id="headerJefe"><a><i>TEMPORAL</i></a></h1>
		<br>
		<a href="View/usuarios/jefe/homeJefe.php" target="_blank"> <input type="button" value="Jefe"></a>
		<br>
		<a href="View/usuarios/interno/homeInterno.php" target="_blank"> <input type="button" value="Operario Interno"></a>
		<br>
		<a href="View/usuarios/externo/homeExterno.php" target="_blank"> <input type="button" value="Operario Externo"></a>
		<!-- TEMPORAL -->
		
	</body>
</html>