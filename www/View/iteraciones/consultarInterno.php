<?php
	$userType="interno";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	require_once $_SESSION['cribPath'].'View/messages/messages_ga.php';
	$rows = $_SESSION['consultaIteracion'];?>
		 <h1 id='headerInterno'><a><?= i18n("- DETALLES TRABAJO -") ?></a></h1>
		 	<div style='height:350px;width:auto;overflow-y: scroll;'>
		 	<form method="POST" action="../../Controller/iteracionesController.php?idIncidencia=<?php echo $rows[0][0];?>&nIteracion=<?php echo $rows[0][1];?>">
		<table class='default'>
			<tr>
				<td><?= i18n("Identificador Incidencia:") ?></td>
				<td><input type='text' disabled name="numeroIncidencia" value="<?php echo $rows[0]['idIncid']; ?>"></td>
				<td><?= i18n("ID usuario:") ?> </td>
				<td><input type="text" class="text" disabled value="<?php echo $rows[0]['dniUsu']; ?>"/></td>
			</tr>
			<tr>
				<td><?= i18n("Número Iteración") ?></td>
		    <td><input type='text' disabled name="numeroTrabajo" value="<?php echo $rows[0]['nIteracion']; ?>"></td>
				<td><?= i18n("Estado Iteración:") ?></td>
				<td><input type='text' disabled value="<?php if($rows[0]['estadoItera']==1){echo 'Abierta' ;}else{ echo 'Cerrada';}  ?>"></td>
			</tr>
			<tr>
		        <td><?= i18n("Coste") ?></td>
		        <td><input type='text' disabled name="coste" value="<?php echo $rows[0]['costeIter']; ?>"></td>
		        <td><?= i18n("Fecha Apertura:") ?></td>
		        <td><input type='date' disabled value="<?php echo $rows[0]['fechaIter']; ?>"></td>
		    </tr>
		    <tr>
		        <td><?= i18n("Hora Inicio:") ?></td>
		        <td><input type='time' disabled value="<?php echo $rows[0]['hInicio']; ?>"></td>
		        <td><?= i18n("Hora Fin:") ?></td>
		       <!-- <td><input type='time' disabled value="<?php echo $rows[0]['hFin']; ?>"></td> -->
				<td><input type='time' disabled value="<?php if($rows[0]['estadoItera']==1){echo 'NULL';}else{echo echo $rows[0]['hFin'];}  ?>"></td>
		  </tr>
		    <tr>
				<td colspan='5'><?= i18n("Descripción:") ?></td>
			</tr>
			</tr>
				<td colspan='5'>
					<textarea style="resize:none" class="text" rows="5" name='descripcionHistoricoIncidencia' disabled><?php echo $rows[0]['descripIter']; ?></textarea>
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

			<?php

			if(($rows[0]['dniUsu']==$_SESSION['dni'])&&($rows[0]['estadoItera']!=='0')){?>
				<td colspan="4"><input type='submit' name='accion' value='Modificar_Iteracion'/></td>
			<?php
			}
			?>
		</tr>
	</table>
</form>
</div>
<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
