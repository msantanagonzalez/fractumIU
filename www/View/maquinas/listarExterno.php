<?php
	requiere_once("../Structure/bodyHeader.php");
	requiere_once("../Structure/bodyFooter.php");
?>

<h1 id="headerExterno"><a>- MAQUINAS -</a></h1> <!--SECCIÓN-->
<table class="default"><!--TABLA-->
	<tr>
		<th width="10%">ID</th>
		<th width="25%">Nombre</th>
	    <th width="25%">Mantenimiento</th>
	    <th width="25%">Ult. Incidencia</th>
		<th width="15%"> </th>
	</tr>
</table>
<div style="height:350px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->
	<table class="default"><!--TABLA-->
		<tr>
			<td width="10%">MA001</th>
			<td width="25%">Centrifugadora Verduras</td>
		    <td width="25%">No</td>
		    <td width="25%">10/11/2013</td>
			<td width="15%"><button onclick="window.location.href='consultarMaquina.html'">Consultar</button></td>
		</tr>
		<tr>
			<td width="10%">MA002</th>
			<td width="25%">Cortadora Tomates</td>
		    <td width="25%">Si</td>
		    <td width="25%">14/11/2014</td>
			<td width="15%"><button onclick="window.location.href='consultarMaquina.html'">Consultar</button></td>
		</tr>
	</table>
</div>