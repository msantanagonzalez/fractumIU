<?php
	$userType="jefe";
	require_once("../structure/header.php");
	
	$datosUsuario = $_SESSION["datosUsuario"];
	$datosJefe = $_SESSION["datosJefe"];
	foreach ($datosUsuario as $usuario){
?>
            	
<h1 id="headerJefe"><a><i>PERFIL <?php echo $usuario['nomUsu']." ".$usuario['apellUsu']; ?></i></a></h1>
<form method="POST" action="../../Controller/usuariosController.php?dniUsu=<?php echo $usuario['dniUsu']; ?>">
	<table class="default">
		<tr> 
			<td width="25%">Nombre: </td> 
			<td width="25%"><input type="text" class="text" name="nomUsu" value="<?php echo $usuario['nomUsu']; ?>"/></td> 
			<td width="25%">Apellidos: </td> 
			<td width="25%"> <input type="text" class="text" name="apellUsu" value="<?php echo $usuario['apellUsu']; ?>"/></td> 
		</tr>
		<tr> 
			<td width="25%">#ID: </td> 
			<td width="25%"><input type="text" disabled class="text" name="dniUsu" value="<?php echo $usuario['dniUsu']; ?>"/></td> 
			<td width="25%">Contraseña: </td> 
			<td width="25%"> <input type="password" class="text" name="passUsu" value="<?php echo $usuario['passUsu']; ?>"/></td> 
		</tr>
		<?php
		foreach ($datosJefe as $jefe){
		?>
		<tr> 
			<td width="25%">Tel&eacute;fono: </td> 
			<td width="25%"><input type="text" class="text" name="telUsu" value="<?php echo $jefe['telefJefe']; ?>"/></td> 
			<td width="25%">Correo: </td> 
			<td width="25%"> <input type="text" class="text" name="correoUsu" value="<?php echo $jefe['mailJefe']; ?>"/></td> 
		</tr>
		<?php } ?>
		<tr>
			<td width="20%" colspan="4"><input type="submit" name="accion" value="Guardar"></td>
		</tr> 
	</table>
</form>

<?php
}
	require_once("../structure/footer.php");
?>