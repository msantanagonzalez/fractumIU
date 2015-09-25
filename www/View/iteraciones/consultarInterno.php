<?php
   include_once '../../Controller/common.php';
	$userType="interno";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	$rows = $_SESSION['consultaIteracion'];?>
		 <h1 id='headerInterno'><a><?php echo $lang['DETALLES_TRABAJO_BIG']; ?></a></h1>
		 	<div style='height:350px;width:auto;overflow-y: scroll;'>
		 	<form method="POST" action="../../Controller/iteracionesController.php?idIncidencia=<?php echo $rows[0][0];?>&nIteracion=<?php echo $rows[0][1];?>">
		<table class='default'>
			<tr>
				<td><?php echo $lang['IDENTIFICADOR_INCIDENCIA']; ?></td>
				<td><input type='text' disabled name="numeroIncidencia" value="<?php echo $rows[0]['idIncid']; ?>"></td>
				<td><?php echo $lang['ID_USUARIO']; ?>  </td>
				<td><input type="text" class="text" disabled value="<?php echo $rows[0]['dniUsu']; ?>"/></td>
			</tr>
			<tr>
				<td><?php echo $lang['NUMERO_ITERACION']; ?></td>
		    <td><input type='text' disabled name="numeroTrabajo" value="<?php echo $rows[0]['nIteracion']; ?>"></td>
				<td><?php echo $lang['ESTADO_ITERACION']; ?></td>
				<td><input type='text' disabled value="<?php if($rows[0]['estadoItera']==1){echo 'Abierta' ;}else{ echo 'Cerrada';}  ?>"></td>
			</tr>
			<tr>
		        <td><?php echo $lang['COSTE']; ?></td>
		        <td><input type='text' disabled name="coste" value="<?php echo $rows[0]['costeIter']; ?>"></td>
		        <td><?php echo $lang['FECHA_APERTURA']; ?></td>
		        <td><input type='date' disabled value="<?php echo $rows[0]['fechaIter']; ?>"></td>
		    </tr>
		    <tr>
		        <td><?php echo $lang['HORA_INICIO']; ?></td>
		        <td><input type='time' disabled value="<?php echo $rows[0]['hInicio']; ?>"></td>
		        <td><?php echo $lang['HORA_FIN']; ?><</td>
		       <!-- <td><input type='time' disabled value="<?php echo $rows[0]['hFin']; ?>"></td> -->
				<td><input type='time' disabled value="<?php if($rows[0]['estadoItera']==1){echo 'NULL';}else{echo $rows[0]['hFin'];}  ?>"></td>
		  </tr>
		    <tr>
				<td colspan='5'><?php echo $lang['DESCRIPCION']; ?></td>
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
							<td colspan="2"><?php echo $lang['DOCUMENTACION']; ?></td>
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
