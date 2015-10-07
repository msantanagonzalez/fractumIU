<?php
    include_once '../../Controller/common.php';
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	require_once $_SESSION['cribPath'].'View/crearMensaje.php';

	$rows = $_SESSION['consultaMaquina'];
	 foreach ($rows as $row) {
?>

<h1 id="headerJefe"><a><i><?php echo $lang['MAQUINA_BIG']; ?><?php echo $row['idMaq']; ?></i></a></h1>

	<form method="POST" action="../../Controller/maquinasController.php?idMaq=<?php echo $row['idMaq'];?>">
	<table class="default">

		<tr>
			<td width="25%"><?php echo $lang['ID_MAQUINA']; ?></td>
			<td width="25%"><input type="text" class="text" disabled name="idMaq"  value="<?php echo $row['idMaq']; ?>"/></td>
			<td width="25%"><?php echo $lang['NUMERO_DE_SERIE']; ?></td>
			<td width="25%"> <input type="text" class="text" disabled name="nSerie"  value="<?php echo $row['nSerie']; ?>"/></td>
		</tr>
		<tr>
			<td width="25%"><?php echo $lang['NOMBRE']; ?></td>
			<td width="25%"><input type="text" class="text" disabled name="nomMaq"  value="<?php echo $row['nomMaq']; ?>"/></td>
			<td width="25%"><?php echo $lang['COSTE']; ?></td>
			<td width="25%"><input type="text" class="text" disabled name="costeMaq"  value="<?php echo $row['costeMaq']; ?>"/></td>

		</tr>
		<tr>
			<td width="25%"><br><?php echo $lang['DESCRIPCION']; ?></td>
			<td colspan='3' width="75%">
				<textarea style="resize:none; text-align:left;" style="t" rows="4" name='descripMaq' disabled><?php echo $row['descripMaq']; ?></textarea>
			</td>
		</tr>
		<?php
		$rows = $_SESSION['documentoMaquina'];
		if (empty($rows)) {
			?>
			<tr>
				<td colspan="4"><?php echo $lang['DOCUMENTACION']; ?>
				<div class="alert alert-info" role="alert">
			<?php echo $lang['INFO_NO_DOC_MAQUINA']; ?>
				</div>
				</td>
			</tr>
			<tr>
			<td colspan="4"><button type="submit" name="accion" value="Modificar">Modificar</button></td>
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
					<br>
					<?php echo $documento['nDocMaq'];?>
					</a>
					</td>
				</tr>
				<tr>
					<td colspan="4"><button type="submit" name="accion" value="Modificar">Modificar</button></td>
				</tr>
				<?php
				}
			}
		} ?>
		</table>
</form>
<h1 id="headerJefe"><a><i><?php echo $lang['INCIDENCIAS_RELATIVAS']; ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="20%">#ID <?php echo $lang['INC']; ?></th>
    	<th width="20%"><?php echo $lang['RESPONSABLE']; ?></th>
       	<th width="20%"><?php echo $lang['OPERARIO']; ?></th>
        <th width="20%"><?php echo $lang['ESTADO']; ?></th>
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
			<td width="20%">
				<button type="button" onclick="window.location.href='../../Controller/incidenciasController.php?accion=Consulta&idIncidencia=<?php echo $row2['idIncid'];?>'">Consultar</button>
			</td>
		</tr>
		<?php } ?>
	</table>
</form>

<h1 id="headerJefe"><a><i><?php echo $lang['SERVICIOS_ASOCIADOS']; ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="25%"><?php echo $lang['ID_SERVICIO']; ?></th>
    	<th width="25%"><?php echo $lang['PERIODICIDAD']; ?></th>
       	<th width="25%"><?php echo $lang['COSTE']; ?></th>
        <th width="25%">&nbsp;</th>
    </tr>
</table>
<form method="POST" action="../../Controller/maquinasController.php">
	<table class="default">
		<?php
			$rows2 = $_SESSION['consultaServicioMaquina'];
	 		foreach ($rows2 as $row2) {
		?>
		<tr>
			<td width="25%"><?php echo $row2[0]; ?></td>
			<td width="25%"><?php echo $row2[1]; ?></td>
			<td width="25%"><?php echo $row2[2]; ?></td>
			<td width="25%">
				<button type="button" onclick="window.location.href='../../Controller/serviciosController.php?accion=Consulta&idServ=<?php echo $row2[0];?>'">Consultar</button>
			</td>
		</tr>
		<?php } ?>
	</table>
</form>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
