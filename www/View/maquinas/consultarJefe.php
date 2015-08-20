<?php
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	require_once $_SESSION['cribPath'].'View/crearMensaje.php';

	$rows = $_SESSION['consultaMaquina'];
	 foreach ($rows as $row) {
?>

<h1 id="headerJefe"><a><i><?= i18n("MÁQUINA ") ?><?php echo $row['idMaq']; ?></i></a></h1>

	<form method="POST" action="../../Controller/maquinasController.php?idMaq=<?php echo $row['idMaq'];?>">
	<table class="default">

		<tr>
			<td width="25%">#ID <?= i18n("Máquina:") ?> </td>
			<td width="25%"><input type="text" class="text" disabled name="idMaq"  value="<?php echo $row['idMaq']; ?>"/></td>
			<td width="25%">#N&uacute;m. <?= i18n("serie:") ?></td>
			<td width="25%"> <input type="text" class="text" disabled name="nSerie"  value="<?php echo $row['nSerie']; ?>"/></td>
		</tr>
		<tr>
			<td width="25%"><?= i18n("Nombre:") ?> </td>
			<td width="25%"><input type="text" class="text" disabled name="nomMaq"  value="<?php echo $row['nomMaq']; ?>"/></td>
			<td width="25%"><?= i18n("Coste:") ?></td>
			<td width="25%"><input type="text" class="text" disabled name="costeMaq"  value="<?php echo $row['costeMaq']; ?>"/></td>

		</tr>
		<tr>
			<td width="25%"><br><?= i18n("Descripción:") ?></td>
			<td colspan='3' width="75%">
				<textarea style="resize:none; text-align:left;" style="t" rows="4" name='descripMaq' disabled>
				<?php echo $row['descripMaq']; ?>
				</textarea>
			</td>
		</tr>
		<?php
		$rows = $_SESSION['documentoMaquina'];
		if (empty($rows)) {
			?>
			<tr>
				<td colspan="4"><?= i18n("Documentación:") ?>
				<div class="alert alert-info" role="alert">
				<?= i18n("| INFO |- Maquina sin documento") ?>
				</div>
				</td>
			</tr>
			<tr>
			<td colspan="4"><input  type="submit" name="accion" value="Modificar"></td>
			</tr>
			<?php
			}else{
				foreach ($rows as $documento) {
				?>
				<tr>
					<td colspan="2"><?= i18n("Documentación:") ?></td>
					<td colspan="2">
					<a href="../<?php echo $documento['urlDocMaq'];?>" target="_blank">
					<img src="../../Resources/images/PDF.png">
					<br>
					<?php echo $documento['nDocMaq'];?>
					</a>
					</td>
				</tr>
				<tr>
					<td colspan="4"><input  type="submit" name="accion" value="Modificar"></td>
				</tr>
				<?php
				}
			}
		} ?>
		</table>
</form>
<h1 id="headerJefe"><a><i><?= i18n("INCIDENCIAS RELATIVAS") ?></i></a></h1>
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
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
