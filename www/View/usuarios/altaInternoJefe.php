<?php
	$userType="jefe";
	require_once("../structure/header.php");
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerJefe"><a><i>ALTA OPERARIO INTERNO</i></a></h1>
<form method="POST" onsubmit="return altaOperarioInterno()" action="../../Controller/usuariosController.php">
	<table class="default">
		<tr> 
			<td width="25%">Nombre: </td> 
			<td width="25%"><input id="nombre" type="text" class="text" name="nombre" value=""/></td> 
			<td width="25%">Apellidos: </td> 
			<td width="25%"> <input id="apellidos" type="text" class="text" name="apellidos" value=""/></td>
		</tr>
		<tr> 
			<td width="25%">#ID Interno: </td> 
			<td width="25%"><input id="dni" type="text" class="text" name="dni" value=""/></td> 
		</tr>
		<tr> 
			<td width="25%">Tel&eacute;fono: </td> 
			<td width="25%"><input id="telefono" type="text" class="text" name="tlf" value="" /></td> 
			<td width="25%">Correo: </td> 
			<td width="25%"><input id="mail" type="text" class="text" name="correo" value="" /></td>
		</tr>
		<tr>
			<td colspan="4"><input type="submit" name="accion" value="altaInterno"></td>
		</tr> 
	</table>
</form>

<?php
	require_once("../structure/footer.php");
?>