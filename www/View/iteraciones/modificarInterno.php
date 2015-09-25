<?php
   include_once '../../Controller/common.php';
	$userType="interno";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>


		<?php $rows = $_SESSION['consultaIteracion'];
		 foreach ($rows as $row) { ?>
			 <h1 id="headerInterno"><a><i><?php echo $lang['ITERACION_BIG']; ?>  <?php echo $row['idIncid']; ?></i></a></h1>
			 <div style='height:350px;width:auto;overflow-y: scroll;'>
			 	<form method="POST" onsubmit="return modificarIteracion()" action="../../Controller/iteracionesController.php" enctype="multipart/form-data">
					<input type="hidden" class="text" name="idMaq" value="<?php echo $row['idMaq']; ?>"/>
		 <input type="hidden" class="text" name="idIncid" value="<?php echo $row['idIncid']; ?>"/>
		 <input type="hidden" class="text" name="nIteracion" value="<?php echo $row['nIteracion']; ?>"/>
		 <input type="hidden" class="text" name="fechaIter" value="<?php echo $row['fechaIter']; ?>"/>
		 <input type="hidden" class="text" name="hInicio" value="<?php echo $row['hInicio']; ?>"/>
		 <input type="hidden" class="text" name="hFin" value="<?php echo $row['hFin']; ?>"/>
		<table class="default">
			<tr>
				<td><?php echo $lang['IDENTIFICADOR_INCIDENCIA']; ?></td>
				<td><input type='text' disabled value="<?php echo $row['idIncid']; ?>"/></td>
				<td width="25%"><?php echo $lang['ID_USUARIO']; ?>></td>
				<td width="25%"><input type='text' disabled value="<?php echo $row['dniUsu']; ?>"/></td>
			</tr>
			<tr>
				<td><?php echo $lang['NUMERO_ITERACION']; ?></td>
				<td><input type='text' disabled value="<?php echo $row['nIteracion']; ?>"/></td>
				<td><?php echo $lang['ESTADO_ITERACION']; ?></td>
				<td>

						<?php if($row['estadoItera']==1){?>
						<select name='estadoItera'>
							<option value='1' selected >Abierta</option>
							<option value='0'>Cerrada</option>
						</select>
						<?php
							}
							else{
						?>
							<input type="text" class="text" disabled value="Cerrada"/>
							<?php
							}
							?>

				</td>
			</tr>
			<tr>
				<td width="25%"><?php echo $lang['COSTE']; ?> </td>

					<?php if($row['estadoItera']==1){?>

							<td width="25%"><input required title="Debe introducir un coste" id="coste" type="text" class="text" name="costeIter" value="<?php echo $row['costeIter']; ?>"/></td>

							<?php
								}
								else{
							?>
								<td width="25%"><input id="coste" type="text" class="text" name="costeIter" disabled value="<?php echo $row['costeIter']; ?>"/></td>
								<?php
								}
								?>
				<td width="25%"><?php echo $lang['FECHA_APERTURA']; ?>  </td>
				<td width="25%"><input type="date" class="text" name="fechaCreacion" disabled value="<?php echo $row['fechaIter']; ?>" /></td>
			</tr>
			<tr>
				<td width="25%"><?php echo $lang['HORA_INICIO']; ?> </td>
				<td width="25%"><input type="time" class="text" name="horaInicio" disabled value="<?php echo $row['hInicio']; ?>" /></td>
				<td width="25%"><?php echo $lang['HORA_FIN']; ?></td>
				<td width="25%"><input id="horaFin" type="time" class="text" name="hFin" disabled value='<?php echo  date('h:i:s'); ?>' /></td>
			</tr>
			<br>
			<tr>
				<td width="25%"><br><?php echo $lang['DESCRIPCION']; ?></td>
				<td colspan='5' width="75%">
				<?php if($row['estadoItera']==1){?>
						<textarea required title="Por favor introduzca una descripcion" id="des" style="resize:none; text-align:left;" style="t" rows="5" name="descripIter" ><?php echo $row['descripIter'];?></textarea>
						<?php
							}
							else{
						?>
							<textarea id="des" style="resize:none; text-align:left;" style="t" rows="5"  disabled name="descripIter" ><?php echo $row['descripIter'];?></textarea>
							<?php
							}
							?>

				</td>
			</tr>
			<?php
			$rows = $_SESSION['documentoIteracion'];
			if (empty($rows)) {
				?>
				<tr>
					<td><?php echo $lang['DOCUMENTACION']; ?></td>
					<td><img src="../../Resources/images/PDF.png"></td>
					<td colspan="2"><input type="file" name="docIteracion" id="docIteracion"></td>
				</tr>
				<tr>
				<td colspan="4"><input  type="submit" name="accion" value="modificadoIteracion"></td>
				</tr>
				<?php
				}else{
					foreach ($rows as $row) {
					?>
					<tr>
						<td colspan="2"><?php echo $lang['DOCUMENTACION']; ?></td>
						<td colspan="2">
						<a href="../<?php echo $row['urlDocItr'];?>" target="_blank">
						<img src="../../Resources/images/PDF.png">
						</a>
						<br>
						<a href="../../Controller/iteracionesController.php?accion=eliminarDocIteracion&idIncid=<?php echo $row['idIncid'];?>&nIteracion=<?php echo $row['nIteracion'];?>&path=<?php echo $row['urlDocItr'];?>">
						<?php echo "Eliminar";?>
						</a>
						</td>
					</tr>
					<tr>
						<td colspan="4"><input  type="submit" name="accion" value="modificadoIteracion"></td>
					</tr>
					<?php
					}
				} ?>
		</table>
	<?php } ?>
	</form>
</div>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
