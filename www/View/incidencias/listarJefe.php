<?php
	require_once("../structure/header.php");
	require '../crearMensaje.php';
?>

<h1 id="headerJefe"><a><i><?= i18n("INCIDENCIAS") ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="17%">#ID <?= i18n("Inc.") ?></th>
       	<th width="17%"><?= i18n("Responsable:") ?></th>
    	<th width="17%"><?= i18n("Apertura:") ?></th>
        <th width="17%"><?= i18n("Estado:") ?></th>
        <th width="17%"><?= i18n("Derivada") ?></th>
        <th width="17%">&nbsp;</th>
    </tr>
</table>
<form method="POST" action="../../Controller/incidenciasController.php">
	<table class="default">
		<?php 
			$rows = $_SESSION['listaIncidencia'];
			if (empty($rows)) {
			?>
				<div class="alert alert-warning" role="alert">
				<?= i18n("| INFO |- No hay incidencias para listar") ?>
				</div>
			<?php
			}
			else{
			foreach ($rows as $row) {
			?>
			<tr> 
				<td width="17%"><?php echo $row['idIncid'];?></td> 
				<td width="17%"><?php echo $row['dniResponsable'];?></td> 
				<td width="17%"><?php echo $row['fAper']; ?></td>
				<td width="17%"><?php echo $row['estadoIncid']; ?></td>
				<?php if ($row['derivada'] == 0) {?>
				<td width="17%"><?php echo $row['cifEmpr']; ?></td> 
				<?php } else { ?>
				<td width="17%">NO</td> 
				<?php }?>
				<td width="17%">
				<input type="button" value="Consulta" onclick="window.location.href='../../Controller/incidenciasController.php?accion=Consulta&idIncidencia=<?php echo $row['idIncid']; ?>'"/>
				</td>
			</tr>
			<?php 
			} 
		}
		?>
	</table>
</form>
<table>
	<tr>
		<th width="20%"></th>
		<th width="40%"><a href="altaJefe.php"><input type="submit" name="alta" value="Alta"></a></th>
		<th width="20%"></th>
	</tr>
</table>

<?php
	require_once("../structure/footer.php");
?>