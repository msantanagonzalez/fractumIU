<?php
	$userType="externo";
	require_once("../structure/header.php");
?>

<h1 id='headerExterno'><a>- DETALLES $IDincidencia -</a></h1>
<br>
<form name='' id='' onsubmit='' action='' method='post'>
	<div style='height:350px;width:auto;overflow-y: scroll;'>
		<table class='default'>
	   	<tr>
			<td>#ID Incidencia:</td>
			<td><input type='text' disabled class='text' value='ID00X'/ name='idIncidencia'></td>
			<td>Nombre Maquina:</td>
			<td><input type='text' disabled class='text' value='MA00X'/ name='nombreMaquina'></td>	
		</tr>
		<tr>
			<td>Responsable:</td>
			<td><input type='text' disabled class='text' value='Juan Perez'/ name='opApertura'></td>
	        <td>Estado:</td>
	        <td><input type='text' disabled value='ABIERTA/CERRADA/EN CURSO/PENDIENTE DE CIERRE'></td>
	    </tr>
		<tr>
	        <td>Fecha Alta:</td>
	        <td><input type='date' disabled/ value=''></td>
	        <td>Fecha Cierre:</td>
	        <td><input type='date' disabled/ value=''></td>
	    </tr>
		<tr>
			<td colspan='5'>Descripcion:</td>
		</tr>
		<tr>	
	        <td colspan='5'>
				<textarea style="resize:none" class="text" rows="5" name='descripcionApertura' disabled>
				BREVE DESCRIPCION DE APERTURA
				</textarea>
			</td>
	    </tr>
		</table>
		<br>
		<!-- ITERACIONES -->
		<h1 id="headerExterno"><a>- ITERACIONES -</a></h1> <!--SECCIÓN-->
		<table class="default"><!--TABLA-->
	       	<tr>
				<th width="25%">ID</th>
	        	<th width="25%">FechaInicio</th>
	            <th width="25%">Coste</th>
				<th width="5%" > </th>
				<th width="15%" > </th>
	     	</tr>
	    </table>
	   	<table class="default"><!--TABLA-->
			<tr>
				<td width="25%">IT001</td>
	        	<td width="25%">15/04/2014</td>
	            <td width="25%">12.00</td>
	            <td width="5%" ><img src="../../Recursos/images/PDF.png"></td>
				<td width="15%"><a href="consultarTrabajoIncidencia.html">Consultar</a></td>
	     	</tr>
	     	<tr>
				<td width="25%">IT002</td>
	        	<td width="25%">18/04/2014</td>
	            <td width="25%">60.00</td>
	            <td width="5%" > </td>
				<td width="15%"><a href="consultarTrabajoIncidencia.html">Consultar</a></td>
	     	</tr>
			<tr>
				<td width="25%">IT003</td>
	        	<td width="25%">20/04/2014</td>
	            <td width="25%">80.00</td>
				<td width="5%" ><img src="../../Recursos/images/PDF.png"></td>
				<td width="15%"><a href="consultarTrabajoIncidencia.html">Consultar</a></td>
	     	</tr>
	   	</table>
		<!-- FIN ITERACIONES -->
 	</div>
 	<br>
    <table>
		<tr> 
		<td width='25%'><a href="trabajarIncidencia.html"><input type='button' value='TRABAJAR EN INCIDENCIA'></a> </td>
		<td width='25%'> </td>
		<td width='25%'><input type='button' value='FINALIZAR INCIDENCIA'> </td>
		</tr>
    </table>
</form>

<?php
	require_once("../structure/footer.php");
?>