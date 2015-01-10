<?php
	$userType="jefe";
	require_once("../structure/header.php");
?>

<h1 id="headerJefe"><a><i>EMPRESA</i></a></h1>
<form method="POST" action="../../Controller/empresasController.php" enctype="multipart/form-data">
	<table class="default">
		<tr> 
			<td width="25%">#CIF: </td> 
			<td width="25%"><input type="text" class="text" name="cifEmpr" value=""/></td> 
			<td width="25%">Nombre: </td> 
			<td width="25%"> <input type="text" class="text" name="nomEmpr" value=""/></td>
		</tr>
		<tr> 
			<td width="25%">Tel&eacute;fono: </td> 
			<td width="25%"><input type="text" class="text" name="telefEmpr" value=""/></td> 
			<td width="25%">Correo: </td> 
			<td width="25%"><input type="text" class="text" name="mailEmpr" value=""/></td> 
		</tr>
	</table>
	<table>
		<tr> 
			<th width="20%">
			</th>
			<th width="40%">
				<input type='submit' name='accion' value='Alta'>
			</th>
			<th width="20%">
			</th>
		</tr>
	</table>
</form>

<?php
	require_once("../structure/footer.php");
?>