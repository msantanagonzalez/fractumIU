<?php
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	
?>
<h1 id="headerExterno"><a><i><?= i18n("INCIDENCIAS PENDIENTES") ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="20%">#ID <?= i18n("Inc.") ?></th>
       	<th width="20%"><?= i18n("Responsable:") ?></th>
    	<th width="20%"><?= i18n("Apertura") ?></th>
        <th width="20%"><?= i18n("Estado") ?></th>
        <th width="20%">&nbsp;</th>
    </tr>
</table>
<form method="POST" action="../../Controller/incidenciasController.php">
	<table class="default">
		<?php
			$rows = $_SESSION['pendientesExterno'];
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
				<td width="20%"><?php echo $row['idIncid'];?></td>
				<td width="20%"><?php echo $row['dniResponsable'];?></td>
				<td width="20%"><?php echo $row['fAper']; ?></td>
				<td width="20%"><?php echo $row['estadoIncid']; ?></td>
				<td width="20%">
				<input type="button" value="Consulta" onclick="window.location.href='../../Controller/incidenciasController.php?accion=Consulta&idIncidencia=<?php echo $row['idIncid']; ?>'"/>
				</td>
			</tr>
			<?php
			}
		}
		?>
	</table>
</form>
<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>