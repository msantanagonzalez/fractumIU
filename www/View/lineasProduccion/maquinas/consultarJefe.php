<?php
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	
	$rows = $_SESSION['consultaMaquina']; 
	 foreach ($rows as $row) { 
?>

<h1 id="headerJefe"><a><i>M&Aacute;QUINA <?php echo $row['idMaq']; ?></i></a></h1>
	
	<form method="POST" action="../../Controller/maquinasController" >
	<table class="default">
	
		<tr> 			
			<td width="25%">#ID M&aacute;quina: </td> 
			<td width="25%"><input type="text" class="text" disabled name="idMaq"  value="<?php echo $row['idMaq']; ?>"/></td> 
			<td width="25%">#N&uacute;m. serie: </td> 
			<td width="25%"> <input type="text" class="text" disabled name="nSerie"  value="<?php echo $row['nSerie']; ?>"/></td>
		</tr>
		<tr> 
			<td width="25%">Nombre: </td> 
			<td width="25%"><input type="text" class="text" disabled name="nomMaq"  value="<?php echo $row['nomMaq']; ?>"/></td> 
			<td width="25%">Coste:</td> 
			<td width="25%"><input type="text" class="text" disabled name="costeMaq"  value="<?php echo $row['costeMaq']; ?>"/></td> 
			
		</tr>
		<tr>
			<td width="25%"><br>Descripci&oacute;n:</td>
			<td colspan='3' width="75%">
				<textarea style="resize:none; text-align:left;" style="t" rows="4" name='descripMaq' disabled>
				<?php echo $row['descripMaq']; ?>
				</textarea>
			</td>
		</tr>
		<tr>
			<td>Documentacion:</td>
        	<td><img src="../../Recursos/images/PDF.png"></td>
        	<td colspan="2"><input type="file" disabled name="accion" value="Subir"></td>
		</tr>
		<tr>
			<td colspan="4"><input  type="submit" name="accion" value="Modificar"></td>
		</tr>
		<?php } ?>
		</table>
</form>
<h1 id="headerJefe"><a><i>INCIDENCIAS RELATIVAS</i></a></h1>
<form method="POST" action="../../Controller/maquinasController.php">
	<table class="default">
		<tr> 
			<td width="20%">ID001</td> 
			<td width="20%"><a href="../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>" ></a></td> 
			<td width="20%">Usuario3</td> 
			<td width="20%">Abierta</td>
			<td width="15%"><a href="../../Controller/maquinasController.php?accion=Consulta&idMaq&idIncid=<?php echo $row['idIncid']; echo $row['idMaq']?>"></a></td>
			<td width="5%"><a href="../../Controller/incidenciasController.php?accion=Consulta&idIncid=<?php echo $row['idIncid'];?>">Consultar</a></td>
		</tr>
	</table>
</form>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>