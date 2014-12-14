<?php
	requiere_once("../Structure/bodyHeader.php");
	requiere_once("../Structure/bodyFooter.php");
?>

<h1 id="headerInterno"><a><i>NUEVA INCIDENCIA</i></a></h1>
<form name='FormAltaIncidencia' action='' method='post'>
	<div style='height:350px;width:auto;overflow-y: scroll;'>
		<table class='default'>
		   <tr>
				<td>Apertura:</td>
				<td><input type='text' class='text' name='idOperarioInterno' value='$USUARIO' disabled></td>
				<td>Fecha Apertura:</td>
				<td><input type='date' name='fechaApertura' value='$fechaSistema' disabled></td>
			</tr>
			<tr>
				<td>Maquina:</td>
				<td colspan='3'>
					<select name='idMaquina'>
					  <option value='NULL' selected>-</option>
					  <option value='Maquina1'>Maquina1</option>
					  <option value='Maquina2'>Maquina2</option>
					  <option value='Maquina3'>Maquina3</option>
					</select> 		
				 </td>
			</tr>	
			<tr>
				<td colspan='5'>Descripcion:</td>
			</tr>
			<tr>
				<td colspan='5'><textarea style="resize:none" class="text" rows="5" name='descripcionApertura' required></textarea></td>
			</tr>	
		</table>
	</div>
	
	<table>
		<tr> 
			<th width="20%">
			</th>
			<th width="40%">
			<input type='submit' name='accion' value='alta'>
			</th>
			<th width="20%">
			</th>
		</tr>
	</table>
</form>
<!--FIN SECCIÓN-->