<?php
	$userType="jefe";
	require_once("../structure/header.php");
?>

<h1 id='headerJefe'><a>- DETALLES $IDtrabajo -</a></h1>
<br>
<form name='consultarTrabajo' id='consultarTrabajo' onsubmit='' action='' method='post'>
	<div style='height:525px;width:auto;overflow-y: scroll;'>
		<table class='default'>
			<tr>
				<td>Operario Alta:</td>
				<td><input type='text' disabled value='$idOperario'  / name='idOperario'></td>
				<td>Operario Cierre:</td>
				<td><input type='text' disabled value='$idOperario' / name='idOperario'></td>
			</tr>
			<tr>
				<td>ID Incidencia:</td>
				<td><input type='text' disabled value='I001'></td>
				<td>Nombre Maquina:</td>
				<td><input type='text' disabled value='$nombreMaquina'></td>
			</tr>
			<tr>
				<td>Fecha Inicio:</td>
				<td><input type='date' disabled value='15/04/2014' / name='fechaInicioTrabajo'></td>
				<td>Fecha Fin:</td>
				<td><input type='date' disabled value='15/04/2014' / name='fechaFinTrabajo'></td>
			</tr>
			<tr>
				<td>Coste Trabajo:</td>
				<td><input type='text' disabled value='0.00'></td>
				<td>Estado:</td>
				<td><input type='text' disabled value='Abierta/Cerrada'></td>
			</tr>
			<tr>
				<td width="25%"><br>Descripci&oacute;n:</td>
				<td colspan='3' width="75%">
					<textarea style="resize:none; text-align:left;" style="t" rows="4" name='sDesc' disabled>
					Descripción del trabajo realizado sobre la m&aacute;quina.
					</textarea>
				</td>
			</tr>
			<tr>
				<td>Documentacion:</td>
	        	<td><img src="../../Recursos/images/PDF.png"></td>
	        	<td colspan="2"><input type="file" disabled name="m" value="Subir"></td>
			</tr>
    	</table>
    </div>
</form>

<?php
	require_once("../structure/footer.php");
?>