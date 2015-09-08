<?php
	$userType="interno";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>


		<?php $rows = $_SESSION['consultaIteracion'];
		 foreach ($rows as $row) { ?>
			 <h1 id="headerInterno"><a><i><?php echo $lang['ITERACION_BIG']; ?>  <?php echo $row['idIncid']; ?></i></a></h1>
			 <div style='height:350px;width:auto;overflow-y: scroll;'>
			 	<form method="POST" onsubmit="return modificarIteracion()" action="../../Controller/iteracionesController.php">
		 <input type="hidden" class="text" name="idIncid" value="<?php echo $row['idIncid']; ?>"/>
		 <input type="hidden" class="text" name="nIteracion" value="<?php echo $row['nIteracion']; ?>"/>
		 <input type="hidden" class="text" name="fechaIter" value="<?php echo $row['fechaIter']; ?>"/>
		 <input type="hidden" class="text" name="hInicio" value="<?php echo $row['hInicio']; ?>"/>
		<table class="default">
			<tr>
				<td><?php echo $lang['IDENTIFICADOR_INCIDENCIA']; ?></td>
				<td><input type='text' disabled value="<?php echo $row['idIncid']; ?>"/></td>
				<td><?php echo $lang['NUMERO_ITERACION']; ?></td>
				<td><input type='text' disabled value="<?php echo $row['nIteracion']; ?>"/></td>
				<td width="25%"><?php echo $lang['ID_USUARIO']; ?></td>
				<td width="25%"><input type='text' disabled value="<?php echo $row['dniUsu']; ?>"/></td>			
			</tr>
			<tr>
				<td width="25%"><?php echo $lang['FECHA_APERTURA']; ?> </td>
				<td width="25%"><input type="date" class="text" name="fechaCreacion" disabled value="<?php echo $row['fechaIter']; ?>" /></td>
				<td width="25%"><?php echo $lang['HORA_INICIO']; ?> </td>
				<td width="25%"><input type="time" class="text" name="horaInicio" disabled value="<?php echo $row['hInicio']; ?>" /></td>
				<td width="25%"><?php echo $lang['HORA_FIN']; ?></td>
				<td width="25%"><input id="horaFin" type="time" class="text" name="hFin" readonly="readonly" value='<?php echo  date('h:i:s'); ?>' /></td>
			</tr>
			<br>
			<tr>
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
				<td width="25%"><?php echo $lang['COSTE']; ?> </td>
				
					<?php if($row['estadoItera']==1){?>
							
							<td width="25%"><input id="coste" type="text" class="text" name="costeIter" value="<?php echo $row['costeIter']; ?>"/></td>
							
							<?php
								}
								else{ 
							?>
								<td width="25%"><input id="coste" type="text" class="text" name="costeIter" disabled value="<?php echo $row['costeIter']; ?>"/></td>
								<?php
								}
								?>
				
			</tr>
			<tr>
				<td width="25%"><br><?php echo $lang['DESCRIPCION']; ?></td>
				<td colspan='3' width="75%">
				<?php if($row['estadoItera']==1){?>
						<textarea id="des" style="resize:none; text-align:left;" style="t" rows="4" name="descripIter" ><?php echo $row['descripIter'];?></textarea>
						<?php
							}
							else{ 
						?>
							<textarea id="des" style="resize:none; text-align:left;" style="t" rows="4"  disabled name="descripIter" ><?php echo $row['descripIter'];?></textarea>
							<?php
							}
							?>
					
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
