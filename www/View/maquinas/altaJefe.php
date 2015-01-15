<?php
	$userType="jefe";
	require_once("../structure/header.php");
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerJefe"><a><i><?= i18n("MÁQUINAS") ?></i></a></h1>
<form name='FromAltaMaquina' onsubmit="return altaMaquina()" action='../../Controller/maquinasController.php' method='POST' enctype="multipart/form-data">
	<table class="default">
		<tr> 
			<td width="25%">#ID <?= i18n("Máquina:") ?> </td> 
			<td width="25%"><input id="idMaq"type="text" class="text"  name="idMaq" value=''/></td>
			<td width="25%">#N&uacute;m. <?= i18n("serie:") ?> </td> 
			<td width="25%"> <input id="numSerie" type="text" class="text" name="nSerie" value=''/></td>
		</tr>
		<tr> 
			<td width="25%"><?= i18n("Nombre:") ?></td> 
			<td width="25%"><input id="nomMaq" type="text" class="text"  name="nomMaq" value=''/></td>
			<td width="25%"><?= i18n("Coste:") ?></td> 
			<td width="25%"><input id="coste" type="text" class="text"  name="costeMaq" value=''/></td>
		</tr>
		<tr>
			<td width="25%"><br><?= i18n("Descripción:") ?></td>
			<td colspan='3' width="75%">
				<textarea id="des" style="resize:none; text-align:left;" style="t" rows="4" name="descripMaq" >
				
				</textarea>
			</td>
		</tr>
	<tr>
			<td><?= i18n("Documentación:") ?></td>
        	<td><img src="../../Resources/images/PDF.png"></td>
        	<td colspan="2"><input type="file" name="docMaquina" id="docMaquina"></td>
		</tr>
		<tr>
			<td colspan="4"><input type="submit" name="accion" value="Alta"></td>
		</tr> 
	</table>
</form>

<?php
	require_once("../structure/footer.php");
?>