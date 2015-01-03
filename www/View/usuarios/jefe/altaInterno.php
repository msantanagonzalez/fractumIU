<?php
	$userType="jefe";
	require_once("../../structure/header.php");
?>

<h1 id="headerJefe"><a><i>ALTA OPERARIO INTERNO</i></a></h1>
<form method="POST" action="../../../Controller/usuariosController.php">
	<table class="default">
		<tr> 
			<td width="25%">Nombre: </td> 
			<td width="25%"><input type="text" class="text" name="nombre" value=""/></td> 
			<td width="25%">Apellidos: </td> 
			<td width="25%"> <input type="text" class="text" name="apellidos" value=""/></td>
		</tr>
		<tr> 
			<td width="25%">#ID Interno: </td> 
			<td width="25%"><input type="text" class="text" name="dni" value=""/></td> 
		</tr>
		<tr> 
			<td width="25%">Tel&eacute;fono: </td> 
			<td width="25%"><input type="text" class="text" name="tlf" value="" /></td> 
			<td width="25%">Correo: </td> 
			<td width="25%"><input type="text" class="text" name="correo" value="" /></td>
		</tr>
		<tr>
			<td colspan="4"><input type="submit" name="accion" value="altaInterno"></td>
		</tr> 
	</table>
</form>

<?php
	require_once("../../structure/footer.php");
?>