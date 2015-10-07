<?php
    include_once '../../Controller/common.php';
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';

	$datosEmpresa = $_SESSION["consultaEmpresa"];
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerJefe"><a><i><?php echo $lang['MODIFICAR_EMPRESA']; ?> </i></a></h1>
<form name='FormEmpresa' onsubmit="return comprobarModificarEmpresa()" id='FormEmpresa' method='post' action="../../Controller/empresasController.php">
	<?php foreach ($datosEmpresa as $empresa) { ?>
		<input type="hidden" class="text" name="cifEmpr" value="<?php echo $empresa['cifEmpr']; ?>"/>
		<table class="default">
		<tr>
			<td width="25%"><?php echo $lang['CIF']; ?> </td>
			<td width="25%"><input type="text" class="text" disabled value="<?php echo $empresa['cifEmpr']; ?>"/></td>
			<td width="25%"><?php echo $lang['NOMBRE']; ?></td>
			<td width="25%"> <input id="nomEmpr" type="text" class="text" name="nomEmpr" value="<?php echo $empresa['nomEmpr']; ?>"/></td>
		</tr>
		<tr>
			<td width="25%"><?php echo $lang['TELEFONO']; ?></td>
			<td width="25%"><input id="telefEmpr" type="text" class="text" name="telefEmpr" value="<?php echo $empresa['telefEmpr']; ?>"/></td>
			<td width="25%"><?php echo $lang['CORREO']; ?></td>
			<td width="25%"> <input id="mailEmpr" type="text" class="text" name="mailEmpr" value="<?php echo $empresa['mailEmpr']; ?>"/></td>
		</tr>
		<tr>
			<td width="20%" colspan="4"><button type="submit" name="accion" value="Guardar">Guardar</button></td>
		</tr>
	</table>
	<?php } ?>
</form>


<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
