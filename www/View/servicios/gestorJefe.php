<?php
	$userType="jefe";
	require_once("../structure/header.php");
?>

<h1 id="headerJefe"><a><i>SERVICIOS</i></a></h1>
<table class="default">
    <tr>
    	<th width="20%">#ID M&aacute;q.</th>
    	<th width="20%">Periodicidad</th>
       	<th width="20%">Coste</th>
       	<th width="20%">Empresa</th>
        <th width="10%">&nbsp;</th>
        <th width="10%">&nbsp;</th>
    </tr>
</table>
<form method="POST" action="">
	<table class="default">
		<tr> 
			<td width="20%">RE-034985</td> 
			<td width="20%">Mensual</td> 
			<td width="20%">500 €/Mes</td>
			<td width="20%">Empresa 1</td> 
			<td width="10%"><button><a href="consultarServicio.html">Consultar</a></button></td>
			<td width="10%"><button><a onclick="return Eliminar_Elemento()">Eliminar</a></button></td>
		</tr>
		<tr> 
			<td width="20%">RE-034985</td> 
			<td width="20%">Mensual</td> 
			<td width="20%">500 €/Mes</td>
			<td width="20%">Empresa 1</td> 
			<td width="10%"><button><a href="consultarServicio.html">Consultar</a></button></td>
			<td width="10%"><button><a onclick="return Eliminar_Elemento()">Eliminar</a></button></td>
		</tr>
		<tr> 
			<td width="20%">RE-034985</td> 
			<td width="20%">Mensual</td> 
			<td width="20%">500 €/Mes</td>
			<td width="20%">Empresa 1</td> 
			<td width="10%"><button><a href="consultarServicio.html">Consultar</a></button></td>
			<td width="10%"><button><a onclick="return Eliminar_Elemento()">Eliminar</a></button></td>
		</tr>
	</table>
</form>
<table class="default">
	<tr>
		<td colspan="4"><a href="altaServicio.html"><input type="button" name="sAlta" value="Alta Servicio"/></a></td>
	</tr>
</table>

<?php
	require_once("../structure/footer.php");
?>