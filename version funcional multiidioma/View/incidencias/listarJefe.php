<?php
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	require_once $_SESSION['cribPath'].'View/crearMensaje.php';
?>

<h1 id="headerJefe"><a><i><?php echo $lang['INCIDENCIAS_BIG']; ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="20%">#ID <?php echo $lang['INC']; ?></th>
       	<th width="20%"><?php echo $lang['RESPONSABLE']; ?></th>
    	<th width="20%"><?php echo $lang['APERTURA']; ?></th>
        <th width="20%"><?php echo $lang['ESTADO']; ?></th>
        <th width="20%">&nbsp;</th>
    </tr>
</table>
<form method="POST" action="../../Controller/incidenciasController.php">
	<table class="default">
		<?php
			$rows = $_SESSION['listaIncidencia'];
			if (empty($rows)) {
			?>
				<div class="alert alert-warning" role="alert">
				<?php echo $lang['INFO_NO_INCID']; ?>
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
<table>
	<tr>
		<th width="20%"></th>
		<th width="40%"><a href="altaJefe.php"><input type="submit" name="alta" value="Alta"></a></th>
		<th width="20%"></th>
	</tr>
</table>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
