<?php
	$userType="jefe";
	require_once("../structure/header.php");
?>

<h1 id="headerJefe"><a><i>M&Aacute;QUINAS</i></a></h1>
<table class="default">
    <tr>
    	<th width="20%">#ID M&aacute;q.</th>
    	<th width="20%">Servicio</th>
       	<th width="20%">&Uacute;lt. incidencia</th>
        <th width="10%">&nbsp;</th>
        <th width="10%">&nbsp;</th>
    </tr>
</table>
<form method="POST" action="">
	<table class="default">
		<tr> 
			<td width="20%">#344089</td> 
			<td width="20%">Sí</td> 
			<td width="20%">13/09/2014</td> 
			<td width="10%"><button><a href="consultarMaquina.html">Consultar</a></button></td>
			<td width="10%"><button><a onclick="return Eliminar_Elemento()">Eliminar</a></button></td>
		</tr>
		<tr> 
			<td width="20%">#344089</td> 
			<td width="20%">Sí</td> 
			<td width="20%">13/09/2014</td> 
			<td width="10%"><button><a href="consultarMaquina.html">Consultar</a></button></td></td>
			<td width="10%"><button><a onclick="return Eliminar_Elemento()">Eliminar</a></button></td>
		</tr>
		<tr> 
			<td width="20%">#344089</td> 
			<td width="20%">Sí</td> 
			<td width="20%">13/09/2014</td> 
			<td width="10%"><button><a href="consultarMaquina.html">Consultar</a></button></td></td>
			<td width="10%"><button><a onclick="return Eliminar_Elemento()">Eliminar</a></button></td>
		</tr>
	</table>
</form>
<table class="default">
	<tr>
		<td colspan="4"><a href="altaMaquina.html"><input type="button" name="sAlta" value="Alta M&aacute;quina"/></a></td>
	</tr>
</table>

<?php
	require_once("../structure/footer.php");
?>