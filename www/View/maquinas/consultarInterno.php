<?php
	$userType="interno";
	require_once("../structure/header.php");
	
	$rows = $_SESSION['consultaMaquina']; 
	foreach ($rows as $row) { 
?>

<h1 id='headerInterno'><a><?= i18n("MÁQUINA ") ?><?php echo $row['nomMaq']; ?></a></h1> <!--SECCIÓN-->
<!--INICIO TABLA-->
<br>
<form method='post' action='../../Controller/maquinasController.php?idMaq=<?php echo $row['idMaq'];?>' >
	
	<div style='height:350px;width:auto;overflow-y: scroll;'>
		<table class='default'>
		
			<tr>
				<td>#ID <?= i18n("Máquina:") ?></td>
				<td><input type='text' class="text"  disabled  name='idMaq' value='<?php echo $row['idMaq']; ?>' /></td>
				<td>#N&uacute;m. <?= i18n("serie:") ?></td>
				<td><input type='text' class="text"  disabled  name='nSerie' value='<?php echo $row['nSerie']; ?>' /></td>
			</tr>
			<tr>
				<td colspan='4'><?= i18n("Descripción:") ?></td>
			</tr>
			<tr>	
		        <td colspan='4'>
					<textarea style="resize:none" rows="4" name='descripcionApertura' disabled>
					<?php echo $row['descripMaq']; ?>
					</textarea>
				</td>
		    </tr>
			<tr>
				<td><?= i18n("Documentación:") ?></td>
		        <td><img src="../../Recursos/images/PDF.png"></td>
		        <td colspan="2"><a href="../incidencias/altaInterno.php?maq=<?php echo $row['nomMaq']; ?>"><input type='button' value='Alta Incidencia'></a></td>
			</tr>
			<?php } ?>
		</table>
 	</div>
	<br>
</form>
<h1 id="headerInterno"><a><i><?= i18n("INCIDENCIAS RELATIVAS") ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="20%">#ID <?= i18n("Inc.") ?></th>
    	<th width="20%"><?= i18n("Responsable:") ?></th>
       	<th width="20%"><?= i18n("Operario:") ?></th>
        <th width="20%"><?= i18n("Estado:") ?></th>
        <th width="20%">&nbsp;</th>
    </tr>
</table>
<form method="POST" action="../../Controller/maquinasController.php">
	<table class="default">
		<?php
			$rows2 = $_SESSION['consultaIncidenciaMaquina'];
	 		foreach ($rows2 as $row2) { 
		?>
		<tr> 
			<td width="20%"><?php echo $row2['idIncid']; ?></td> 
			<td width="20%"><?php echo $row2['dniResponsable']; ?></td> 
			<td width="20%"><?php echo $row2['dniApertura']; ?></td>
			<td width="20%"><?php echo $row2['estadoIncid']; ?></td>
			<td width="20%"><a href="../../Controller/incidenciasController.php?accion=Consulta&idIncidencia=<?php echo $row2['idIncid'];?>">Consultar</a></td>
		</tr>
		<?php } ?>
	</table>
</form>
<?php
	require_once("../structure/footer.php");
?>
