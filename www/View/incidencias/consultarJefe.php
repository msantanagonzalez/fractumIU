<?php
	$userType="jefe";
	require_once("../structure/header.php");
?>

<h1 id="headerJefe"><a><i>INCIDENCIA $#IDincidencia</i></a></h1>
<div style='height:525px;width:auto;overflow-y: scroll;'>
	<form method="POST" action="../../Controller/incidenciasController.php">
		<?php $rows = $_SESSION['consultaIncidencia']; ?>
		<input type="hidden" class="text" name="idIncidencia" value="<?php echo $row['idIncid']; ?>"/>
		<input type="hidden" class="text" name="derivada" value="<?php echo $row['derivada']; ?>"/>
		<table class="default">
			<?php foreach ($rows as $row) { ?>
			<tr> 
				<td width="25%">Apertura: </td> 
				<td width="25%"><input type="text" class="text" disabled name="dniApertura" value="<?php echo $row['dniApertura']; ?>"/></td> 
				<td width="25%">Responsable: </td> 
				<td width="25%"><input type="text" class="text" disabled name="dniResponsable" value="<?php echo $row['dniResponsable']; ?>"/></td>
			</tr>
			<tr> 
				<td width="25%">Fecha apertura: </td> 
				<td width="25%"><input type="text" class="text" disabled name="fechaApertura" value="<?php echo $row['fAper']; ?>" /></td> 
				<td width="25%">Fecha cierre: </td> 
				<td width="25%"><input type="text" class="text" disabled name="fechaCierre" value="<?php echo $row['fCier']; ?>" /></td>
			</tr>
			<tr> 
				<td>Estado:</td>
				<td>
					<select name='estadoIncidencia' disabled>
						<option value='<?php echo $row['estadoIncid']; ?>' selected><?php echo $row['estadoIncid']; ?></option>
					</select> 		
				</td>
				<td>Maquina:</td>
				<td>
					<select name='idMaquina' disabled>
					  	<option value='<?php echo $row['idMaq']; ?>' selected><?php echo $row['idMaq']; ?></option>
					</select> 		
				 </td>
			</tr>
			<tr>
				<td width="25%"><br>Descripci&oacute;n:</td>
				<td colspan='3' width="75%">
					<textarea style="resize:none; text-align:left;" style="t" rows="4" name='descripcion' disabled>
					<?php echo $row['descripIncid'];?>
					</textarea>
				</td>
			</tr>
			<?php } ?>
		</table>
	</form>
	<table class="default">
		<tr>
			<td colspan="4"><a href="../../Controller/incidenciasController.php?accion=Modificar&idIncidencia=<?php echo $row['idIncid']; ?>"><input type="submit" name="pModificar" value="Modificar"></a></td>
		</tr> 
	</table>
	<h1 id="headerJefe"><a>- ITERACIONES -</a></h1> <!--SECCIÓN-->
	<table class="default"><!--TABLA-->
       	<tr>
			<th width="20%">ID</th>
        	<th width="20%">FechaInicio</th>
            <th width="20%">Operario</th>
            <th width="20%">Coste</th>
			<th width="20%"> </th>
     	</tr>
    </table>
   	<table class="default"><!--TABLA-->
		<tr>
			<td width="20%">IT001</td>
        	<td width="20%">15/04/2014</td>
            <td width="20%">$operario</td>
            <td width="20%">12.00</td>
			<td width="10%"><a href="consultarTrabajo.html">Consultar</a></td>
			<td width="10%"><img src="../../Recursos/images/PDF.png"></td>
     	</tr>
   	</table>
</div>

<?php
	require_once("../structure/footer.php");
?>