<?php
	requiere_once("../Structure/bodyHeader.php");
	requiere_once("../Structure/bodyFooter.php");
?>

<h1 id='headerExterno'><a>- DETALLES TRABAJO -</a></h1>
<br>
<form name='' id='' onsubmit='' action='' method='post'>
	<div style='height:350px;width:auto;overflow-y: scroll;'>
		<table class='default'>
			<tr>
				<td>Numero Trabajo:</td>
		        <td><input type='text' disabled name="numeroTrabajo" value=''></td>
		        <td>Coste:</td>
		        <td><input type='text' disabled name="coste" value=''></td>
		    </tr>
		   	<tr>
		        <td>Fecha Inicio:</td>
		        <td><input type='date' disabled/ value=''></td>
		        <td>Fecha Fin:</td>
		        <td><input type='date' disabled/ value=''></td>
		    </tr>
		    <tr>
		        <td>Hora Inicio:</td>
		        <td><input type='date' disabled/ value=''></td>
		        <td>Hora Fin:</td>
		        <td><input type='date' disabled/ value=''></td>
		    </tr>
		    </tr>
				<td>Documentacion:</td>
		        <td colspan='3'><input type='text' disabled class='text' name="documentacion" value='#001-"Nombre archivo"'/ name='Descripcion_Tarea'></td>
		    </tr>
		    <tr>
				<td colspan='5'>Descripcion:</td>
			</tr>
			</tr>
				<td colspan='5'>
					<textarea style="resize:none" class="text" rows="5" name='descripcionHistoricoIncidencia' disabled>
					BREVE DESCRIPCION DEL TRABAJO
					</textarea>
				</td>
		    </tr>
		</table>
 	</div>
    <table>
		<tr> 
			<td width='25%'> </td>
			<td width='25%'> </td>
			<td width='25%'><a href="consultarIncidencia.html"><input type='button' value='ATRAS'></a></td>
		</tr>
    </table>
</form>