<?php
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>

<h1 id="headerExterno"><a><i><?php echo $lang['INCIDENCIAS_BIG']; ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="17%">#ID <?php echo $lang['INC']; ?></th>
       	<th width="17%"><?php echo $lang['RESPONSABLE']; ?></th>
        <th width="17%"><?php echo $lang['ID_MAQUINA']; ?></th>
    	<th width="17%"><?php echo $lang['APERTURA']; ?></th>
        <th width="17%"><?php echo $lang['ESTADO']; ?></th>
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
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
