<?php
	$userType="jefe";
	require_once("../structure/header.php");
?>

<h1 id="headerJefe"><a><i>INCIDENCIAS</i></a></h1>
<table class="default">
    <tr>
    	<th width="17%">#ID Inc.</th>
    	<th width="17%">T&iacute;tulo</th>
       	<th width="17%">&Uacute;lt. operario</th>
        <th width="17%">&Uacute;lt. iteración</th>
        <th width="17%">Estado</th>
        <th width="17%">&nbsp;</th>
    </tr>
</table>
<form method="POST" action="">
	<table class="default">
		<tr> 
			<td width="17%">#233232</td> 
			<td width="17%">Avería alternador</td> 
			<td width="17%"><a href="consultarPerfil.html">Fulanito</a></td> 
			<td width="17%">12/03/2014</td>
			<td width="17%">Derivada</td>
			<td width="17%"><button><a href="consultarIncidencia.html">Consultar</a></button></td>
		</tr>
		<tr> 
			<td width="17%">#20642</td> 
			<td width="17%">Avería alternador</td> 
			<td width="17%"><a href="consultarPerfil.html">Fulanito</a></td> 
			<td width="17%">12/03/2014</td>
			<td width="17%">En curso</td>
			<td width="17%"><button><a href="consultarIncidencia.html">Consultar</a></button></td>
		</tr>
		<tr> 
			<td width="17%">#23342</td> 
			<td width="17%">Avería alternador</td> 
			<td width="17%"><a href="consultarPerfil.html">Fulanito</a></td> 
			<td width="17%">12/03/2014</td>
			<td width="17%">Pendiente de derivar</td>
			<td width="17%"><button><a href="consultarIncidencia.html">Consultar</a></button></td>
		</tr>
	</table>
</form>

<?php
	require_once("../structure/footer.php");
?>