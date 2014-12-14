<?php
	require_once("../Structure/bodyHeader.php");
	require_once("../Structure/bodyFooter.php");
?>
<h1 id="headerJefe"><a><i>ALTA SERVICIO</i></a></h1>
<form method="POST" action="consultarServicio.html">
	<table class="default">
		<tr> 
			<td width="25%">CIF Empresa: </td> 
			<td width="25%"><input type="text" class="text" name="sCIF" value=""/></td> 
			<td width="25%">Periodicidad: </td> 
			<td width="25%"> <input type="text" class="text" name="sPerio" value=""/></td>
		</tr>
		<tr> 
			<td width="25%">#ID Servicio: </td> 
			<td width="25%"><input type="text" class="text" name="sID" value=""/></td> 
			<td width="25%">#ID M&aacute;quina: </td> 
			<td width="25%"> <input type="text" class="text" name="sMaquina" value="" /></td>
		</tr>
		<tr> 
			<td width="25%">Fecha inicio: </td> 
			<td width="25%"><input type="text" class="text" name="sFechaInicio" value="" /></td> 
			<td width="25%">Fecha fin: </td> 
			<td width="25%"> <input type="text" class="text" name="sFechaFin" value="" /></td>
		</tr>
		<tr> 
			<td width="25%">Coste: </td> 
			<td width="25%"><input type="text" class="text" name="sCoste" value=" €/Mes" /></td> 
			<td width="25%">&nbsp;</td>
			<td width="25%">&nbsp;</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td width="25%"><br>Descripci&oacute;n:</td>
			<td colspan='3'width="75%">
				<textarea style="resize:none; text-align:left;" style="t" rows="4" name='sDesc'>
				Mantenimiento completo, coste de piezas no incluido.
				</textarea>
			</td>
		</tr>
		<tr>
			<td colspan="4"><input type="submit" name="sModificar" value="Modificar"></td>
		</tr> 
	</table>
</form>