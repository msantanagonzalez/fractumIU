<?php
	$userType="interno";
	require_once("../../structure/bodyHeader.php");
?>

<h1 id="headerJefe"><a><i>ALTA OPERARIO INTERNO</i></a></h1>
<form method="POST" action="consultarPerfilInterno.html">
	<table class="default">
		<tr> 
			<td width="25%">Nombre: </td> 
			<td width="25%"><input type="text" class="text" name="piNombre" value=""/></td> 
			<td width="25%">Apellidos: </td> 
			<td width="25%"> <input type="text" class="text" name="piApellidos" value=""/></td>
		</tr>
		<tr> 
			<td width="25%">#ID Interno: </td> 
			<td width="25%"><input type="text" class="text" name="piID" value=""/></td> 
			<td width="25%">Contraseña: </td> 
			<td width="25%"> <input type="text" class="text" name="piPass" value /></td>
		</tr>
		<tr> 
			<td width="25%">Tel&eacute;fono: </td> 
			<td width="25%"><input type="text" class="text" name="piTelf" value="" /></td> 
			<td width="25%">Correo: </td> 
			<td width="25%"><input type="text" class="text" name="piCorreo" value="" /></td>
		</tr>
		<tr>
			<td colspan="4"><input type="submit" name="piAlta" value="Alta"></td>
		</tr> 
	</table>
</form>

<?php
	require_once("../../structure/bodyFooter.php");
?>