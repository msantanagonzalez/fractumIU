<?php
	$userType="jefe";
	require_once("../structure/header.php");
	
	$datosEmpresa = $_SESSION["consultaEmpresa"];
?>

<h1 id="headerJefe"><a><i><?= i18n("MODIFICAR EMPRESA") ?> </i></a></h1>
<form name='FormEmpresa' id='FormEmpresa' method='post' action="../../Controller/empresasController.php">
	<?php foreach ($datosEmpresa as $empresa) { ?>
		<input type="hidden" class="text" name="cifEmpr" value="<?php echo $empresa['cifEmpr']; ?>"/>
		<table class="default">
		<tr> 
			<td width="25%"><?= i18n("#CIF:") ?> </td> 
			<td width="25%"><input type="text" class="text" disabled value="<?php echo $empresa['cifEmpr']; ?>"/></td> 
			<td width="25%"><?= i18n("Nombre:") ?></td> 
			<td width="25%"> <input type="text" class="text" name="nomEmpr" value="<?php echo $empresa['nomEmpr']; ?>"/></td> 
		</tr>
		<tr> 
			<td width="25%"><?= i18n("Teléfono:") ?></td> 
			<td width="25%"><input type="text" class="text" name="telefEmpr" value="<?php echo $empresa['telefEmpr']; ?>"/></td> 
			<td width="25%"><?= i18n("Correo:") ?></td> 
			<td width="25%"> <input type="text" class="text" name="mailEmpr" value="<?php echo $empresa['mailEmpr']; ?>"/></td> 
		</tr>
		<tr>
			<td width="20%" colspan="4"><input type="submit" name="accion" value="Guardar"></td>
		</tr> 
	</table>
	<?php } ?>
</form>


<?php
	require_once("../structure/footer.php");
?>