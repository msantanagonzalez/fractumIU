<?php
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>

		<?php $rows = $_SESSION['consultaIncidencia']; ?>
	<?php foreach ($rows as $row) { ?>
		<h1 id="headerInterno"><a><i><?php echo $lang['INCIDENCIAS_BIG']; ?> <?php echo $row['idIncid']; ?></i></a></h1>
		<div>
			<form name="formModificarIncidencia" method="POST"  action="../../Controller/incidenciasController.php">
		<input type="hidden" class="text" name="idIncidencia" value="<?php echo $row['idIncid']; ?>"/>
		<input type="hidden" class="text" name="derivada" value="<?php echo $row['derivada']; ?>"/>
		<input type="hidden" class="text" name="dniApertura" value="<?php echo $row['dniApertura']; ?>"/>
		<input type="hidden" class="text" name="idMaquina" value="<?php echo $row['idMaq']; ?>"/>
		<input type="hidden" class="text" name='descripcion' value="<?php echo $row['descripIncid'];?>"/>
		<input type="hidden" class="text" name="dniResponsable" value="<?php echo $row['dniResponsable']; ?>"/>
		<table class="default">
			<tr>
				<td width="25%"><?php echo $lang['APERTURA']; ?> </td>
				<td width="25%"><input type="text" class="text" disabled value="<?php echo $row['dniApertura']; ?>"/></td>
				<td width="25%"><?php echo $lang['RESPONSABLE']; ?> </td>
				<td width="25%"><input type="text" class="text" disabled value="<?php echo $row['dniResponsable']; ?>"/></td>
			</tr>
			<tr>
				<td width="25%"><?php echo $lang['FECHA_APERTURA']; ?> </td>
				<td width="25%"><input title="Debe seleccionar una fecha de apertura" id="fechaApertura" type="date" class="text" name="fechaApertura" value="<?php echo $row['fAper']; ?>" required/></td>
				<td width="25%"><?php echo $lang['FECHA_CIERRE']; ?> </td>
				<td width="25%"><input title="Debe seleccionar una fecha de cierre" id="fechaCierre" type="date" class="text" name="fechaCierre" value="<?php echo $row['fCier']; ?>" required/></td>
			</tr>
			<tr>
				<td><?php echo $lang['ESTADO']; ?></td>
				<td>
					<select name='estadoIncidencia'>
						<option value='<?php echo $row['estadoIncid']; ?>' selected>-- <?php echo $row['estadoIncid']; ?> --</option>
						<option value='Abierta'>Abierta</option>
						<option value='Pendiente'>Pendiente de Derivar</option>
						<option value='Cerrada'>Cerrada</option>
					</select>
				</td>
				<td><?php echo $lang['MAQUINA']; ?></td>
				<td>
					<select disabled>
					  	<option value='<?php echo $row['idMaq']; ?>' selected><?php echo $row['idMaq']; ?></option>
					</select>
				 </td>
			</tr>
			<tr>
				<td width="25%"><br><?php echo $lang['DESCRIPCION']; ?></td>
				<td colspan='3' width="75%">
					<textarea id="des" style="resize:none; text-align:left;" style="t" rows="4" disabled>
					<?php echo $row['descripIncid'];?>
					</textarea>
				</td>
			</tr>
			<?php } ?>
		</table>

	<table class="default">
		<tr>
			<td colspan="4"><input type="submit" name="accion" value="Modificado"></td>
		</tr>
	</table>
	</form>
</div>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>