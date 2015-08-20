<?php
	$userType="externo";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	$rows = $_SESSION['consultaServicio'];
	foreach ($rows as $row) { 
?>

<h1 id="headerExterno"><a><i><?= i18n("SERVICIO") ?><?php echo $row['idServ']; ?></i></a></h1>
<form method="POST" action="../../Controller/serviciosController.php">
	<table class="default">
		<tr> 
			<td width="25%"><?= i18n("CIF Empresa:") ?></td> 
			<td width="25%"><input type="text" class="text" disabled name="cifEmpr" value="<?php echo $row['cifEmpr']; ?>"/></td> 
			<td width="25%"><?= i18n("Periodicidad:") ?></td> 
			<td width="25%"> <input type="text" class="text" disabled name="periodicidad" value="<?php echo $row['periodicidad']; ?>"/></td>
		</tr>
		<tr> 
			<td width="25%">#ID <?= i18n("Servicio:") ?></td> 
			<td width="25%"><input type="text" class="text" disabled name="idServ" value="<?php echo $row['idServ']; ?>"/></td> 
			<td width="25%">#ID <?= i18n("Máquina:") ?> </td> 
			<td width="25%"> <input type="text" class="text" disabled name="idMaq" value="<?php echo $row['idMaq']; ?>" /></td>
		</tr>
		<tr> 
			<td width="25%"><?= i18n("Fecha Apertura:") ?></td> 
			<td width="25%"><input type="text" class="text" disabled name="fInicioSer" value="<?php echo $row['fInicioSer']; ?>" /></td> 
			<td width="25%"><?= i18n("Fecha Cierre:") ?> </td> 
			<td width="25%"> <input type="text" class="text" disabled name="fFinSer" value="<?php echo $row['fFinSer']; ?>" /></td>
		</tr>
		<tr> 
			<td width="25%"><?= i18n("Coste:") ?></td> 
			<td width="25%"><input type="text" class="text" disabled name="costeSer" value="<?php echo $row['costeSer']; ?>" /></td> 
			<td width="25%">&nbsp;</td>
			<td width="25%">&nbsp;</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td width="25%"><br><?= i18n("Descripción:") ?></td>
			<td colspan='3'width="75%">
				<textarea style="resize:none; text-align:left;" style="t" rows="4" name='descripSer' disabled>
				<?php echo $row['descripSer']; ?>
				</textarea>
			</td>
		</tr>
		<?php } ?>
		<tr>
		</tr>
			<td colspan="4"><input type="submit" name="accion" value="Trabajar"></td>
			<input type="hidden" name="idServ" value="<?php echo $row['idServ']; ?>" />
		</tr> 
	</table>
</form>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>