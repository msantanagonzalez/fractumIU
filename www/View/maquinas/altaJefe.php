<?php
	$userType="jefe";
	require_once("../structure/header.php");
?>

<h1 id="headerJefe"><a><i>M&Aacute;QUINA </i></a></h1>
<form name='FromAltaMaquina' action='../../Controller/maquinasController.php' method='POST'>
	<table class="default">
		<tr> 
			<td width="25%">#ID M&aacute;quina: </td> 
			<td width="25%"><input type="text" class="text"  name="idMaq" value=''/></td>
			<td width="25%">#N&uacute;m. serie: </td> 
			<td width="25%"> <input type="text" class="text" name="nSerie" value=''/></td>
		</tr>
		<tr> 
			<td width="25%">Nombre: </td> 
			<td width="25%"><input type="text" class="text"  name="nomMaq" value=''/></td>
			<td width="25%">Coste: </td> 
			<td width="25%"><input type="text" class="text"  name="costeMaq" value=''/></td>
		</tr>
		<tr>
			<td width="25%"><br>Descripci&oacute;n:</td>
			<td colspan='3' width="75%">
				<textarea style="resize:none; text-align:left;" style="t" rows="4" name="descripMaq" >
				Descripci&oacute;n de la utilidad de la m&aacute;quina.
				</textarea>
			</td>
		</tr>
		<tr>
			<td>Documentacion:</td>
        	<td><img src="../../Recursos/images/PDF.png"></td>
        	<td colspan="2"><input type="file"  name="documentacionMaquina" value="Subir"></td>
		</tr>
		<tr>
			<td colspan="4"><input type="submit" name="accion" value="Alta"></td>
		</tr> 
	</table>
</form>

<?php
	require_once("../structure/footer.php");
?>