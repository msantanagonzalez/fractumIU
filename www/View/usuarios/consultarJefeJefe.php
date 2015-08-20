<?php
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	
	$datosUsuario = $_SESSION["datosUsuario"];
	$datosJefe = $_SESSION["datosJefe"];
	foreach ($datosUsuario as $usuario){
?>
            	
<h1 id="headerJefe"><a><i><?= i18n("PERFIL") ?> <?php echo $usuario['nomUsu']." ".$usuario['apellUsu']; ?></i></a></h1>
<form method="POST" action="modificarJefeJefe.php">
	<table class="default">
		<tr> 
			<td width="25%"><?= i18n("Nombre:") ?> </td> 
			<td width="25%"><input type="text" class="text" disabled name="piNombre" value="<?php echo $usuario['nomUsu']; ?>"/></td> 
			<td width="25%"><?= i18n("Apellidos:") ?> </td> 
			<td width="25%"> <input type="text" class="text" disabled name="piApellidos" value="<?php echo $usuario['apellUsu']; ?>"/></td> 
		</tr>
		<tr> 
			<td width="25%"><?= i18n("#ID:") ?> </td> 
			<td width="25%"><input type="text" class="text" disabled name="piID" value="<?php echo $usuario['dniUsu']; ?>"/></td> 
			<td width="25%"><?= i18n("Contraseña:") ?> </td> 
			<td width="25%"> <input type="password" class="text" disabled name="piPass" value="<?php echo $usuario['passUsu']; ?>"/></td> 
		</tr>
		<?php
		foreach ($datosJefe as $jefe){
		?>
		<tr> 
			<td width="25%"><?= i18n("Teléfono:") ?> </td> 
			<td width="25%"><input type="text" class="text" disabled name="piTelf" value="<?php echo $jefe['telefJefe']; ?>"/></td> 
			<td width="25%"><?= i18n("Correo:") ?> </td> 
			<td width="25%"> <input type="text" class="text" disabled name="piCorreo" value="<?php echo $jefe['mailJefe']; ?>"/></td> 
		</tr>
		<?php } ?>
		<tr>
			<td width="20%" colspan="4"><input type="submit" name="pModificar" value="Modificar"></td>
		</tr> 
	</table>
</form>

<?php
}
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>