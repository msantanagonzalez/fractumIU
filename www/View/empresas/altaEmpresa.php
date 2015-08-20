<?php
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	require_once $_SESSION['cribPath'].'View/messages/messages_ga.php';

?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerJefe"><a><i><?= i18n("EMPRESA") ?></i></a></h1>
<form method="POST" onsubmit="return comprobarEmpresa()" action="../../Controller/empresasController.php" enctype="multipart/form-data">
	<table class="default">
		<tr>
			<td width="25%"><?= i18n("#CIF:") ?></td>
			<td width="25%"><input id="cifEmpr" type="text" class="text" name="cifEmpr" value=""/></td>
			<td width="25%"><?= i18n("Nombre:") ?> </td>
			<td width="25%"> <input id="nomEmpr" type="text" class="text" name="nomEmpr" value=""/></td>
		</tr>
		<tr>
			<td width="25%"><?= i18n("Teléfono:") ?> </td>
			<td width="25%"><input id="telefEmpr" type="text" class="text" name="telefEmpr" value=""/></td>
			<td width="25%"><?= i18n("Correo:") ?> </td>
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
