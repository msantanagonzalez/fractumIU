<?php
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>

<h1 id='headerJefe'><a><?php echo $lang['DETALLES_TRABAJO_BIG']; ?></a></h1>
	<form method="POST" action="../../Controller/iteracionesController.php">
	<?php
	$rows = $_SESSION['consultaIteracion'];
		foreach ($rows as $row) { ?>
			<table class='default'>

				<tr>
					<td><?php echo $lang['IDENTIFICADOR_INCIDENCIA']; ?></td>
					<td><input type='text' disabled name="numeroIncidencia" value="<?php echo $row['idIncid']; ?>"></td>
					<td><?php echo $lang['NUMERO_ITERACION']; ?></td>
			        <td><input type='text' disabled name="numeroTrabajo" value="<?php echo $row['nIteracion']; ?>"></td>
				</tr>

				<tr>
			        <td><?php echo $lang['COSTE']; ?></td>
			        <td><input type='text' disabled name="coste" value="<?php echo $row['costeIter']; ?>"></td>
			        <td><?php echo $lang['FECHA_APERTURA']; ?></td>
			        <td><input type='date' disabled value="<?php echo $row['fechaIter']; ?>"></td>
			    </tr>

			    <tr>
			        <td><?php echo $lang['HORA_INICIO']; ?></td>
			        <td><input type='time' disabled value="<?php echo $row['hInicio']; ?>"></td>
			        <td><?php echo $lang['HORA_FIN']; ?></td>
			        <td><input type='time' disabled value="<?php echo $row['hFin']; ?>"></td>
				</tr>

				<tr>
					<td width="25%"><br><?php echo $lang['DESCRIPCION']; ?></td>
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
