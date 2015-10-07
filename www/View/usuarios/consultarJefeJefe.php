<?php
    include_once '../../Controller/common.php';
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';

	$datosUsuario = $_SESSION["datosUsuario"];
	$datosJefe = $_SESSION["datosJefe"];
	foreach ($datosUsuario as $usuario){
?>

<h1 id="headerJefe"><a><i><?php echo $lang['PERFIL_BIG']; ?><?php echo $usuario['nomUsu']." ".$usuario['apellUsu']; ?></i></a></h1>
<form method="POST" action="modificarJefeJefe.php">
	<table class="default">
		<tr>
			<td width="25%"><?php echo $lang['NOMBRE']; ?></td>
			<td width="25%"><input type="text" class="text" disabled name="piNombre" value="<?php echo $usuario['nomUsu']; ?>"/></td>
			<td width="25%"><?php echo $lang['APELLIDOS']; ?></td>
			<td width="25%"> <input type="text" class="text" disabled name="piApellidos" value="<?php echo $usuario['apellUsu']; ?>"/></td>
		</tr>
		<tr>
			<td width="25%"><?php echo $lang['ID']; ?></td>
			<td width="25%"><input type="text" class="text" disabled name="piID" value="<?php echo $usuario['dniUsu']; ?>"/></td>
			<td width="25%"><?php echo $lang['CONTRASENA']; ?></td>
			<td width="25%"> <input type="password" class="text" disabled name="piPass" value="<?php echo $usuario['passUsu']; ?>"/></td>
		</tr>
		<?php
		foreach ($datosJefe as $jefe){
		?>
		<tr>
			<td width="25%"><?php echo $lang['TELEFONO']; ?></td>
			<td width="25%"><input type="text" class="text" disabled name="piTelf" value="<?php echo $jefe['telefJefe']; ?>"/></td>
			<td width="25%"><?php echo $lang['CORREO']; ?></td>
			<td width="25%"> <input type="text" class="text" disabled name="piCorreo" value="<?php echo $jefe['mailJefe']; ?>"/></td>
		</tr>
		<?php } ?>
		<tr>
			<td width="20%" colspan="4"><button type="submit" name="pModificar"><?php echo $lang['MODIFICAR']; ?></button></td>
		</tr>
	</table>
</form>

<?php
}
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
