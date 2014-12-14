<?php
	requiere_once("../Structure/bodyHeader.php");
	requiere_once("../Structure/bodyFooter.php");
?>

<h1 id='headerInterno'><a>- DETALLES $IDincidencia -</a></h1> <!--SECCIÓN-->
<!--INICIO TABLA-->
<br>
<form name='consultarTrabajo' id='consultarTrabajo' onsubmit='' action='' method='post'>
	<div style='height:350px;width:auto;overflow-y: scroll;'>
		<table class='default'>
			<tr>
				<td>Operario Alta:</td>
				<td><input type='text' disabled value='$idOperario' / name='idOperario'></td>
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
				<td>Fecha Creacion:</td>
				<td><input type='date' disabled value='15/04/2014' / name='fechaInicioTrabajo'></td>
				<td>Coste Trabajo:</td>
				<td><input type='text' disabled value='0.00'></td>
			</tr>
			<tr>
				<td>Hora inicio:</td>
				<td><input type='date' disabled value='$horaSistema' / name='fechaFinTrabajo'></td>
				<td>Hora fin:</td>
				<td><input type='date' disabled value='$horaSistema' / name='fechaFinTrabajo'></td>
			</tr>
			<tr>
				
				<td>Estado:</td>
				<td><input type='text' disabled value='Abierta/Cerrada/Derivada'></td>
			</tr>
			<tr>
				<td colspan='4'>Descripcion:</td>
			</tr>
			<tr>	
		        <td colspan='4'>
					<textarea style="resize:none" rows="5" name='descripcionApertura' disabled>
					BREVE DESCRIPCION DEL TRABAJO REALIZADO
					</textarea>
				</td>
		    </tr>
			<tr>
				<td>Documentacion:</td>
		        <td><img src="../../Recursos/images/PDF.png"></td>
			</tr>
		</table>
	</div>
	<br>
    <table>
		<tr> 
		<td width='25%'><a href="consultarIncidencia.html"><input type='button' value='Atras'></a></td>
		<td width='25%'><input type='submit' value='Modificar[si abierta]'> </td>
		<td width='25%'><input type='submit' value='Finalizar[si abierta]'> </td>
		<td width='25%'></td>
		</tr>
    </table>
</form>