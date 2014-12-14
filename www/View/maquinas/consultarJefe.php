<?php
	requiere_once("../Structure/bodyHeader.php");
	requiere_once("../Structure/bodyFooter.php");
?>

<h1 id="headerJefe"><a><i>M&Aacute;QUINA $#IDm&aacute;quina</i></a></h1>
<form method="POST" action="modificarMaquina.html" enctype="multipart/form-data">
	<table class="default">
		<tr> 
			<td width="25%">#ID M&aacute;quina: </td> 
			<td width="25%"><input type="text" class="text" disabled name="mID" value="#347896"/></td> 
			<td width="25%">#N&uacute;m. serie: </td> 
			<td width="25%"> <input type="text" class="text" disabled name="mNumSerie" value="al-870"/></td>
		</tr>
		<tr> 
			<td width="25%">Nombre: </td> 
			<td width="25%"><input type="text" class="text" disabled name="mNombre" value="Giga LX - Forja"/></td> 
			<td width="25%"></td> 
			<td width="25%"></td>
		</tr>
		<tr>
			<td width="25%"><br>Descripci&oacute;n:</td>
			<td colspan='3' width="75%">
				<textarea style="resize:none; text-align:left;" style="t" rows="4" name='sDesc' disabled>
				Descripci&oacute;n de la utilidad de la m&aacute;quina.
				</textarea>
			</td>
		</tr>
		<tr>
			<td>Documentacion:</td>
        	<td><img src="../../Recursos/images/PDF.png"></td>
        	<td colspan="2"><input type="file" disabled name="m" value="Subir"></td>
		</tr>
		<tr>
			<td colspan="4"><input type="submit" name="m" value="Modificar"></td>
		</tr>
		</table>
</form>
<h1 id="headerJefe"><a><i>INCIDENCIAS RELATIVAS</i></a></h1>
<form method="POST" action="">
	<table class="default">
		<tr> 
			<td width="20%">ID001</td> 
			<td width="20%"><a href="consultarMaquina.html">Maquina1</a></td> 
			<td width="20%">Usuario3</td> 
			<td width="20%">Abierta</td>
			<td width="15%"><a href="consultarTrabajoIncidencia.html">IT001</a></td>
			<td width="5%"><a href="consultarIncidencia.html">Consultar</a></td>
		</tr>
		<tr> 
			<td width="20%">ID003</td> 
			<td width="20%"><a href="consultarMaquina.html">Maquina1</a></td>
			<td width="20%">Usuario1</td> 
			<td width="20%">Pendiente de cierre</td>
			<td width="15%"><a href="consultarTrabajoIncidencia.html">IT003</a></td>
			<td width="5%"><a href="consultarIncidencia.html">Consultar</a></td>
		</tr>
		<tr> 
			<td width="20%">ID004</td> 
			<td width="20%"><a href="consultarMaquina.html">Maquina1</a></td> 
			<td width="20%">Usuario1</td> 
			<td width="20%">En curso</td>
			<td width="15%"><a href="consultarTrabajoIncidencia.html">IT003</a></td>
			<td width="5%"><a href="consultarIncidencia.html">Consultar</a></td>
		</tr>
	</table>
</form>