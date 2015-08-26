<?php
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>

<h1 id='headerJefe'><a><?= i18n("- DETALLES TRABAJO -") ?></a></h1>
	<form method="POST" action="../../Controller/iteracionesController.php">
	<?php
	$rows = $_SESSION['consultaIteracion'];
		foreach ($rows as $row) { ?>
			<table class='default'>

				<tr>
					<td><?= i18n("Identificador Incidencia:") ?></td>
					<td><input type='text' disabled name="numeroIncidencia" value="<?php echo $row['idIncid']; ?>"></td>
					<td><?= i18n("Número Iteración") ?></td>
			        <td><input type='text' disabled name="numeroTrabajo" value="<?php echo $row['nIteracion']; ?>"></td>
				</tr>

				<tr>
			        <td><?= i18n("Coste") ?></td>
			        <td><input type='text' disabled name="coste" value="<?php echo $row['costeIter']; ?>"></td>
			        <td><?= i18n("Fecha Apertura:") ?></td>
			        <td><input type='date' disabled value="<?php echo $row['fechaIter']; ?>"></td>
			    </tr>

			    <tr>
			        <td><?= i18n("Hora Inicio:") ?></td>
			        <td><input type='time' disabled value="<?php echo $row['hInicio']; ?>"></td>
			        <td><?= i18n("Hora Fin:") ?></td>
			        <td><input type='time' disabled value="<?php echo $row['hFin']; ?>"></td>
				</tr>

				<tr>
					<td width="25%"><br><?= i18n("Descripción:") ?></td>
					<td colspan='4'>
						<textarea style="resize:none" class="text" rows="5" name='descripcionHistoricoIncidencia' disabled>
						"<?php echo $row['descripIter']; ?>"
						</textarea>
					</td>
				</tr>

			</table>
	<?php } ?>
</form>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
