<?php
	$userType="jefe";
	require_once("../structure/header.php");
?>

<h1 id="headerJefe"><a><i>M&Aacute;QUINA $#IDm&aacute;quina</i></a></h1>
<form method="POST" action="consultarMaquina.html" enctype="multipart/form-data">
	<table class="default">
		<tr> 
			<td width="25%">#ID M&aacute;quina: </td> 
			<td width="25%"><input type="text" class="text" disabled name="mID" value="#347896"/></td> 
			<td width="25%">#N&uacute;m. serie: </td> 
			<td width="25%"> <input type="text" class="text" disabled name="mNumSerie" value="al-870"/></td>
		</tr>
		<tr> 
			<td width="25%">Nombre: </td> 
			<td width="25%"><input type="text" class="text" name="mNombre" value="Giga LX - Forja"/></td> 
			<td width="25%"></td> 
			<td width="25%"></td>
		</tr>
		<tr>
			<td width="25%"><br>Descripci&oacute;n:</td>
			<td colspan='3' width="75%">
				<textarea style="resize:none; text-align:left;" style="t" rows="4" name='sDesc'>
				Descripci&oacute;n de la utilidad de la m&aacute;quina.
				</textarea>
			</td>
		</tr>
		<tr>
			<td>Documentacion:</td>
        	<td><img src="../../Recursos/images/PDF.png"></td>
        	<td colspan="2"><input type="file" name="m" value="Subir"></td>
		</tr>
		<tr>
			<td colspan="4"><input type="submit" name="m" value="Guardar"></td>
		</tr> 
	</table>
</form>

<?php
	require_once("../structure/footer.php");
?>