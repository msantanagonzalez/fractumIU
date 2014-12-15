<?php
	$userType="interno";
	require_once("../structure/header.php");
?>

<h1 id='headerInterno'><a>- DETALLES $IDincidencia -</a></h1>
<br>
<form name='' id='FormDetalle_Tarea' onsubmit='return Confirmar_EliminacionTarea()' action='' method='post'>
	<div style='height:350px;width:auto;overflow-y: scroll;'>
		<table class='default'>
		   	<tr>
				<td>Operario Alta:</td>
				<td><input type='text' disabled class='text' value='$nombreOperario' / name='operarioAlta'></td>
				<td>Responsable:</td>
				<td><input type='text' disabled class='text' value='$nombreOperario' / name='operarioCierre'></td>
			</tr>
			<tr>
				<td>#ID Incidencia:</td>
				<td><input type='text' disabled class='text' value='ID00X'/ name='idIncidencia'></td>
				<td>Nombre Maquina:</td>
				<td><input type='text' disabled class='text' value='MA00X'/ name='nombreMaquina'></td>	
			</tr>
			<tr>
		        <td>Fecha Alta:</td>
		        <td><input type='date' disabled/ value=''></td>
		        <td>Fecha Cierre:</td>
		        <td><input type='date' disabled/ value=''></td>
		    </tr>
			<tr>
		        <td>Coste total:</td>
		        <td><input type='text' disabled value='0.00'></td>
		        <td>Estado:</td>
		        <td><input type='text' disabled value='ABIERTA/CERRADA/DERIVADA/PENDIENTE DE CIERRE'></td>
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
		<h1 id="headerInterno"><a>- ITERACIONES -</a></h1> <!--SECCIÓN-->
		<table class="default"><!--TABLA-->
	       	<tr>
				<th width="20%">ID</th>
	        	<th width="20%">FechaInicio</th>
	            <th width="20%">Operario</th>
	            <th width="20%">Coste</th>
				<th width="20%"> </th>
	     	</tr>
	    </table>
	   	<table class="default"><!--TABLA-->
			<tr>
				<td width="20%">IT001</td>
	        	<td width="20%">15/04/2014</td>
	            <td width="20%">$operario</td>
	            <td width="20%">12.00</td>
				<td width="10%"><a href="consultarTrabajo.html">Consultar</a></td>
				<td width="10%"><img src="../../Recursos/images/PDF.png"></td>
	     	</tr>
	     	<tr>
				<td width="20%">IT002</td>
	        	<td width="20%">18/04/2014</td>
	            <td width="20%">$operario</td>
				<td width="20%">0.00</td>
	            <td width="10%"><a href="consultarTrabajo.html">Consultar</a></td>
				<td width="10%"></td>
	     	</tr>
			<tr>
				<td width="20%">IT003</td>
	        	<td width="20%">20/04/2014</td>
	            <td width="20%">$operario</td>
	            <td width="20%">0.00</td>
				<td width="10%"><a href="consultarTrabajo.html">Consultar</a></td>
				<td width="10%"><img src="../../Recursos/images/PDF.png"></td>
	     	</tr>
	   	</table>
		<!-- FIN ITERACIONES -->
	 </div>
	<br>
    <table>
		<tr> 
		<td><a href="altaTrabajo.html"><input type='button' value='Trabajar en incidencia'></a> </td>
		<td><input type='button' value='Cerrar incidencia'> </td>
		</tr>
    </table>
</form>

<?php
	require_once("../structure/footer.php");
?>