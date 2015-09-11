<?php
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>

<h1 id="headerExterno"><a><i><?= i18n("INCIDENCIAS") ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="17%">#ID <?= i18n("Inc.") ?></th>
       	<th width="17%"><?= i18n("Responsable") ?></th>
        <th width="17%"><?= i18n("ID Máquina") ?></th>
    	<th width="17%"><?= i18n("Apertura:") ?></th>
        <th width="17%"><?= i18n("Estado:") ?></th>
        <th width="17%">&nbsp;</th>
    </tr>
</table>
<form method="POST" action="../../Controller/incidenciasController.php">
	<table class="default">
		<?php
			$rows = $_SESSION['listaIncidencia1'];
			foreach ($rows as $row) {
		?>
		<tr>
			<td width="17%"><?php echo $row['idIncid'];?></td>
			<td width="17%"><?php echo $row['dniResponsable'];?></td>
			<td width="17%"><?php echo $row['idMaq'];?></td>
			<td width="17%"><?php echo $row['fAper']; ?></td>
			<?php if ($row['estadoIncid'] == "Derivada") { ?>
          		<td width="17%">Abierta</td>
          <?php } else if($row['estadoIncid'] == "En Curso Externo") { ?>
	          	<td width="17%">En Curso</td>
          <?php } else { ?>
              <td width="17%">Realizada</td>
          <?php } ?> 
			<td width="10%">
 				<input type="button"  value="Consulta" onclick="window.location.href='../../Controller/incidenciasController.php?accion=Consulta&idIncidencia=<?php echo $row['idIncid']; ?>'"/>
 		 	</td>
		</tr>
		<?php } ?>
	</table>
</form>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
