<?php
    include_once '../../Controller/common.php';
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';

	$datosUsuario = $_SESSION["datosUsuario"];
	$datosExterno = $_SESSION["datosExterno"];
	foreach ($datosUsuario as $usuario){
?>
<h1 id="headerJefe"><a><i><?php echo $lang['PERFIL_BIG']; ?> <?php echo $usuario['nomUsu']." ".$usuario['apellUsu']; ?></i></a></h1>
<form method="POST" action="modificarExternoJefe.php">
	<table class="default">
		<tr>
			<td width="25%"><?php echo $lang['ID']; ?> </td>
			<td width="25%"><input type="text" class="text" name="peID" disabled value="<?php echo $usuario['dniUsu']; ?>"/></td>
			<td width="25%"><?php echo $lang['CONTRASENA']; ?> </td>
			<td width="25%"> <input type="password" class="text" name="pePass" disabled value="<?php echo $usuario['passUsu']; ?>"/></td>
		</tr>
		<tr>
			<td width="25%"><?php echo $lang['NOMBRE']; ?></td>
			<td width="25%"><input type="text" class="text" name="peNombre" disabled value="<?php echo $usuario['nomUsu']; ?>"/></td>
			<td width="25%"><?php echo $lang['APELLIDOS']; ?> </td>
			<td width="25%"> <input type="text" class="text" name="peApellidos" disabled value="<?php echo $usuario['apellUsu']; ?>"/></td>
		</tr>
		<?php
		foreach ($datosExterno as $externo){
		?>
		<tr>
			<td width="25%"><?php echo $lang['EMPRESA']; ?> </td>
			<td width="25%"><input type="text" class="text" name="peEmpresa" disabled value="<?php echo $externo['cifEmpr']; ?>"/></td>
			<td></td>
			<td></td>
		</tr>
		<?php } ?>
		<tr>
			<td width="20%" colspan="4"><button type="submit" name="peModificar"><?php echo $lang['MODIFICAR']; ?></button></td>
		</tr>
	</table>
</form>

<?php
}
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
