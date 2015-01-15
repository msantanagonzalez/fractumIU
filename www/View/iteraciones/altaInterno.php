<?php
	$userType="interno";
	require_once("../structure/header.php");
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerInterno"><a>- NUEVA ITERACION DE EMPLEADO INTERNO -</a></h1>
<br>
<form name='FormAltaIteracion' onsubmit="return comprobarAltaIteracion()" action='../../Controller/iteracionesController.php' method='POST'>
	<input type="hidden" class="text" name="idIncid" value="indic1">
	<input type="hidden" class="text" name="nIteracion" value="1"/>
	<input type='hidden' class='text' name="estadoItera" value="0"/>
	<div style='height:350px;width:auto;overflow-y: scroll;'>
		<table class='default'>
			<tr>
				<td>ID Incidencia:</td>
				<td><input id="idIncid" type='text'  value='ID0'></td>
				<td>Numero Iteracion:</td>
				<td><input id="nIteracion" type='text'  value='0'></td>
			</tr>
				
			<tr>
				<td>Fecha Creacion:</td>
				<td><input id="fechaCreacion" type='date' name='FechaCreacion' value='<?php echo date('Y/m/d');?>'></td>
				<td>Hora Inicio:</td> 
				<td><input id="horaInicio" type='time' class='text' value='<?php echo  date('h:i:s'); ?>'> </td>
				<td>Hora Fin:</td> 
				<td><input id="horaFin" type='time' class='text' value='<?php echo date('h:i:s', strtotime('+24 hour')); ?>'> </td>
			</tr>
			<tr>
				<td>Estado Iteracion:</td>
			    <td><input id="estadoItera" type='text' value='0'></td>
				<td>Coste Trabajo:</td>
			    <td><input id="coste" type='text' value=''></td>
			</tr>
			<tr>
				<td width="30%"><br>Descripci&oacute;n:</td>
				<td colspan='3' width="75%">
				<textarea id="des" style="resize:none; text-align:left;" style="t" rows="4" name='descripcion'></textarea>
				</td>
			</tr>
			
			<tr>
				<td>Documentacion:</td>
			</tr>
			<tr>
				<td colspan='4'><input type='file' name='documentacionTrabajo'></td>
			</tr>
		</table>
	</div>
	<table>
		<tr> 
			<td width='25%'><input type='submit' name='accion' value='GUARDAR TRABAJO'> </td>
			<td width='45%'><a href="consultarIncidencia.html"><input type='button' value='ATRAS'></a></td>
		</tr>
	</table>
</form>

<?php
	require_once("../structure/footer.php");
?>