<?php
	$userType="interno";
	require_once("../structure/header.php");
	
	$datosUsuario = $_SESSION["datosUsuario"];
	$datosInterno = $_SESSION["datosInterno"];
	
foreach ($datosUsuario as $usuario){
?>

<h1 id="headerInterno"><a><i>PERFIL <?php echo $usuario['nomUsu']." ".$usuario['apellUsu']; ?></i></a></h1>
<form name='FormPerfil' id='FormPerfil' method='post' action="../../Controller/usuariosController.php">
	<div style='height:350px;width:auto;overflow-y: scroll;'>
		<table class="default">
		<tr> 
			<td width="25%">Nombre: </td> 
			<td width="25%"><input type="text" disabled class="text" name="piNombre" value="<?php echo $usuario['nomUsu']; ?>"/></td> 
			<td width="25%">Apellidos: </td> 
			<td width="25%"> <input type="text" disabled class="text" name="piApellidos" value="<?php echo $usuario['apellUsu']; ?>"/></td> 
		</tr>
		<tr> 
			<td width="25%">#ID: </td> 
			<td width="25%"><input type="text" class="text" disabled name="piID" value="<?php echo $usuario['dniUsu']; ?>"/></td> 
			<td width="25%">Contraseña: </td> 
			<td width="25%"> <input type="password" class="text" name="pass" value="<?php echo $usuario['passUsu']; ?>"/></td> 
		</tr>
		<?php
		foreach ($datosInterno as $interno){
		?>
		<tr> 
			<td width="25%">Tel&eacute;fono: </td> 
			<td width="25%"><input type="text" class="text" disabled name="piTelf" value="<?php echo $interno['telefOpeInt']; ?>"/></td> 
			<td width="25%">Correo: </td> 
			<td width="25%"> <input type="text" class="text" disabled name="piCorreo" value="<?php echo $interno['mailOpeInt']; ?>"/></td> 
		</tr>
		<?php } ?>
		<tr>
			<td width="20%" colspan="4"><input type="submit" name="accion" value="Guardar"></td>
		</tr> 
	</table>
	</div>
</form>

<?php
}
	require_once("../structure/footer.php");
?>