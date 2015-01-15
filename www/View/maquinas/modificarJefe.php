<?php
	$userType="jefe";
	require_once("../structure/header.php");
	
	$rows = $_SESSION['consultaMaquina']; 
	
	foreach ($rows as $row) { 
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerJefe"><a><i>M&Aacute;QUINA <?php echo $row['idMaq']; ?></i></a></h1>

<form method="POST" onsubmit="return modificarMaquina()" action="../../Controller/maquinasController.php">
	
	
		<input type="hidden" class="text"  name="idMaq" value="<?php echo $row['idMaq']; ?>"/>
		<input type="hidden" class="text"  name="nSerie" value="<?php echo $row['nSerie']; ?>"/>
		<input type="hidden" class="text" name="descripMaq" value="<?php echo $row['descripMaq']; ?>"/>
		<input type="hidden" class="text" name="nomMaq" value="<?php echo $row['nomMaq']; ?>"/>		
		<input type="hidden" class="text"  name="costeMaq" value="<?php echo $row['costeMaq']; ?>"/>		
		
		
	<table class="default">
		<tr> 
			<td width="25%">#ID M&aacute;quina: </td> 
			<td width="25%"><input type="text" class="text" disabled name="idMaq" value="<?php echo $row['idMaq']; ?>"/></td> 
			<td width="25%">#N&uacute;m. serie: </td> 
			<td width="25%"> <input id="numSerie" type="text" class="text"  name="nSerie" value="<?php echo $row['nSerie']; ?>"/></td>
		</tr>
		<tr> 
			<td width="25%">Nombre: </td> 
			<td width="25%"><input id="nomMaq" type="text" class="text" name="nomMaq" value="<?php echo $row['nomMaq']; ?>"/></td> 
			<td width="25%">Coste: </td> 
			<td width="25%"><input id="coste" type="text" class="text"  name="costeMaq" value="<?php echo $row['costeMaq']; ?>"/></td> 
			<td width="25%"></td>
		</tr>
		<tr>
			<td width="25%"><br>Descripci&oacute;n:</td>
			<td colspan='3' width="75%">
				<textarea id="des" style="resize:none; text-align:left;" style="t" rows="4"  name="descripMaq" >
				<?php echo $row['descripMaq']; ?>
				</textarea>
			</td>
		</tr>
		<tr>
			<td>Documentacion:</td>
        	<td><img src="../../Recursos/images/PDF.png"></td>
        	<td colspan="2"><input type="file" name="accion" value="Subir"></td>
		</tr>
		<tr>
			<td colspan="4"><input type="submit" name="accion" value="Guardar"></td>
		</tr> 
		<?php } ?>
	</table>
</form>

<?php
	require_once("../structure/footer.php");
?>