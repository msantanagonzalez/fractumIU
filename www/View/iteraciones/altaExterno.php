<?php
	$userType="externo";
	require_once("../structure/header.php");
?>

<h1 id='headerExterno'><a>- TRABAJANDO $IDincidencia -</a></h1>
<br>
<form name='' id='' onsubmit='' action='' method='post'>
	<div style='height:350px;width:auto;overflow-y: scroll;'>
		<table class='default'>
	   	<tr>
			<td>Fecha Inicio:</td>
			<td><input type='date' disabled class='text' value='' / name='fechaInicio'></td>
			<td>Fecha Fin:</td>
			<td><input type='date' disabled class='text' value='' / name='fechaFin' id=''></td>
		</tr>
		<tr>
			<td>Hora Inicio:</td>
			<td><input type='text' disabled class='text' value=''/ name='horaInicio' id=''></td>
			<td>Hora Fin:</td>
			<td><input type='text' disabled class='text' value=''/ name='horaFin'></td>	
		</tr>
		<tr>
	        <td>Coste Trabajo:</td>
	        <td><input type='text' disabled name="costeTrabajo" value=''></td>
	    </tr>
		</tr>
			<td>Descripcion:</td>
	        <td colspan='3'><input type='text' disabled class='text' value=''/ name='descripcionIncidencia'></td>
	    </tr>
	    <tr>
			<td>Documentacion:</td>
		</tr>
		<tr>
			<td colspan='4'><input type='file' name='documentacionTrabajo'></td>
		</tr>
		</table>
	</div>
 	<br>
    <table>
		<tr> 
			<td width='25%'><input type='button' value='GUARDAR TRABAJO'> </td>
			<td width='25%'><input type='button' value='CERRAR TRABAJO'> </td>
			<td width='25%'><a href="consultarIncidencia.html"><input type='button' value='ATRAS'></a></td>
		</tr>
    </table>
</form>

<?php
	require_once("../structure/footer.php");
?>