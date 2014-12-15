<?php
	$userType="jefe";
	require_once("../structure/header.php");
?>

<h1 id="headerJefe"><a><i>SERVICIO $#IDservicio</i></a></h1>
<form method="POST" action="modificarServicio.html">
	<table class="default">
		<tr> 
			<td width="25%">CIF Empresa: </td> 
			<td width="25%"><input type="text" class="text" disabled name="sCIF" value="X12345678"/></td> 
			<td width="25%">Periodicidad: </td> 
			<td width="25%"> <input type="text" class="text" disabled name="sPerio" value="Cada 2 Meses"/></td>
		</tr>
		<tr> 
			<td width="25%">#ID Servicio: </td> 
			<td width="25%"><input type="text" class="text" disabled name="sID" value="#1234"/></td> 
			<td width="25%">#ID M&aacute;quina: </td> 
			<td width="25%"> <input type="text" class="text" disabled name="sMaquina" value="#708936" /></td>
		</tr>
		<tr> 
			<td width="25%">Fecha inicio: </td> 
			<td width="25%"><input type="text" class="text" disabled name="sFechaInicio" value="12/03/2005" /></td> 
			<td width="25%">Fecha fin: </td> 
			<td width="25%"> <input type="text" class="text" disabled name="sFechaFin" value="12/03/2015" /></td>
		</tr>
		<tr> 
			<td width="25%">Coste: </td> 
			<td width="25%"><input type="text" class="text" disabled name="sCoste" value="120'00 €/Mes" /></td> 
			<td width="25%">&nbsp;</td>
			<td width="25%">&nbsp;</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td width="25%"><br>Descripci&oacute;n:</td>
			<td colspan='3'width="75%">
				<textarea style="resize:none; text-align:left;" style="t" rows="4" name='sDesc' disabled>
				Mantenimiento completo, coste de piezas no incluido.
				</textarea>
			</td>
		</tr>
		<tr>
			<td colspan="4"><input type="submit" name="sModificar" value="Modificar"></td>
		</tr> 
	</table>
</form>

<?php
	require_once("../structure/footer.php");
?>