<?php
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	
	$rows = $_SESSION['consultaMaquina']; 
	
	foreach ($rows as $row) { 
?>

<h1 id="headerJefe"><a><i><?php echo $lang['MAQUINA_BIG']; ?> <?php echo $row['idMaq']; ?></i></a></h1>

<form method="POST" action="../../Controller/maquinasController.php">
	
	
		<input type="hidden" class="text"  name="idMaq" value="<?php echo $row['idMaq']; ?>"/>
		<input type="hidden" class="text"  name="nSerie" value="<?php echo $row['nSerie']; ?>"/>
		<input type="hidden" class="text" name="descripMaq" value="<?php echo $row['descripMaq']; ?>"/>
		<input type="hidden" class="text" name="nomMaq" value="<?php echo $row['nomMaq']; ?>"/>		
		<input type="hidden" class="text"  name="costeMaq" value="<?php echo $row['costeMaq']; ?>"/>		
		
		
	<table class="default">
		<tr> 
			<td width="25%"><?php echo $lang['ID_MAQUINA']; ?> </td> 
			<td width="25%"><input type="text" class="text" disabled name="idMaq" value="<?php echo $row['idMaq']; ?>"/></td> 
			<td width="25%"><?php echo $lang['NUMERO_SERIE']; ?></td> 
			<td width="25%"> <input type="text" class="text" disabled name="nSerie" value="<?php echo $row['nSerie']; ?>"/></td>
		</tr>
		<tr> 
			<td width="25%"><?php echo $lang['NOMBRE']; ?></td> 
			<td width="25%"><input type="text" class="text" name="nomMaq" value="<?php echo $row['nomMaq']; ?>"/></td> 
			<td width="25%"><?php echo $lang['COSTE']; ?>  </td> 
			<td width="25%"><input type="text" class="text" disabled name="costeMaq" value="<?php echo $row['costeMaq']; ?>"/></td> 
			<td width="25%"></td>
		</tr>
		<tr>
			<td width="25%"><br><?php echo $lang['DESCRIPCION']; ?></td>
			<td colspan='3' width="75%">
				<textarea style="resize:none; text-align:left;" style="t" rows="4" disabled name="descripMaq" >
				<?php echo $row['descripMaq']; ?>
				</textarea>
			</td>
		</tr>
		<tr>
			<td><?php echo $lang['DOCUMENTACION']; ?></td>
        	<td><img src="../../Resources/images/PDF.png"></td>
        	<td colspan="2"><input type="file" name="accion" value="Subir"></td>
		</tr>
		<tr>
			<td colspan="4"><input type="submit" name="accion" value="Guardar"></td>
		</tr> 
		<?php } ?>
	</table>
</form>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>