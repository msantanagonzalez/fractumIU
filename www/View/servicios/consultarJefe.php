<?php
	$userType="jefe";
	require_once("../structure/header.php");
	$rows = $_SESSION['consultaServicio'];
	foreach ($rows as $row) { 
?>

<h1 id="headerJefe"><a><i>SERVICIO <?php echo $row['idServ']; ?></i></a></h1>
<form method="POST" action="../../Controller/serviciosController.php">
	<table class="default">
		<tr> 
			<td width="25%">CIF Empresa: </td> 
			<td width="25%"><input type="text" class="text" disabled name="cifEmpr" value="<?php echo $row['cifEmpr']; ?>"/></td> 
			<td width="25%">Periodicidad: </td> 
			<td width="25%"> <input type="text" class="text" disabled name="periodicidad" value="<?php echo $row['periodicidad']; ?>"/></td>
		</tr>
		<tr> 
			<td width="25%">#ID Servicio: </td> 
			<td width="25%"><input type="text" class="text" disabled name="idServ" value="<?php echo $row['idServ']; ?>"/></td> 
			<td width="25%">#ID M&aacute;quina: </td> 
			<td width="25%"> <input type="text" class="text" disabled name="idMaq" value="<?php echo $row['idMaq']; ?>" /></td>
		</tr>
		<tr> 
			<td width="25%">Fecha inicio: </td> 
			<td width="25%"><input type="text" class="text" disabled name="fInicioSer" value="<?php echo $row['fInicioSer']; ?>" /></td> 
			<td width="25%">Fecha fin: </td> 
			<td width="25%"> <input type="text" class="text" disabled name="fFinSer" value="<?php echo $row['fFinSer']; ?>" /></td>
		</tr>
		<tr> 
			<td width="25%">Coste: </td> 
			<td width="25%"><input type="text" class="text" disabled name="costeSer" value="<?php echo $row['costeSer']; ?>" /></td> 
			<td width="25%">&nbsp;</td>
			<td width="25%">&nbsp;</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td width="25%"><br>Descripci&oacute;n:</td>
			<td colspan='3'width="75%">
				<textarea style="resize:none; text-align:left;" style="t" rows="4" name='descripSer' disabled>
				<?php echo $row['descripSer']; ?>
				</textarea>
			</td>
		</tr>
		<?php } ?>
		<tr>
			<td colspan="4"><a href="../../Controller/serviciosController.php?accion=Modificar&idServ=<?php echo $row['idServ']; ?>"><input type="button" name="accion" value="Modificar"></td>
		</tr> 
	</table>
</form>

<?php
	require_once("../structure/footer.php");
?>