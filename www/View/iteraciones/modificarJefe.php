<?php
	$userType="jefe";
	require_once("../structure/header.php");
?>

<h1 id="headerJefe"><a><i>ITERACION $#IDincidencia</i></a></h1>
<div>
	<form method="POST" action="../../Controller/iteracionesController.php">

		<?php $rows = $_SESSION['consultaIteracion'];
		 foreach ($rows as $row) { ?>
		 <input type="hidden" class="text" name="idIncid" value="<?php echo $row['idIncid']; ?>"/>
		<input type="hidden" class="text" name="nIteracion" value="<?php echo $row['nIteracion']; ?>"/>
		<input type="hidden" class="text" name="fechaIter" value="<?php echo $row['fechaIter']; ?>"/>
		<input type="hidden" class="text" name="hInicio" value="<?php echo $row['hInicio']; ?>"/>
		<table class="default">
			<tr> 
				<td width="25%">Identificador Incidencia: </td> 
				<td width="25%"><input type="text" class="text" name="idIncid" disabled value="<?php echo $row['idIncid']; ?>"/></td> 
				<td width="25%">Numero Iteracion: </td> 
				<td width="25%"><input type="text" class="text" name="nIteracion" disabled value="<?php echo $row['nIteracion']; ?>"/></td>
				<td width="25%">Coste: </td> 
				<td width="25%"><input type="text" class="text" name="costeIter" value="<?php echo $row['costeIter']; ?>"/></td>
			</tr>
			<tr> 
				<td width="25%">Fecha Creacion </td> 
				<td width="25%"><input type="date" class="text" name="fechaIter" disabled value="<?php echo $row['fechaIter']; ?>" /></td> 
				<td width="25%">Hora Inicio: </td> 
				<td width="25%"><input type="time" class="text" name="hInicio" disabled value="<?php echo $row['hInicio']; ?>" /></td>
				<td width="25%">Hora Fin: </td> 
				<td width="25%"><input type="time" class="text" name="hFin" value="<?php echo $row['hFin']; ?>" /></td>
			</tr>
			<tr>
				<td width="25%"><br>Descripci&oacute;n:</td>
				<td colspan='3' width="75%">
					<textarea style="resize:none; text-align:left;" style="t" rows="4" name="descripIter"><?php echo $row['descripIter']; ?></textarea>
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
	require_once("../structure/footer.php");
?>