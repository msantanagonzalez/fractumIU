<?php
	$userType="externo";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerExterno"><a><i><?= i18n("ITERACIÓN") ?> $#IDincidencia</i></a></h1>
<div>
	<form method="POST" onsubmit="return modificarIteracion()" action="../../Controller/iteracionesController.php">

		<?php $rows = $_SESSION['consultaIteracion'];
		 foreach ($rows as $row) { ?>
		 <input type="hidden" class="text" name="idIncid" value="<?php echo $row['idIncid']; ?>"/>
		 <input type="hidden" class="text" name="nIteracion" value="<?php echo $row['nIteracion']; ?>"/>
		 <input type="hidden" class="text" name="fechaIter" value="<?php echo $row['fechaIter']; ?>"/>
		 <input type="hidden" class="text" name="hInicio" value="<?php echo $row['hInicio']; ?>"/>
		<table class="default">
			<tr>
				<td width="25%"><?= i18n("Identificador Incidencia:") ?> </td>
				<td width="25%"><input type="text" class="text" disabled value="<?php echo $row['idIncid']; ?>"/></td>
				<td width="25%"><?= i18n("Número Iteración:") ?> </td>
				<td width="25%"><input type="text" class="text" disabled value="<?php echo $row['nIteracion']; ?>"/></td>
				<td width="25%"><?= i18n("Coste:") ?> </td>
				<td width="25%"><input id="coste" type="text" class="text" name="costeIter" value="<?php echo $row['costeIter']; ?>"/></td>
			</tr>
			<tr>
				<td width="25%"><?= i18n("Fecha Apertura:") ?> </td>
				<td width="25%"><input type="date" class="text" name="fechaCreacion" disabled value="<?php echo $row['fechaIter']; ?>" /></td>
				<td width="25%"><?= i18n("Hora Inicio:") ?> </td>
				<td width="25%"><input type="time" class="text" name="horaInicio" disabled value="<?php echo $row['hInicio']; ?>" /></td>
				<td width="25%"><?= i18n("Hora Fin:") ?></td>
				<td width="25%"><input id="horaFin" type="time" class="text" name="hFin" readonly="readonly" value='<?php echo  date('h:i:s'); ?>' /></td>
			</tr>
			<tr>
				<td><?= i18n("Iterador:") ?></td>
				<td width="25%"><input id="dniResponsable" type='text' class="text" name="dniResponsable" disabled value="<?php echo $row['dniUsu']; ?>"></td>
				<td><?= i18n("Estado Iteración:") ?></td>
				<td width="25%"><input id="estadoItera" type="text" class="text" name="estadoItera" value="<?php echo $row['estadoItera']; ?>" /></td>
			</tr>
			<tr>
				<td width="25%"><br><?= i18n("Descripción:") ?></td>
				<td colspan='3' width="75%">
					<textarea id="des" style="resize:none; text-align:left;" style="t" rows="4" name="descripIter" ><?php echo $row['descripIter'];?></textarea>
				</td>
			</tr>
		</table>

	<table class="default">
		<tr>
			<td colspan="4"><input type="submit" name="accion" value="Modificado"></td>
		</tr>
			<?php } ?>
	</table>
	</form>
</div>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
