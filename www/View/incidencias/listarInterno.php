<?php
	requiere_once("../Structure/bodyHeader.php");
	requiere_once("../Structure/bodyFooter.php");
?>

<h1 id="headerInterno"><a><i>INCIDENCIAS</i></a></h1>
<table class="default">
    <tr>
    	<th width="20%">ID</th>
    	<th width="20%">Maquina</th>
       	<th width="20%">Apertura</th>
        <th width="20%">Estado</th>
        <th width="10%">Ult.Iteracion</th>
        <th width="10%"></th>
    </tr>
</table>
<div style="height:300px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->
	<form method="POST" action="">
		<table class="default">
			<tr> 
				<td width="20%">ID001</td> 
				<td width="20%"><a href="consultarMaquina.html">Maquina1</a></td> 
				<td width="20%">Usuario1</td> 
				<td width="20%">Abierta</td>
				<td width="10%"><a href="consultarTrabajo.html">IT001</a></td>
				<td width="5%"><a href="consultarIncidencia.html">Consultar</a></td>
				<td width="5%"><button>Derivar</button></td>
			</tr>
			<tr> 
				<td width="20%">ID002</td> 
				<td width="20%"><a href="consultarMaquina.html">Maquina2</a></td> 
				<td width="20%">Usuario2</td> 
				<td width="20%">Cerrada</td>
				<td width="10%"><a href="consultarTrabajo.html">IT002</a></td>
				<td width="5%"><a href="consultarIncidencia.html">Consultar</a></td>
				<td width="5%"></td>
			</tr>
			<tr> 
				<td width="20%">ID003</td> 
				<td width="20%"><a href="consultarMaquina.html">Maquina3</a></td> 
				<td width="20%">Usuario1</td> 
				<td width="20%">Pendiente de cierre</td>
				<td width="10%"><a href="consultarTrabajo.html">IT003</a></td>
				<td width="5%"><a href="consultarIncidencia.html">Consultar</a></td>
				<td width="5%"><button>Cerrar</button></td>
			</tr>
			<tr> 
				<td width="20%">ID004</td> 
				<td width="20%"><a href="consultarMaquina.html">Maquina2</a></td> 
				<td width="20%">Usuario1</td> 
				<td width="20%">Derivada</td>
				<td width="10%"><a href="consultarTrabajo.html">IT004</a></td>
				<td width="5%"><a href="consultarIncidencia.html">Consultar</a></td>
				<td width="5%"></td>
			</tr>
		</table>
	</form>
</div>	
<table>
	<tr> 
		<th width="50%">
			<a href="altaIncidencia.html"><input type='button' name='accion' value='Nueva Incidencia'></a>
		</th>
	</tr>
</table>