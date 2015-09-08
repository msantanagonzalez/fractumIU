<?php
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	
	$rows = $_SESSION['consultaMaquina']; 
	
	foreach ($rows as $row) { 
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerJefe"><a><i><?php echo $lang['MAQUINA_BIG']; ?><?php echo $row['idMaq']; ?></i></a></h1>

<form method="POST" onsubmit="return modificarMaquina()" action="../../Controller/maquinasController.php" enctype="multipart/form-data">
	
	
		<input type="hidden" class="text"  name="idMaq" value="<?php echo $row['idMaq']; ?>"/>
		<input type="hidden" class="text"  name="nSerie" value="<?php echo $row['nSerie']; ?>"/>
		<input type="hidden" class="text" name="descripMaq" value="<?php echo $row['descripMaq']; ?>"/>
		<input type="hidden" class="text" name="nomMaq" value="<?php echo $row['nomMaq']; ?>"/>		
		<input type="hidden" class="text"  name="costeMaq" value="<?php echo $row['costeMaq']; ?>"/>		
		
		
	<table class="default">
		<tr> 
			<td width="25%"><?php echo $lang['ID_MAQUINA']; ?></td> 
			<td width="25%"><input type="text" class="text" disabled name="idMaq" value="<?php echo $row['idMaq']; ?>"/></td> 
			<td width="25%"><?php echo $lang['NUMERO_DE_SERIE']; ?></td> 
			<td width="25%"> <input id="numSerie" type="text" class="text"  name="nSerie" value="<?php echo $row['nSerie']; ?>"/></td>
		</tr>
		<tr> 
			<td width="25%"><?php echo $lang['NOMBRE']; ?></td> 
			<td width="25%"><input id="nomMaq" type="text" class="text" name="nomMaq" value="<?php echo $row['nomMaq']; ?>"/></td> 
			<td width="25%"><?php echo $lang['COSTE']; ?></td> 
			<td width="25%"><input id="coste" type="text" class="text"  name="costeMaq" value="<?php echo $row['costeMaq']; ?>"/></td> 
			<td width="25%"></td>
		</tr>
		<tr>
			<td width="25%"><br><?php echo $lang['DESCRIPCION']; ?></td>
			<td colspan='3' width="75%">
				<textarea id="des" style="resize:none; text-align:left;" style="t" rows="4"  name="descripMaq" >
				<?php echo $row['descripMaq']; ?>
				</textarea>
			</td>
		</tr>
		<?php 
		$rows = $_SESSION['documentoMaquina']; 
		if (empty($rows)) {
			?>
			<tr>
				<td><?php echo $lang['DOCUMENTACION']; ?></td>
				<td><img src="../../Resources/images/PDF.png"></td>
				<td colspan="2"><input type="file" name="docMaquina" id="docMaquina"></td>
			</tr>			
			<tr>
			<td colspan="4"><input  type="submit" name="accion" value="Guardar"></td>
			</tr>
			<?php
			}else{
				foreach ($rows as $documento) {
				?>
				<tr>
					<td colspan="2"><?php echo $lang['DOCUMENTACION']; ?></td>
					<td colspan="2">
					<a href="../<?php echo $documento['urlDocMaq'];?>" target="_blank">
					<img src="../../Resources/images/PDF.png">
					</a>
					<br>
					<a href="../../Controller/maquinasController.php?accion=eliminarDocumento&idMaq=<?php echo $documento['idMaq'];?>&path=<?php echo $documento['urlDocMaq'];?>">
					<?php echo "Eliminar";?>
					</a>
					</td>
				</tr>
				<tr>
					<td colspan="4"><input  type="submit" name="accion" value="Guardar"></td>
				</tr>
				<?php 
				}
			}
		} ?>
		</table>
</form>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>