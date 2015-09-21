<?php
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	require_once $_SESSION['cribPath'].'View/messages/messages_ga.php';
?>

<h1 id="headerInterno"><a><i><?= i18n("INCIDENCIAS") ?></i></a></h1>
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
			$rows = $_SESSION['listaIncidenciasI'];
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
				<td width="17%"><?php if($row['derivada'] == "0") echo "-"; else echo $row['cifEmpr']; ?></td> 
				<td width="17%"><a href="../../Controller/incidenciasController.php?accion=Consulta&idIncidencia=<?php echo $row['idIncid']; ?>"><input type="button" name="accion" value="Consulta"></input></a></td>
			</tr>
			<?php } 
			}
			?>
	</table>
</form>
<table>
	<tr>
		<th width="20%"></th>
		<th width="40%"><a href="altaInterno.php"><input type="button" name="alta" value="Alta"></a></th>
		<th width="20%"></th>
	</tr>
</table>
<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>