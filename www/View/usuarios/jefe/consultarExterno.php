<?php
	$userType="jefe";
	require_once("../../structure/header.php");
?>

<h1 id="headerJefe"><a><i>PERFIL $operarioExterno</i></a></h1>
<form method="POST" action="modificarPerfilExterno.html">
	<table class="default">
		<tr> 
			<td width="25%">#ID Jefe: </td> 
			<td width="25%"><input type="text" class="text" name="peID" disabled value="12345678X"/></td> 
			<td width="25%">Contraseña: </td> 
			<td width="25%"> <input type="text" class="text" name="pePass" disabled value="*********" /></td>
		</tr>
		<tr> 
			<td width="25%">Nombre: </td> 
			<td width="25%"><input type="text" class="text" name="peNombre" disabled value="Javier"/></td> 
			<td width="25%">Apellidos: </td> 
			<td width="25%"> <input type="text" class="text" name="peApellidos" disabled value="Rodeiro Iglesias"/></td>
		</tr>
		<tr> 
			<td width="25%">Empresa: </td> 
			<td width="25%"><input type="text" class="text" name="peEmpresa" disabled value="Galfor" /></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td width="20%" colspan="4"><input type="submit" name="peModificar" value="Modificar"></td>
		</tr> 
	</table>
</form>

<?php
	require_once("../../structure/footer.php");
?>