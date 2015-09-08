<?php
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>

<h1 id="headerJefe"><a><i><?php echo $lang['MAQUINA_BIG']; ?> <?php echo $lang['ID_MAQUINA']; ?></i></a></h1>
<form name='FromAltaMaquina' action='../../Controller/maquinasController.php' method='POST'>
	<table class="default">
		<tr> 
			<td width="25%"><?php echo $lang['ID_MAQUINA']; ?> </td> 
			<td width="25%"><input type="text" class="text"  name="idMaq" value=''/></td>
			<td width="25%"><?php echo $lang['NUMERO_SERIE']; ?> </td> 
			<td width="25%"> <input type="text" class="text" name="nSerie" value=''/></td>
		</tr>
		<tr> 
			<td width="25%"><?php echo $lang['NOMBRE']; ?> </td> 
			<td width="25%"><input type="text" class="text"  name="nomMaq" value=''/></td>
			<td width="25%"><?php echo $lang['COSTE']; ?> </td> 
			<td width="25%"><input type="text" class="text"  name="costeMaq" value=''/></td>
		</tr>
		<tr>
			<td width="25%"><br><?php echo $lang['DESCRIPCION']; ?></td>
			<td colspan='3' width="75%">
				<textarea style="resize:none; text-align:left;" style="t" rows="4" name="descripMaq" >
				<?php echo $lang['DESCRIPCION_MAQUINA']; ?>
				</textarea>
			</td>
		</tr>
		<tr>
			<td><?php echo $lang['DOCUMENTACION']; ?></td>
        	<td><img src="../../Recursos/images/PDF.png"></td>
        	<td colspan="2"><input type="file"  name="documentacionMaquina" value="Subir"></td>
		</tr>
		<tr>
			<td colspan="4"><input type="submit" name="accion" value="Alta"></td>
		</tr> 
	</table>
</form>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>