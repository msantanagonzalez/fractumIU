<?php
   include_once '../../Controller/common.php';
	$userType="externo";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>

<h1 id='headerExterno'><a><?php echo $lang['DETALLES_TRABAJO_BIG']; ?></a></h1>


	<div style='height:350px;width:auto;overflow-y: scroll;'>
	<form method="POST" action="../../Controller/iteracionesController.php">
	<?php $rows = $_SESSION['consultaIteracion'];
	 foreach ($rows as $row) { ?>
		<table class='default'>
			<tr>
				<td><?php echo $lang['IDENTIFICADOR_INCIDENCIA']; ?></td>
				<td><input type='text' disabled name="numeroIncidencia" value="<?php echo $row['idIncid']; ?>"></td>
				<td><?php echo $lang['NUMERO_ITERACION']; ?></td>
		        <td><input type='text' disabled name="numeroTrabajo" value="<?php echo $row['nIteracion']; ?>"></td>
		        <td><?php echo $lang['COSTE']; ?></td>
		        <td><input type='text'  disabled name="coste" value="<?php echo $row['costeIter']; ?>"></td>
			</tr>

			<tr>
		        <td><?php echo $lang['FECHA_APERTURA']; ?></td>
		        <td><input type='date' disabled value="<?php echo $row['fechaIter']; ?>"></td>
		        <td><?php echo $lang['HORA_INICIO']; ?></td>
		        <td><input type='time' disabled value="<?php echo $row['hInicio']; ?>"></td>
		        <td><?php echo $lang['HORA_FIN']; ?></td>
		        <td><input type='time' disabled value="<?php if($rows[0]['estadoItera']==1){echo 'NULL';}else{echo $rows[0]['hFin'];}  ?>"></td>
		    </tr>
			<br>
		    <tr>
				<td><?php echo $lang['ESTADO_ITERACION']; ?></td>
		        <?php if ($row['estadoItera'] == 1) { ?>
          			<td><input type='text' disabled value="Abierta"></td>
          		<?php } else { ?>
	          		<td><input type='text' disabled value="Finalizada"></td>
          		<?php } ?>
		  	</tr>
		    <tr>
				<td colspan='5'><?php echo $lang['DESCRIPCION']; ?></td>
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
						<td colspan="4"><?php echo $lang['DOCUMENTACION']; ?>
						<div class="alert alert-info" role="alert">
						<?php echo $lang['INFO_NO_DOC']; ?>
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

	</table>
	<?php } ?>
</form>
</div>
<tr>

  <?php if ($row['estadoItera'] == 1) { ?>
    <td colspan="4"><a href="../../Controller/iteracionesController.php?accion=Modificar_Iteracion&idIncidencia=<?php echo $row['idIncid'];?>&nIteracion=<?php echo $row['nIteracion'];?>"><button type="submit" name="Modificar" value="Modificar"><?php echo $lang['MODIFICAR'] ?></button></a></td>
        <?php } else { ?>
    <td colspan="4"><a href="../../Controller/usuariosController.php?accion=nav"><button type="submit" name="Modificar" value="Volver"><?php echo $lang['VOLVER'] ?></button></a></td>
        <?php } ?>
</tr>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
