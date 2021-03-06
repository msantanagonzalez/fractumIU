<?php
   include_once '../../Controller/common.php';
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerJefe"><a><i><?php echo $lang['ITERACION_BIG']; ?> $#IDincidencia</i></a></h1>
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
				<td width="25%"><?php echo $lang['IDENTIFICADOR_INCIDENCIA']; ?></td> 
				<td width="25%"><input type="text" class="text" disabled value="<?php echo $row['idIncid']; ?>"/></td> 
				<td width="25%"><?php echo $lang['NUMERO_ITERACION']; ?> </td> 
				<td width="25%"><input type="text" class="text" disabled value="<?php echo $row['nIteracion']; ?>"/></td>
				<td width="25%"><?php echo $lang['COSTE']; ?> </td> 
				<td width="25%"><input required title="Por favor introduzca un coste" id="coste" type="text" class="text" name="costeIter" value="<?php echo $row['costeIter']; ?>"/></td>
			</tr>
			<tr> 
				<td width="25%"><?php echo $lang['FECHA_APERTURA']; ?>  </td> 
				<td width="25%"><input type="date" class="text" name="fechaCreacion" disabled value="<?php echo $row['fechaIter']; ?>" /></td> 
				<td width="25%"><?php echo $lang['HORA_INICIO']; ?> </td> 
				<td width="25%"><input type="time" class="text" name="horaInicio" disabled value="<?php echo $row['hInicio']; ?>" /></td>
				<td width="25%"><?php echo $lang['HORA_FIN']; ?></td> 
				<td width="25%"><input id="horaFin" type="time" class="text" name="hFin" readonly="readonly" value='<?php echo  date('h:i:s'); ?>' /></td>
			</tr>
			<tr> 
				<td><?php echo $lang['ESTADO_ITERACION']; ?></td>
				<td width="25%"><input id="estadoItera" type="text" class="text" name="estadoItera" value="<?php echo $row['estadoItera']; ?>" /></td>
			</tr>
			<tr>
				<td width="25%"><br><?php echo $lang['DESCRIPCION']; ?></td>
				<td colspan='3' width="75%">
					<textarea required title="Por favor introduzca una breve descripción" id="des" style="resize:none; text-align:left;" style="t" rows="4" name="descripIter" ><?php echo $row['descripIter'];?></textarea>
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