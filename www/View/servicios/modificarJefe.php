<?php
    include_once '../../Controller/common.php';
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	$rows = $_SESSION['consultaServicio'];
	foreach ($rows as $row) {
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerJefe"><a><i><?php echo $lang['SERVICIO_BIG']; ?><?php echo $row['idServ']; ?></i></a></h1>
<form name="FormModServicio" method="POST" onsubmit="return modificarServicio()" action="../../Controller/serviciosController.php">
		<input type="hidden" class="text" name="idServ" value="<?php echo $row['idServ']; ?>"/>
		<input type="hidden" class="text" name="dniUsu" value="<?php echo $row['dniUsu']; ?>"/>
		<input type="hidden" class="text" name="idMaq" value="<?php echo $row['cifEmpr']; ?>"/>
		<input type="hidden" class="text" name="cifEmpr" value="<?php echo $row['idMaq']; ?>"/>
		<input type="hidden" class="text" name='periodicidad' value="<?php echo $row['periodicidad'];?>"/>
		<input type="hidden" class="text" name="fInicioSer" value="<?php echo $row['fInicioSer']; ?>"/>
		<input type="hidden" class="text" name="fFinSer" value="<?php echo $row['fFinSer']; ?>"/>
		<input type="hidden" class="text" name="costeSer" value="<?php echo $row['costeSer']; ?>"/>
		<input type="hidden" class="text" name='descripSer' value="<?php echo $row['descripSer'];?>"/>
	<table class="default">
		<tr>
			<td width="25%"><?php echo $lang['CIF_EMPRESA']; ?></td>
			<td width="25%"><input type="text" class="text" disabled name="cifEmpr" value="<?php echo $row['cifEmpr']; ?>"/></td>
			<td width="25%"><?php echo $lang['PERIODICIDAD ']; ?></td>
			<td width="25%">
				<select title="debe seleccionar una periodicidad" required id="periodicidad" name="periodicidad">
					<option value="<?php echo $row['periodicidad'];?>" selected> <?php echo $row['periodicidad'];?> </option>
					<option value="1 mes"><?php echo $lang['EXAMPLE_MES1']; ?></option>
					<option value="3 meses"><?php echo $lang['EXAMPLE_MES2']; ?></option>
					<option value="6 meses"><?php echo $lang['EXAMPLE_MES3']; ?></option>
					<option value="12 meses"><?php echo $lang['EXAMPLE_MES4']; ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td width="25%"><?php echo $lang['ID_SERVICIO']; ?>  </td>
			<td width="25%"><input type="text" class="text" disabled name="idServ" value="<?php echo $row['idServ']; ?>"/></td>
			<td width="25%"><?php echo $lang['ID_MAQUINA']; ?> </td>
			<td width="25%"> <input type="text" class="text" disabled name="idMaq" value="<?php echo $row['idMaq']; ?>" /></td>
		</tr>
		<tr>
			<td width="25%"><?php echo $lang['FECHA_APERTURA']; ?> </td>
			<td width="25%"><input title="debe seleccionar una fecha de apertura" required id="fechaInicio" type="date" class="text" name="fInicioSer" value="<?php echo $row['fInicioSer']; ?>" /></td>
			<td width="25%"><?php echo $lang['FECHA_CIERRE']; ?> </td>
			<td width="25%"> <input title="debe seleccionar una fecha de fin" required id="fechaFin" type="date" class="text" name="fFinSer" value="<?php echo $row['fFinSer']; ?>" /></td>
		</tr>
		<tr>
			<td width="25%"><?php echo $lang['COSTE']; ?></td>
			<td width="25%"><input id="coste" type="text" class="text" name="costeSer" value="<?php echo $row['costeSer']; ?>" /></td>
			<td width="25%">&nbsp;</td>
			<td width="25%">&nbsp;</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td width="25%"><br><?php echo $lang['DESCRIPCION']; ?></td>
			<td colspan='3'width="75%">
				<textarea  id="des"style="resize:none; text-align:left;" style="t" rows="4" name='descripSer'><?php echo $row['descripSer']; ?></textarea>
			</td>
		</tr>
		<?php } ?>
		<tr>
			<td colspan="4"><a href="../../Controller/serviciosController.php?accion=Guardar&idServ=<?php echo $row['idServ']; ?>"><input type="submit" name="accion" value="Guardar"></a></td>
		</tr>

	</table>
</form>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
