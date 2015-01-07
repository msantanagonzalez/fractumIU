<?php
	$userType="jefe";
	require_once("../../structure/header.php");

	$datosUsuario = $_SESSION["datosUsuario"];
//var_dump($datosUsuario);
foreach ($datosUsuario as $usuario){
?>
<h1 id="headerJefe"><a><i>PERFIL <?php echo $usuario['nomUsu']." ".$usuario['apellUsu']; ?></i></a></h1>
<form method="POST" action="modificarPerfilInterno.html">
	<table class="default">
		<tr> 
			<td width="25%">Nombre: </td> 
			<td width="25%"><input type="text" class="text" disabled name="piNombre" value="<?php echo $usuario['nomUsu']; ?>"/></td> 
			<td width="25%">Apellidos: </td> 
			<td width="25%"> <input type="text" class="text" disabled name="piApellidos" value="<?php echo $usuario['apellUsu']; ?>"/></td> 
		</tr>
		<tr> 
			<td width="25%">#ID Interno: </td> 
			<td width="25%"><input type="text" class="text" disabled name="piID" value="<?php echo $usuario['dniUsu']; ?>"/></td> 
			<td width="25%">Contraseña: </td> 
			<td width="25%"> <input type="password" class="text" disabled name="piPass" value="<?php echo $usuario['passUsu']; ?>"/></td> 
		</tr>
		<tr> 
			<td width="25%">Tel&eacute;fono: </td> 
			<td width="25%"><input type="text" class="text" name="piTelf" value="<?php echo $usuario["telefOpeInt"]; ?>"/></td> 
			<td width="25%">Correo: </td> 
			<td width="25%"> <input type="text" class="text" disabled name="piCorreo" value="jRodeiro@gmail.com" /></td>
		</tr>
		<tr>
			<td width="20%" colspan="4"><input type="submit" name="piModificar" value="Modificar"></td>
		</tr> 
	</table>
</form>

<?php
}
	require_once("../../structure/footer.php");
?>