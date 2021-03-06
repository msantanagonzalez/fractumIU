<?php
    include_once '../../Controller/common.php';
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';

	$datosUsuario = $_SESSION["datosUsuario"];
	$datosJefe = $_SESSION["datosJefe"];
	foreach ($datosUsuario as $usuario){
?>
  <script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerJefe"><a><i><?php echo $lang['PERFIL_BIG']; ?><?php echo $usuario['nomUsu']." ".$usuario['apellUsu']; ?></i></a></h1>
<form method="POST" onsubmit="return modificarJefe()" action="../../Controller/usuariosController.php?dniUsu=<?php echo $usuario['dniUsu']; ?>">
	<table class="default">
		<tr>
			<td width="25%"><?php echo $lang['NOMBRE']; ?></td>
			<td width="25%"><input id="nombre" type="text" class="text" name="nomUsu" value="<?php echo $usuario['nomUsu']; ?>"/></td>
			<td width="25%"><?php echo $lang['APELLIDOS']; ?> </td>
			<td width="25%"> <input id="apellidos" type="text" class="text" name="apellUsu" value="<?php echo $usuario['apellUsu']; ?>"/></td>
		</tr>
		<tr>
			<td width="25%"><?php echo $lang['ID']; ?> </td>
			<td width="25%"><input type="text" disabled class="text" name="dniUsu" value="<?php echo $usuario['dniUsu']; ?>"/></td>
			<td width="25%"><?php echo $lang['CONTRASENA']; ?></td>
			<td width="25%"> <input id="contraseña" type="password" class="text" name="passUsu" value="<?php echo $usuario['passUsu']; ?>"/></td>
		</tr>
		<?php
		foreach ($datosJefe as $jefe){
		?>
		<tr>
			<td width="25%"><?php echo $lang['TELEFONO']; ?> </td>
			<td width="25%"><input id="telefono" type="text" class="text" name="telUsu" value="<?php echo $jefe['telefJefe']; ?>"/></td>
			<td width="25%"><?php echo $lang['CORREO']; ?></td>
			<td width="25%"> <input id="mail" type="text" class="text" name="correoUsu" value="<?php echo $jefe['mailJefe']; ?>"/></td>
		</tr>
		<?php } ?>
		<tr>
			<td width="20%" colspan="4"><button type="submit" name="accion" value="Guardar"><?php echo $lang['GUARDAR']; ?></button></td>
		</tr>
	</table>
</form>

<?php
}
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
