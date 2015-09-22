<?php
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	require_once $_SESSION['cribPath'].'View/messages/messages_ga.php';
?>

		<?php 	$rows = $_SESSION['consultaIncidencia'];
				$ultimaIteracion = $_SESSION['estadoIteracion'];
		?>
	<?php foreach ($rows as $row) { ?>
		<h1 id="headerInterno"><a><i><?= i18n("INCIDENCIA") ?> <?php echo $row['idIncid']; ?></i></a></h1>
		<div>
			<form name="formModificarIncidencia" method="POST"  action="../../Controller/incidenciasController.php">
		<input type="hidden" class="text" name="idIncidencia" value="<?php echo $row['idIncid']; ?>"/>
		<input type="hidden" class="text" name="derivada" value="<?php echo $row['derivada']; ?>"/>
		<input type="hidden" class="text" name="dniApertura" value="<?php echo $row['dniApertura']; ?>"/>
		<input type="hidden" class="text" name="idMaquina" value="<?php echo $row['idMaq']; ?>"/>
		<input type="hidden" class="text" name='descripcion' value="<?php echo $row['descripIncid'];?>"/>
		<input type="hidden" class="text" name="dniResponsable" value="<?php echo $row['dniResponsable']; ?>"/>
		<input type="hidden" class="text" name="cifEmpr" value="DEFAULT"/>
		<table class="default">
			<tr>
				<td width="25%"><?= i18n("Apertura:") ?> </td>
				<td width="25%"><input type="text" class="text" disabled value="<?php echo $row['dniApertura']; ?>"/></td>
				<td width="25%"><?= i18n("Responsable:") ?> </td>
				<td width="25%"><input type="text" class="text" disabled value="<?php echo $row['dniResponsable']; ?>"/></td>
			</tr>
			<tr>
				<td width="25%"><?= i18n("Fecha Apertura:") ?> </td>
				<td width="25%"><input readonly="readonly" title="Debe seleccionar una fecha de apertura" id="fechaApertura" type="date" class="text" name="fechaApertura" value="<?php echo $row['fAper']; ?>" required/></td>
				<td width="25%"><?= i18n("Fecha Cierre:") ?> </td>
				<td width="25%"><input title="Debe seleccionar una fecha de cierre" id="fechaCierre" type="date" class="text" name="fechaCierre" value="<?php echo $row['fCier']; ?>" required/></td>
			</tr>
			<tr>
				<td><?= i18n("Estado:") ?></td>
				<td>
					<select name='estadoIncidencia'>
						<option value='<?php echo $row['estadoIncid']; ?>' selected>-- <?php echo $row['estadoIncid']; ?> --</option>
						<?php

							if(($row['estadoIncid']!='En Curso')and($row['estadoIncid']!='Pendiente Cierre')){
						?>
						<option value='Abierta'>Abierta</option>
							<?php
							}
							?>

						<option value='Pendiente Derivar'>Pendiente de Derivar</option>
						<?php

							if(($ultimaIteracion==false) OR ($ultimaIteracion[0][0]!=1)){
						?>
						<option value='Cerrada'>Cerrada</option>
							<?php
							}
							?>
					</select>
				</td>
				<td><?= i18n("Máquina:") ?></td>
				<td>
					<select disabled>
					  	<option value='<?php echo $row['idMaq']; ?>' selected><?php echo $row['idMaq']; ?></option>
					</select>
				 </td>
			</tr>
			<tr>
				<td width="25%"><br><?= i18n("Descripción:") ?></td>
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
