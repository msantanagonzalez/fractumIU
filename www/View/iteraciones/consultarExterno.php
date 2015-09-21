<?php
	$userType="externo";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>

<h1 id='headerExterno'><a><?= i18n("- DETALLES TRABAJO -") ?></a></h1>


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
		        <td><?= i18n("Coste") ?></td>
		        <td><input type='text'  disabled name="coste" value="<?php echo $row['costeIter']; ?>"></td>
			</tr>

			<tr>
		        <td><?= i18n("Fecha Apertura:") ?></td>
		        <td><input type='date' disabled value="<?php echo $row['fechaIter']; ?>"></td>
		        <td><?= i18n("Hora Inicio:") ?></td>
		        <td><input type='time' disabled value="<?php echo $row['hInicio']; ?>"></td>
		        <td><?= i18n("Hora Fin:") ?></td>
		        <td><input type='time' disabled value="<?php if($rows[0]['estadoItera']==1){echo 'NULL';}else{echo echo $rows[0]['hFin'];}  ?>"></td>
		    </tr>
			<br>
		    <tr>
				<td><?= i18n("Estado Iteración:") ?></td>
		        <?php if ($row['estadoItera'] == 1) { ?>
          			<td><input type='text' disabled value="Abierta"></td>
          		<?php } else { ?>
	          		<td><input type='text' disabled value="Finalizada"></td>
          		<?php } ?>
		  	</tr>
		    <tr>
				<td colspan='5'><?= i18n("Descripción:") ?></td>
			</tr>
			<tr>
				<td colspan='5'>
					<textarea style="resize:none" class="text" rows="5" name='descripcionHistoricoIncidencia' disabled><?php echo $row['descripIter']; ?></textarea>
				</td>
		  </tr>
			<?php
				$array = $_SESSION['documentoIteracion'];
				if (empty($array)) {
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
						foreach ($array as $documento) {
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

			<?php if ($row['estadoItera'] == 1) { ?>
				<td colspan="4"><a href="../../Controller/iteracionesController.php?accion=Modificar_Iteracion&idIncidencia=<?php echo $row['idIncid'];?>&nIteracion=<?php echo $row['nIteracion'];?>"><input type="button" name="Modificar" value="Modificar"></a></td>
          	<?php } else { ?>
				<td colspan="4"><a href="../../Controller/usuariosController.php?accion=nav"><input type="button" name="Modificar" value="Volver"></a></td>
          	<?php } ?>
		</tr>
	</table>
	<?php } ?>
</form>
</div>
<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
