<?php
	include_once '../../Controller/common.php';
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerJefe"><a><i><?php echo $lang['EMPRESA']; ?></i></a></h1>
<form method="POST" onsubmit="return comprobarEmpresa()" action="../../Controller/empresasController.php" enctype="multipart/form-data">
	<table class="default">
		<tr>
			<td width="25%"><?php echo $lang['CIF']; ?></td>
			<td width="25%"><input id="cifEmpr" type="text" class="text" name="cifEmpr" value=""/></td>
			<td width="25%"><?php echo $lang['NOMBRE']; ?> </td>
			<td width="25%"> <input id="nomEmpr" type="text" class="text" name="nomEmpr" value=""/></td>
		</tr>
		<tr>
			<td width="25%"><?php echo $lang['TELEFONO']; ?> </td>
			<td width="25%"><input id="telefEmpr" type="text" class="text" name="telefEmpr" value=""/></td>
			<td width="25%"><?php echo $lang['CORREO']; ?> </td>
			<td width="25%"><input id="mailEmpr" type="text" class="text" name="mailEmpr" value=""/></td>
		</tr>
	</table>
	<table>
		<tr>
			<th width="20%">
			</th>
			<th width="40%">
				<input type='submit' name='accion' value='Alta'>
			</th>
			<th width="20%">
			</th>
		</tr>
	</table>
</form>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
