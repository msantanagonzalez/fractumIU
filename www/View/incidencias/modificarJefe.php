<?php
	$userType="jefe";
	require_once("../structure/header.php");
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerJefe"><a><i>INCIDENCIA $#IDincidencia</i></a></h1>
<div>
	<form name="formModificarIncidencia" onsubmit="return comprobarModificarIncidenciaJefe()" method="POST" action="../../Controller/incidenciasController.php">

		<?php $rows = $_SESSION['consultaIncidencia']; ?>
	<?php foreach ($rows as $row) { ?>
		<input type="hidden" class="text" name="idIncidencia" value="<?php echo $row['idIncid']; ?>"/>
		<input type="hidden" class="text" name="derivada" value="<?php echo $row['derivada']; ?>"/>
		<input type="hidden" class="text" name="dniApertura" value="<?php echo $row['dniApertura']; ?>"/>
		<input type="hidden" class="text" name="idMaquina" value="<?php echo $row['idMaq']; ?>"/>
		<input type="hidden" class="text" name='descripcion' value="<?php echo $row['descripIncid'];?>"/>
		<table class="default">
			<tr> 
				<td width="25%">Apertura: </td> 
				<td width="25%"><input type="text" class="text" disabled value="<?php echo $row['dniApertura']; ?>"/></td> 
				<td width="25%">Responsable: </td> 
				<td width="25%"><input id="dniResponsable" type="text" class="text" name="dniResponsable" value="<?php echo $row['dniResponsable']; ?>"/></td>
			</tr>
			<tr> 
				<td width="25%">Fecha apertura: </td> 
				<td width="25%"><input id="fechaApertura" type="text" class="text" name="fechaApertura" value="<?php echo $row['fAper']; ?>" /></td> 
				<td width="25%">Fecha cierre: </td> 
				<td width="25%"><input id="fechaCierre" type="text" class="text" name="fechaCierre" value="<?php echo $row['fCier']; ?>" /></td>
			</tr>
			<tr> 
				<td>Estado:</td>
				<td>
					<select name='estadoIncidencia'>
						<option value='<?php echo $row['estadoIncid']; ?>' selected><?php echo $row['estadoIncid']; ?></option>
					</select> 		
				</td>
				<td>Maquina:</td>
				<td>
					<select disabled>
					  	<option value='<?php echo $row['idMaq']; ?>' selected><?php echo $row['idMaq']; ?></option>
					</select> 		
				 </td>
			</tr>
			<tr>
				<td width="25%"><br>Descripci&oacute;n:</td>
				<td colspan='3' width="75%">
					<textarea  style="resize:none; text-align:left;" style="t" rows="4" disabled>
					<?php echo $row['descripIncid'];?>
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