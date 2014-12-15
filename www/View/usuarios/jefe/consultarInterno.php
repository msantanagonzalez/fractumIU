<?php
	$userType="jefe";
	require_once("../../structure/header.php");
?>

<h1 id="headerJefe"><a><i>PERFIL $operarioInterno</i></a></h1>
<form method="POST" action="modificarPerfilInterno.html">
	<table class="default">
		<tr> 
			<td width="25%">Nombre: </td> 
			<td width="25%"><input type="text" class="text" disabled name="piNombre" value="Javier"/></td> 
			<td width="25%">Apellidos: </td> 
			<td width="25%"> <input type="text" class="text" disabled name="piApellidos" value="Rodeiro Iglesias"/></td>
		</tr>
		<tr> 
			<td width="25%">#ID Interno: </td> 
			<td width="25%"><input type="text" class="text" disabled name="piID" value="12345678X"/></td> 
			<td width="25%">Contraseña: </td> 
			<td width="25%"> <input type="text" class="text" disabled name="piPass" value="*********" /></td>
		</tr>
		<tr> 
			<td width="25%">Tel&eacute;fono: </td> 
			<td width="25%"><input type="text" class="text" disabled name="piTelf" value="612345789" /></td> 
			<td width="25%">Correo: </td> 
			<td width="25%"> <input type="text" class="text" disabled name="piCorreo" value="jRodeiro@gmail.com" /></td>
		</tr>
		<tr>
			<td width="20%" colspan="4"><input type="submit" name="piModificar" value="Modificar"></td>
		</tr> 
	</table>
</form>

<?php
	require_once("../../structure/footer.php");
?>