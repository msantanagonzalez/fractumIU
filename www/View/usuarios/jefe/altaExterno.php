<?php
	$userType="jefe";
	require_once("../../structure/header.php");
?>

<h1 id="headerJefe"><a><i>ALTA OPERARIO EXTERNO</i></a></h1>
<form method="POST" action="consultarPerfilExterno.html">
	<table class="default">
		<tr> 
			<td width="25%">#ID operarioExterno: </td> 
			<td width="25%"><input type="text" class="text" name="peID" value="00000000X"/ disabled></td> 
			<td width="25%">Contraseña: </td> 
			<td width="25%"> <input type="text" class="text" name="pePass" value="abcdef" /></td>
		</tr>
		<tr> 
			<td width="25%">Nombre: </td> 
			<td width="25%"><input type="text" class="text" name="peNombre" value="Op"/></td> 
			<td width="25%">Apellidos: </td> 
			<td width="25%"> <input type="text" class="text" name="peApellidos" value="Externo"/></td>
		</tr>
		<tr> 
			<td width="25%">Empresa: </td> 
			<td width="25%"><input type="text" class="text" name="peEmpresa" value="Empresa1" /></td>
			<td width="25%">#ID Jefe: </td> 
			<td width="25%"><input type="text" class="text" name="peID" value="$idJefe"/ disabled></td> 
		</tr>
		<tr>
			<td colspan="4"><input type="submit" name="peAlta" value="Alta"></td>
		</tr> 
	</table>
</form>
</table>
	<tr>
		<td colspan="4"><input type="button" value="Imprimir" onclick='window.print(); return false;'></td>
	</tr> 
</table>

<?php
	require_once("../../structure/footer.php");
?>