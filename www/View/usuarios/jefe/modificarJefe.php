<?php
	$userType="jefe";
	require_once("../../structure/header.php");
?>

<h1 id="headerJefe"><a><i>PERFIL $jefeNegocio</i></a></h1>
<form method="POST" action="consultarPerfil.html">
	<table class="default">
		<tr> 
			<td width="25%">Nombre: </td> 
			<td width="25%"><input type="text" class="text" name="pNombre" value="Javier"/></td> 
			<td width="25%">Apellidos: </td> 
			<td width="25%"> <input type="text" class="text" name="pApellidos" value="Rodeiro Iglesias"/></td>
		</tr>
		<tr> 
			<td width="25%">#ID Jefe: </td> 
			<td width="25%"><input type="text" class="text" name="pID" disabled value="12345678X"/></td> 
			<td width="25%">Contraseña: </td> 
			<td width="25%"> <input type="text" class="text" name="pPass" value="*********" /></td>
		</tr>
		<tr> 
			<td width="25%">Tel&eacute;fono: </td> 
			<td width="25%"><input type="text" class="text" name="pTelf" value="612345789" /></td> 
			<td width="25%">Correo: </td> 
			<td width="25%"> <input type="text" class="text" name="pCorreo" value="jRodeiro@gmail.com" /></td>
		</tr>
		<tr>
			<td width="20%" colspan="4"><input type="submit" name="pModificar" value="Guardar"></td>
		</tr> 
	</table>
</form>

<?php
	require_once("../../structure/footer.php");
?>