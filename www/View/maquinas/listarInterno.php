<?php
	$userType="interno";
	require_once("../structure/header.php");
?>

<h1 id="headerInterno"><a><i>MAQUINAS</i></a></h1>
<table class="default">
    <tr>
    	<th width="20%">ID</th>
    	<th width="20%">Nombre</th>
       	<th width="20%">Servicio</th>
		<th width="20%">Ult.Incidencia</th>
        <th width="20%"></th>
    </tr>
</table>
<div style="height:300px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->
	<table class="default">
		<tr> 
			<td width="20%">MA001</td> 
			<td width="20%">Maquina1</td> 
			<td width="20%"><a href="#">FULL COVER</a></td> 
			<td width="20%"><a href="consultarIncidencia.html">I001</a></td> 
			<td width="20%"><button onclick="window.location.href='consultarMaquina.html'">Consultar</button></td>
		</tr>
		<tr> 
			<td width="20%">MA002</td> 
			<td width="20%">Maquina2</td> 
			<td width="20%"><a href="#">FULL COVER</a></td> 
			<td width="20%"><a href="consultarIncidencia.html">I002</a></td> 
			<td width="20%"><button onclick="window.location.href='consultarMaquina.html'">Consultar</button></td>
		</tr>
		<tr> 
			<td width="20%">MA003</td> 
			<td width="20%">Maquina3</td> 
			<td width="20%"><a href="#">INTEGRAL</a></td>
			<td width="20%">----</td>								
			<td width="20%"><button onclick="window.location.href='consultarMaquina.html'">Consultar</button></td>
		</tr>
		<tr> 
			<td width="20%">MA004</td> 
			<td width="20%">Maquina4</td> 
			<td width="20%">----</td> 
			<td width="20%">----</td>	
			<td width="20%"><button onclick="window.location.href='consultarMaquina.html'">Consultar</button></td>
		</tr>
		<tr> 
			<td width="20%">MA005</td> 
			<td width="20%">Maquina5</td> 
			<td width="20%">----</td> 
			<td width="20%">----</td>	
			<td width="20%"><button onclick="window.location.href='consultarMaquina.html'">Consultar</button></td>
		</tr>
	</table>
</div>

<?php
	require_once("../structure/footer.php");
?>