<?php
include_once '../../Controller/common.php';
require_once $_SESSION['cribPath'].'View/structure/header.php';
$rows = $_SESSION['consultaIncidencia'];
$hasServicios = $_SESSION['consultaServicios'];
foreach ($rows as $row) { ?>
<h1 id="headerJefe"><a><i><?php echo $lang['INCIDENCIA']; ?> <?php echo $row['idIncid']; ?></i></a></h1>
<div style='height:650px;width:auto;overflow-y: scroll;'>
	<form method="POST" action="../../Controller/incidenciasController.php">

		<input type="hidden" class="text" name="idIncidencia" value="<?php echo $row['idIncid']; ?>"/>
		<input type="hidden" class="text" name="derivada" value="<?php echo $row['derivada']; ?>"/>
		<input type="hidden" class="text" name="cifEmpr" value="<?php echo $row['cifEmpr']; ?>"/>
		<table class="default">

			<tr>
				<td width="25%"><?php echo $lang['APERTURA']; ?> </td>
				<td width="25%"><input type="text" class="text" disabled name="dniApertura" value="<?php echo $row['dniApertura']; ?>"/></td>
				<td width="25%"><?php echo $lang['RESPONSABLE']; ?> </td>
				<td width="25%"><input type="text" class="text" disabled name="dniResponsable" value="<?php echo $row['dniResponsable']; ?>"/></td>
			</tr>
			<tr>
				<td width="25%"><?php echo $lang['FECHA_APERTURA']; ?> </td>
				<td width="25%"><input type="text" class="text" disabled name="fechaApertura" value="<?php echo $row['fAper']; ?>" /></td>
				<?php if( $row['estadoIncid']=='Cerrada') { ?>
				<td width="25%"><?php echo $lang['FECHA_CIERRE']; ?> </td>
				<td width="25%"><input type="text" class="text" disabled name="fechaCierre" value="<?php echo $row['fCier']; ?>" /></td>
				<?php } ?>
			</tr>
			<tr>
				<td><?php echo $lang['ESTADO']; ?></td>
				<td><input type="text" class="text" disabled name="estadoIncidencia" value='<?php echo $row['estadoIncid']; ?>'/></td>
				<td><?php echo $lang['EMPRESA']; ?></td>
				<td><input type="text" class="text" disabled name="cifEmpr" value="<?php if($row['cifEmpr']=='DEFAULT'){echo '-';}else{ echo $row['cifEmpr'];}?>"/><td>
			</tr>
			<tr>
				<td><?php echo $lang['MAQUINA']; ?></td>
			 <td><input type="text" class="text" disabled name="idMaquina" value='<?php echo $row['idMaq']; ?>'/></td>
				<td><?php echo $lang['SERVICIOS']; ?></td>
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
				<td width="25%"><br><?php echo $lang['DESCRIPCION']; ?></td>
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
	<h1 id="headerJefe"><a><i><?php echo $lang['ITERACIONES']; ?></i></a></h1>
	<table class="default">
	    <tr>
	    	<th width="20%"><?php echo $lang['NUMERO_ITERACION']; ?></th>
				<th width="20%"><?php echo $lang['OPERARIO']; ?></th>
				<th width="20%"><?php echo $lang['ESTADO']; ?></th>
				<th width="20%"><?php echo $lang['DOCUMENTACION']; ?></th>
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
				<td width="20%"><?php if($row2['estadoItera']==1){echo 'Abierta' ;}else{ echo 'Cerrada';}  ?></td>
				<td width="20%">
				 <?php if(isset($row2['urlDocItr'])){ ?>
					 <a href="../<?php echo $row2['urlDocItr'];?>" target="_blank">
						<img src="../../Resources/images/PDF.png">
							<?php echo $row2['nDocIter'];?>
						</a>
				 <?php } else echo "-" ?>
				</td>
				<td width="20%">
					<button type="button" onclick="window.location.href='../../Controller/iteracionesController.php?accion=consultaIteracion&idIncid=<?php echo $row2[0] ?>&nIteracion=<?php echo $row2[1] ?>'">Consultar</button>
				</td>
			</tr>
			<?php } ?>
		</table>
	</form>
</div>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
