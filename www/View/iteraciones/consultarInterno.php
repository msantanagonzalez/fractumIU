<?php
	$userType="interno";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>

<h1 id='headerInterno'><a><?= i18n("- DETALLES TRABAJO -") ?></a></h1>


	<div style='height:350px;width:auto;overflow-y: scroll;'>
	<form method="POST" action="../../Controller/iteracionesController.php">
	<?php $rows = $_SESSION['consultaIteracion'];
	 foreach ($rows as $row) { ?>
		<table class='default'>
			<tr>
				<td><?= i18n("Identificador Incidencia:") ?></td>
				<td><input type='text' disabled name="numeroIncidencia" value="<?php echo $row['idIncid']; ?>"></td>
				<td><?= i18n("Número Iteración") ?></td>
		        <td><input type='text' disabled name="numeroTrabajo" value="<?php echo $row['nIteracion']; ?>"></td>
				<td width="25%"><?= i18n("ID usuario:") ?> </td>
				<td width="25%"><input type="text" class="text" disabled value="<?php echo $row['dniUsu']; ?>"/></td>
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
				<td><?= i18n("Estado Iteración:") ?></td>
		        <td><input type='text' disabled value="<?php if($row['estadoItera']==1){echo 'Abierta' ;}else{ echo 'Cerrada';}  ?>"></td>
		  </tr>
		    </tr>
				<td><?= i18n("Documentación:") ?></td>
		        <td colspan='3'><input type='text' disabled class='text' name="documentacion" value='#001-"Nombre archivo"'/ name='Descripcion_Tarea'></td>
		    </tr>
		    <tr>
				<td colspan='5'><?= i18n("Descripción:") ?></td>
			</tr>
			</tr>
				<td colspan='5'>
					<textarea style="resize:none" class="text" rows="5" name='descripcionHistoricoIncidencia' disabled><?php echo $row['descripIter']; ?></textarea>
				</td>
		    </tr>

				<?php
				$rows = $_SESSION['documentoIteracion'];
				if (empty($rows)) {
					?>
					<tr>
						<td colspan="4"><?= i18n("Documentación:") ?>
						<div class="alert alert-info" role="alert">
						<?= i18n("| INFO |- Iteración sin documento.") ?>
						</div>
						</td>
					</tr>
					<?php
					}else{
						foreach ($rows as $documento) {
						?>
						<tr>
							<td colspan="2"><?= i18n("Documentación:") ?></td>
							<td colspan="2">
							<a href="../<?php echo $documento['urlDocItr'];?>" target="_blank">
							<img src="../../Resources/images/PDF.png">
							<br>
							<?php echo $documento['nDocIter'];?>
							</a>
							</td>
						</tr>
						<?php
					}
				} ?>
		</table>

    <br>
    <table>
		<tr>

			<?php
			if(($row['dniUsu']==$_SESSION['dni'])&&($row['estadoItera']!=='0')){?>
				<td colspan="4"><a href="../../Controller/iteracionesController.php?accion=modificarIteracion&idIncidencia=<?php echo $row['idIncid']; ?>&nIteracion=<?php echo $row['nIteracion'];?>"><input type="button" name="Modificar" value="Modificar"></a></td>
			<?php
			}
			?>
		</tr>
	</table>
	<?php } ?>
</form>
</div>
<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
