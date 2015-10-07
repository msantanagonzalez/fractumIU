<?php
    include_once '../../Controller/common.php';
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerJefe"><a><i><?php echo $lang['ALTA_OPERARIO_INTERNO_BIG']; ?></i></a></h1>
<form method="POST" onsubmit="return altaOperarioInterno()" action="../../Controller/usuariosController.php">
	<table class="default">
		<tr>
			<td width="25%"><?php echo $lang['NOMBRE']; ?> </td>
			<td width="25%"><input id="nombre" type="text" class="text" name="nombre" value=""/></td>
			<td width="25%"><?php echo $lang['APELLIDOS']; ?></td>
			<td width="25%"> <input id="apellidos" type="text" class="text" name="apellidos" value=""/></td>
		</tr>
		<tr>
			<td width="25%"><?php echo $lang['ID_INTERNO']; ?></td>
			<td width="25%"><input id="dni" type="text" class="text" name="dni" value=""/></td>
		</tr>
		<tr>
			<td width="25%"><?php echo $lang['TELEFONO']; ?> </td>
			<td width="25%"><input id="telefono" type="text" class="text" name="tlf" value="" /></td>
			<td width="25%"><?php echo $lang['CORREO']; ?> </td>
			<td width="25%"><input id="mail" type="text" class="text" name="correo" value="" /></td>
		</tr>
		<tr>
			<td colspan="4"><button type="submit" name="accion" value="altaInterno">Alta Interno</button></td>
		</tr> 
	</table>
</form>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
