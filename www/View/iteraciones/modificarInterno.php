<?php
	require_once("../structure/header.php");
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerInterno"><a><i>ITERACION $#IDincidencia</i></a></h1>
<div>
	<form method="POST" onsubmit="return modificarIteracion()" action="../../Controller/iteracionesController.php">

		<?php $rows = $_SESSION['consultaIncidencia']; ?>
	<?php foreach ($rows as $row) { ?>
		<input type="hidden" class="text" name="idIncidencia" value="<?php echo $row['idIncid']; ?>"/>
		<input type="hidden" class="text" name="nIteracion" value="<?php echo $row['nIteracion']; ?>"/>
		<input type="hidden" class="text" name="fechaIteracion" value="<?php echo $row['fechaIter']; ?>"/>
		<input type="hidden" class="text" name="horaInicio" value="<?php echo $row['hInicio']; ?>"/>
		<input type="hidden" class="text" name="horaFin" value="<?php echo $row['hFin'];?>"/>
		<input type="hidden" class="text" name="estadoIteracion" value="<?php echo $row['estadoItera'];?>"/>
		<input type="hidden" class="text" name="descripcionIteracion" value="<?php echo $row['descripIter']; ?>"/>
		<input type="hidden" class="text" name="costeIteracion" value="<?php echo $row['costeIter']; ?>"/>
		<table class="default">
			<tr> 
				<td width="25%">Identificador Incidencia: </td> 
				<td width="25%"><input type="text" class="text" disabled value="<?php echo $row['idIncid']; ?>"/></td> 
				<td width="25%">Numero Iteracion: </td> 
				<td width="25%"><input type="text" class="text" disabled value="<?php echo $row['nIteracion']; ?>"/></td>
				<td width="25%">Coste: </td> 
				<td width="25%"><input id="coste" type="text" class="text"  value="<?php echo $row['costeIter']; ?>"/></td>
			</tr>
			<tr> 
				<td width="25%">Fecha Creacion </td> 
				<td width="25%"><input type="date" class="text" name="fechaCreacion" disabled value="<?php echo $row['fechaIter']; ?>" /></td> 
				<td width="25%">Hora Inicio: </td> 
				<td width="25%"><input type="time" class="text" name="horaInicio" disabled value="<?php echo $row['hInicio']; ?>" /></td>
				<td width="25%">Hora Fin: </td> 
				<td width="25%"><input id="horaFin" type="time" class="text" name="horaFin" value="<?php echo $row['hFin']; ?>" /></td>
			</tr>
			<tr> 
				<td>Estado Iteracion:</td>
				<td width="25%"><input id="estadoItera" type="date" class="text" name="estadoIteracion" value="<?php echo $row['estadoItera']; ?>" /></td> 	
			</tr>
			<tr>
				<td width="25%"><br>Descripci&oacute;n:</td>
				<td colspan='3' width="75%">
					<textarea id="des" style="resize:none; text-align:left;" style="t" rows="4">
					<?php echo $row['descripIter'];?>
					</textarea>
				</td>
			</tr>
			<?php } ?>
		</table>
	
	<table class="default">
		<tr>
			<td colspan="4"><input type="submit" name="accion" value="Modificado"></td>
		</tr> 
	</table>
	</form>
</div>

<?php
	require_once("../structure/footer.php");
?>