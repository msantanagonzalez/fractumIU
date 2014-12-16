<?php
	$userType="jefe";
	require_once("../../structure/header.php");
?>
            	
<h1 id="headerJefe"><a><i>PERFIL $jefeNegocio</i></a></h1>
<form method="POST" action="modificarPerfil.html">
	<table class="default">
		<tr> 
			<td width="25%">Nombre: </td> 
			<td width="25%"><input type="text" class="text" disabled name="pNombre" value="Javier"/></td> 
			<td width="25%">Apellidos: </td> 
			<td width="25%"> <input type="text" class="text" disabled name="pApellidos" value="Rodeiro Iglesias"/></td>
		</tr>
		<tr> 
			<td width="25%">#ID Jefe: </td> 
			<td width="25%"><input type="text" class="text" disabled name="pID" value="12345678X"/></td> 
			<td width="25%">Contraseña: </td> 
			<td width="25%"> <input type="text" class="text" disabled name="pPass" value="*********" /></td>
		</tr>
		<tr> 
			<td width="25%">Tel&eacute;fono: </td> 
			<td width="25%"><input type="text" class="text" disabled name="pTelf" value="612345789" /></td> 
			<td width="25%">Correo: </td> 
			<td width="25%"> <input type="text" class="text" disabled name="pCorreo" value="jRodeiro@gmail.com" /></td>
		</tr>
		<tr>
			<td width="20%" colspan="4"><input type="submit" name="pModificar" value="Modificar"></td>
		</tr> 
	</table>
</form>

<?php
	require_once("../../structure/footer.php");
?>