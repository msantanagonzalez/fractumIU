<?php
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';

	$datosUsuario = $_SESSION["datosUsuario"];
	$datosInterno = $_SESSION["datosInterno"];
	
foreach ($datosUsuario as $usuario){
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>   
<h1 id="headerJefe"><a><i><?= i18n("PERFIL") ?> <?php echo $usuario['nomUsu']." ".$usuario['apellUsu']; ?></i></a></h1>
<form onsubmit="return modificarInternoJefe()" method="POST" action="../../Controller/usuariosController.php?dniUsu=<?php echo $usuario['dniUsu']; ?>">
	<table class="default">
		<tr> 
			<td width="25%"><?= i18n("Nombre:") ?> </td> 
			<td width="25%"><input id="nombre" type="text" class="text" name="nomUsu" value="<?php echo $usuario['nomUsu']; ?>"/></td> 
			<td width="25%"><?= i18n("Apellidos:") ?> </td> 
			<td width="25%"> <input id="apellidos" type="text" class="text" name="apellUsu" value="<?php echo $usuario['apellUsu']; ?>"/></td> 
		</tr>
		<tr> 
			<td width="25%"><?= i18n("#ID:") ?> </td> 
			<td width="25%"><input type="text" disabled class="text" name="dniUsu" value="<?php echo $usuario['dniUsu']; ?>"/></td> 
			<td width="25%"><?= i18n("Contraseña:") ?> </td> 
			<td width="25%"> <input id="contraseña" type="password" class="text" name="passUsu" value="<?php echo $usuario['passUsu']; ?>"/></td> 
		</tr>
		<?php
		foreach ($datosInterno as $interno){
		?>
		<tr> 
			<td width="25%"><?= i18n("Teléfono:") ?> </td> 
			<td width="25%"><input id="telefono" type="text" class="text" name="telUsu" value="<?php echo $interno['telefOpeInt']; ?>"/></td> 
			<td width="25%"><?= i18n("Correo:") ?> </td> 
			<td width="25%"> <input id="mail" type="text" class="text" name="correoUsu" value="<?php echo $interno['mailOpeInt']; ?>"/></td> 
		</tr>
		<?php } ?>
		<tr>
			<td width="20%" colspan="4"><input type="submit" name="accion" value="Guardar"></td>
		</tr> 
	</table>
</form>

<?php
}
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>