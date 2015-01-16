<?php 
	require_once("../structure/header.php");
?>

<h1 id="headerExterno"><a><i><?= i18n("INCIDENCIA") ?>$#IDincidencia</i></a></h1>
<div style='height:525px;width:auto;overflow-y: scroll;'>
	<form method="POST" action="../../Controller/incidenciasController.php">
		<?php $rows = $_SESSION['consultaIncidencia']; ?>
		<input type="hidden" class="text" name="idIncidencia" value="<?php echo $row['idIncid']; ?>"/>
		<input type="hidden" class="text" name="derivada" value="<?php echo $row['derivada']; ?>"/>
		<table class="default">
			<?php foreach ($rows as $row) { ?>
			<tr> 
				<td width="25%"><?= i18n("Apertura:") ?></td> 
				<td width="25%"><input type="text" class="text" disabled name="dniApertura" value="<?php echo $row['dniApertura']; ?>"/></td> 
				<td width="25%"><?= i18n("Responsable:") ?></td> 
				<td width="25%"><input type="text" class="text" disabled name="dniResponsable" value="<?php echo $row['dniResponsable']; ?>"/></td>
			</tr>
			<tr> 
				<td width="25%"><?= i18n("Fecha Apertura:") ?></td> 
				<td width="25%"><input type="text" class="text" disabled name="fechaApertura" value="<?php echo $row['fAper']; ?>" /></td> 
				<td width="25%"><?= i18n("Fecha Cierre:") ?></td> 
				<td width="25%"><input type="text" class="text" disabled name="fechaCierre" value="<?php echo $row['fCier']; ?>" /></td>
			</tr>
			<tr> 
				<td><?= i18n("Estado:") ?></td>
				<td>
					<select name='estadoIncidencia' disabled>
						<option value='<?php echo $row['estadoIncid']; ?>' selected><?php echo $row['estadoIncid']; ?></option>
					</select> 		
				</td>
				<td><?= i18n("Máquina:") ?></td>
				<td>
					<select name='idMaquina' disabled>
					  	<option value='<?php echo $row['idMaq']; ?>' selected><?php echo $row['idMaq']; ?></option>
					</select> 		
				 </td>
			</tr>
			<tr>
				<td width="25%"><br><?= i18n("Descripción:") ?></td>
				<td colspan='3' width="75%">
					<textarea style="resize:none; text-align:left;" style="t" rows="4" name='descripcion' disabled>
					<?php echo $row['descripIncid'];?>
					</textarea>
				</td>
			</tr>
			<?php } ?>
		</table>
	</form>
	<table>
		<tr>
			<td colspan="4"><a href="../../View/iteraciones/altaExterno.php?idIncidencia=<?php echo $row['idIncid']; ?>"><input type="button" value="Alta"></a></td>
		</tr> 
	</table>
	<h1 id="headerExterno"><a><?= i18n("- ITERACIONES -") ?></a></h1> <!--SECCIÓN-->
	<table class="default"><!--TABLA-->
       	<tr>
			<th width="20%"><?= i18n("ID") ?></th>
        	<th width="20%"><?= i18n("Iteración") ?></th>
            <th width="20%"><?= i18n("Operario") ?></th>
            <th width="20%"><?= i18n("Coste") ?></th>
			<th width="20%"> </th>
     	</tr>
    </table>
   	<table class="default"><!--TABLA-->
		<tr>
			<?php 
				$rows2 = $_SESSION['listaIteraciones'];
				foreach ($rows2 as $row2) {
			?>
			<tr> 
				<td width="20%"><?php echo $row2['idIncid'];?></td>  
				<td width="20%"><?php echo $row2['nIteracion']; ?></td>
				<td width="20%"><?php echo $row2['dniUsu']; ?></td>
				<td width="20%"><?php echo $row2['costeIter']; ?></td>
				<td width="10%"><img src="../../Recursos/images/PDF.png"></td>
				<td width="10%"><button><a href="../../Controller/iteracionesController.php?accion=Consulta&idIncid=<?php echo $row2['idIncid'] ?>&nIteracion=<?php echo $row2['nIteracion'] ?>">Consultar</a></button></td>
			</tr>
			<?php } ?>
     	</tr>
   	</table>
</div>

<?php
	require_once("../structure/footer.php");
?>