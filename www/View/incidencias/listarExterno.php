<?php
	require_once("../structure/header.php");
?>

<h1 id="headerExterno"><a><i><?= i18n("INCIDENCIAS") ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="17%">#ID <?= i18n("Inc.") ?></th>
       	<th width="17%"><?= i18n("Responsable") ?></th>
        <th width="17%"><?= i18n("ID Maquina") ?></th>
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
			<?php if($row['estadoIncid'] == 'Derivada'){ ?>
			<td width="17%">ABIERTA</td> 
			<?php } else { ?>
			<td width="17%">CERRADA</td> 
			<?php } ?>
			<td width="17%"><button><a href="../../Controller/incidenciasController.php?accion=Consulta&idIncidencia=<?php echo $row['idIncid']; ?>">Consultar</a></button></td>
		</tr>
		<?php } ?>
	</table>
</form>

<?php
	require_once("../structure/footer.php");
?>