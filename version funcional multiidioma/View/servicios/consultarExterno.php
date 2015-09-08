<?php
	$userType="externo";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	$rows = $_SESSION['consultaServicio'];
	foreach ($rows as $row) { 
?>

<h1 id="headerExterno"><a><i><?php echo $lang['SERVICIO_BIG']; ?><?php echo $row['idServ']; ?></i></a></h1>
<form method="POST" action="../../Controller/serviciosController.php">
	<table class="default">
		<tr> 
			<td width="25%"><?php echo $lang['CIF_EMPRESA']; ?></td> 
			<td width="25%"><input type="text" class="text" disabled name="cifEmpr" value="<?php echo $row['cifEmpr']; ?>"/></td> 
			<td width="25%"><?php echo $lang['PERIODICIDAD']; ?></td> 
			<td width="25%"> <input type="text" class="text" disabled name="periodicidad" value="<?php echo $row['periodicidad']; ?>"/></td>
		</tr>
		<tr> 
			<td width="25%"><?php echo $lang['ID_SERVICIO']; ?></td> 
			<td width="25%"><input type="text" class="text" disabled name="idServ" value="<?php echo $row['idServ']; ?>"/></td> 
			<td width="25%"><?php echo $lang['ID_MAQUINA']; ?> </td> 
			<td width="25%"> <input type="text" class="text" disabled name="idMaq" value="<?php echo $row['idMaq']; ?>" /></td>
		</tr>
		<tr> 
			<td width="25%"><?php echo $lang['FECHA_APERTURA']; ?></td> 
			<td width="25%"><input type="text" class="text" disabled name="fInicioSer" value="<?php echo $row['fInicioSer']; ?>" /></td> 
			<td width="25%"><?php echo $lang['FECHA_CIERRE']; ?> </td> 
			<td width="25%"> <input type="text" class="text" disabled name="fFinSer" value="<?php echo $row['fFinSer']; ?>" /></td>
		</tr>
		<tr> 
			<td width="25%"><?php echo $lang['COSTE']; ?></td> 
			<td width="25%"><input type="text" class="text" disabled name="costeSer" value="<?php echo $row['costeSer']; ?>" /></td> 
			<td width="25%">&nbsp;</td>
			<td width="25%">&nbsp;</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td width="25%"><br><?php echo $lang['DESCRIPCION']; ?></td>
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