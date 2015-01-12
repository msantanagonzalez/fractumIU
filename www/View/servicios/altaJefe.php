<?php
	$userType="jefe";
	require_once("../structure/header.php");
?>

<h1 id="headerJefe"><a><i>ALTA SERVICIO</i></a></h1>
<form name='FormAltaServicio' method="POST" action="../../Controller/serviciosController.php">
	<table class="default">
		<tr> 
			<td width="25%">CIF Empresa: </td> 
			<td width="25%"><input type="text" class="text" name="cifEmpr" value=""/></td> 
			<td width="25%">Periodicidad: </td> 
			<td width="25%"> <input type="text" class="text" name="periodicidad" value=""/></td>
		</tr>
		<tr> 
			<td width="25%">#ID Servicio: </td> 
			<td width="25%"><input type="text" class="text" name="idServ" value=""/></td> 
			<td width="25%">#ID M&aacute;quina: </td> 
			<td width="25%"> <input type="text" class="text" name="idMaq" value="" /></td>
		</tr>
		<tr> 
			<td width="25%">Fecha inicio: </td> 
			<td width="25%"><input type="text" class="text" name="fInicioSer" value="" /></td> 
			<td width="25%">Fecha fin: </td> 
			<td width="25%"> <input type="text" class="text" name="fFinSer" value="" /></td>
		</tr>
		<tr> 
			<td width="25%">Coste: </td> 
			<td width="25%"><input type="text" class="text" name="costeSer" placeholder="€/Mes" /></td> 
			<td width="25%">&nbsp;</td>
			<td width="25%">&nbsp;</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td width="25%"><br>Descripci&oacute;n:</td>
			<td colspan='3'width="75%">
				<textarea style="resize:none; text-align:left;" style="t" rows="4" name='descripSer'>Mantenimiento completo, coste de piezas no incluido.
				</textarea>
			</td>
		</tr>
		<tr>
			<td colspan="4"><a href="../../Controller/serviciosController.php?accion=Alta"><input type="submit" name="accion" value="Alta"/></a></td>
		</tr> 
	</table>
</form>

<?php
	require_once("../structure/footer.php");
?>