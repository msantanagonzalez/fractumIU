<?php
require_once $_SESSION['cribPath'].'View/structure/header.php';
$rows = $_SESSION['consultaIncidencia'];
$hasServicios = $_SESSION['consultaServicios'];
foreach ($rows as $row) { ?>
<h1 id="headerJefe"><a><i><?= i18n("INCIDENCIA") ?> <?php echo $row['idIncid']; ?></i></a></h1>
<div style='height:650px;width:auto;overflow-y: scroll;'>
	<form method="POST" action="../../Controller/incidenciasController.php">

		<input type="hidden" class="text" name="idIncidencia" value="<?php echo $row['idIncid']; ?>"/>
		<input type="hidden" class="text" name="derivada" value="<?php echo $row['derivada']; ?>"/>
		<input type="hidden" class="text" name="cifEmpr" value="<?php echo $row['cifEmpr']; ?>"/>
		<table class="default">

			<tr>
				<td width="25%"><?= i18n("Apertura:") ?> </td>
				<td width="25%"><input type="text" class="text" disabled name="dniApertura" value="<?php echo $row['dniApertura']; ?>"/></td>
				<td width="25%"><?= i18n("Responsable:") ?> </td>
				<td width="25%"><input type="text" class="text" disabled name="dniResponsable" value="<?php echo $row['dniResponsable']; ?>"/></td>
			</tr>
			<tr>
				<td width="25%"><?= i18n("Fecha Apertura:") ?> </td>
				<td width="25%"><input type="text" class="text" disabled name="fechaApertura" value="<?php echo $row['fAper']; ?>" /></td>
				<td width="25%"><?= i18n("Fecha Cierre:") ?> </td>
				<td width="25%"><input type="text" class="text" disabled name="fechaCierre" value="<?php echo $row['fCier']; ?>" /></td>
			</tr>
			<tr>
				<td><?= i18n("Estado:") ?></td>
				<td><input type="text" class="text" disabled name="estadoIncidencia" value='<?php echo $row['estadoIncid']; ?>'/></td>
				<td><?= i18n("Empresa:") ?></td>
				<td><input type="text" class="text" disabled name="cifEmpr" value="-"/><td>
			</tr>
			<tr>
				<td><?= i18n("Máquina:") ?></td>
			 <td><input type="text" class="text" disabled name="idMaquina" value='<?php echo $row['idMaq']; ?>'/></td>
				<td><?= i18n("Servicios:") ?></td>
				<td>
					<?php
					if($hasServicios){
						?>
							<input type="checkbox" checked disabled/>
						<?php
					}else{
						?>
							<input type="checkbox" disabled/>
						<?php
					}
					?>
				</td>
			</tr>
			<tr>
				<td width="25%"><br><?= i18n("Descripción:") ?></td>
				<td colspan='3' width="75%">
					<textarea style="resize:none; text-align:left;" style="t" rows="4" name='descripcion' disabled> <?php echo $row['descripIncid'];?> </textarea>
				</td>
			</tr>
			<?php } ?>
		</table>
	</form>
	<table class="default">
		<tr>
		<?php if(($row['estadoIncid'] == 'Programada') || ($row['estadoIncid'] == 'Pendiente Derivar')){ ?>
		<td colspan="4"><a href="../../Controller/incidenciasController.php?accion=Modificar&idIncidencia=<?php echo $row[0]; ?>"><input type="submit" name="Modificar" value="Modificar"></a></td>
		<?php
		}
		?>
		</tr>
	</table>
	<h1 id="headerJefe"><a><i><?= i18n("- ITERACIONES -") ?></i></a></h1>
	<table class="default">
	    <tr>
	    	<th width="20%"><?= i18n("Nº Iteración") ?></th>
			<th width="20%"><?= i18n("Operario") ?></th>
			<th width="20%"><?= i18n("Estado") ?></th>
	        <th width="20%">&nbsp;</th>
	    </tr>
	</table>
	<form method="POST" action="../../Controller/iteracionesController.php">
		<table class="default">
			<?php
				$rows2 = $_SESSION['listaIteraciones'];
				foreach ($rows2 as $row2) {
			?>
			<tr>
				<td width="20%"><?php echo $row2['nIteracion'];?></td>
				<td width="20%"><?php echo $row2['dniUsu']; ?></td>
				<td width="20%"><?php if($row2['nIteracion']=1) echo "Abierta"; else echo "Cerrada" ?></td>
				<td width="20%">
					<input type="button" value="Consulta" onclick="window.location.href='../../Controller/iteracionesController.php?accion=consultaIteracion&idIncid=<?php echo $row2[0] ?>&nIteracion=<?php echo $row2[1] ?>'"/>
				</td>
			</tr>
			<?php } ?>
		</table>
	</form>
</div>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
