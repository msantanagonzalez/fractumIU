<?php
	requiere_once("../Structure/bodyHeader.php");
	requiere_once("../Structure/bodyFooter.php");
?>

<h1 id="headerJefe"><a><i>INCIDENCIA $#IDincidencia</i></a></h1>
<div style='height:525px;width:auto;overflow-y: scroll;'>
	<form method="POST" action="">
		<table class="default">
			<tr> 
				<td width="25%">Interno alta: </td> 
				<td width="25%"><input type="text" class="text" disabled name="iInternoAlta" value="12345678X"/></td> 
				<td width="25%">Responsable: </td> 
				<td width="25%"> <input type="text" class="text" name="Responsable" value="87654321Z"/></td>
			</tr>
			<tr> 
				<td width="25%">#ID Incidencia: </td> 
				<td width="25%"><input type="text" class="text" disabled name="iID" value="#08956A"/></td> 
				<td width="25%">#ID M&aacute;quina: </td> 
				<td width="25%"> <input type="text" class="text" disabled name="iMaquina" value="AW-23904" /></td>
			</tr>
			<tr> 
				<td width="25%">Fecha alta: </td> 
				<td width="25%"><input type="text" class="text" disabled name="iFechaAlta" value="23/06/14" /></td> 
				<td width="25%">Fecha cierre: </td> 
				<td width="25%"> <input type="text" class="text" disabled name="iFechaCierre" value="27/06/14" /></td>
			</tr>
			<tr> 
				<td width="25%">Coste: </td> 
				<td width="25%"><input type="text" class="text" disabled name="iCoste" value="250 €" /></td> 
				<td width="25%">Derivada: </td> 
				<td width="25%"> <input type="text" class="text" disabled name="iDerivada" value="No" /></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td width="25%"><br>Descripci&oacute;n:</td>
				<td colspan='3' width="75%">
					<textarea style="resize:none; text-align:left;" style="t" rows="4" name='sDesc' disabled>
					Mantenimiento completo, coste de piezas no incluido.
					</textarea>
				</td>
			</tr>
			</table>
	</form>
	<table class="default">
		<tr>
			<td colspan="4"><a href="consultarIncidencia.html"><input type="submit" name="pModificar" value="Guardar"></a></td>
		</tr> 
	</table>
</div>