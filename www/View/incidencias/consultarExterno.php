<?php
	require_once $_SESSION['cribPath'].'View/structure/header.php';

$rows = $_SESSION['consultaIncidencia'];
foreach ($rows as $row) { ?>
<h1 id="headerExterno"><a><i><?= i18n("INCIDENCIA") ?> <?php echo $row['idIncid']; ?></i></a></h1>
<div style='height:525px;width:auto;overflow-y: scroll;'>
	<form method="POST" action="../../Controller/incidenciasController.php">
		<input type="hidden" class="text" name="idIncidencia" value="<?php echo $row['idIncid']; ?>"/>
		<input type="hidden" class="text" name="derivada" value="<?php echo $row['derivada']; ?>"/>
		<table class="default">
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
					<?php if ($row['estadoIncid'] == "Derivada") { ?>
			          		<option>Abierta</option>
			          <?php } else if($row['estadoIncid'] == "En Curso Externo") { ?>
				          	<option>En Curso</option>
			          <?php } else { ?>
			              <option>Realizada</option>
			          <?php } ?>

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
					<textarea style="resize:none; text-align:left;" style="t" rows="4" name='descripcion' disabled><?php echo $row['descripIncid'];?></textarea>
				</td>
			</tr>
			<?php } ?>
		</table>
	</form>
	<?php $rows2 = $_SESSION['listaIteraciones'];
	if (!empty($rows2)) { ?>
	<h1 id="headerExterno"><a><?= i18n("- ITERACIONES -") ?></a></h1> <!--SECCIÓN-->
	<table class="default"><!--TABLA-->
    <tr>
      <th width="20%"><?= i18n("Iteración") ?></th>
      <th width="20%"><?= i18n("Operario") ?></th>
      <th width="20%"><?= i18n("Estado") ?></th>
			<th width="20%"><?= i18n("Documentación") ?></th>
			<th width="20%"> </th>
     	</tr>
    </table>
   	<table class="default"><!--TABLA-->
		<tr>
			<?php
				$iteracionesAcabadas = 1;
				foreach ($rows2 as $row2) {
			?>
			<tr>
				<td width="20%"><?php echo $row2['nIteracion']; ?></td>
				<td width="20%"><?php echo $row2['dniUsu']; ?></td>
				<td width="20%"><?php if($row2['estadoItera']==1){echo 'Abierta' ;}else{ echo 'Cerrada';}  ?></td>
				<td width="20%">
				 <?php if(isset($row2['urlDocItr'])){ ?>
					<a href="../<?php echo $row2['urlDocItr'];?>" target="_blank">
						<img src="../../Resources/images/PDF.png">
					</a>
				 <?php } else echo "-" ?>
				</td>
				<td colspan="4"><a href="../../Controller/iteracionesController.php?accion=consultaIteracion&idIncid=<?php echo $row2['idIncid'] ?>&nIteracion=<?php echo $row2['nIteracion'] ?>"><input type="button" value="Consulta"></a></td>
			</tr>
			<?php } ?>
     	</tr>
   	</table>
<table>
<?php } ?>
	<?php $cif = $_SESSION["cifEmpr"];
		if ($row['cifEmpr'] == $cif) { ?>
			<tr>
			<?php if ($row['estadoIncid'] == "Derivada") { ?>
			<td colspan="2"></td>
				<td colspan="50"><a href="../../Controller/iteracionesController.php?accion=NEXTID&idIncid=<?php echo $row['idIncid'] ?>&idMaq=<?php echo $row['idMaq'] ?>"><input type="button" value="NUEVA ITERACION"></a></td>
			</tr>
			<?php  } elseif ($row['estadoIncid'] == "En Curso Externo" && $iteracionesAcabadas == 1) { ?>
				<td colspan="2"></td>
				<td colspan="50"><a href="../../Controller/incidenciasController.php?accion=Modificar&idIncidencia=<?php echo $row['idIncid'] ?>"><input type="button" value="MODIFICAR"></a></td>
			</tr>
			<?php } ?>
		<?php } ?>
	</table>
</div>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
