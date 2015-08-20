<?php
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	require_once $_SESSION['cribPath'].'View/crearMensaje.php';
?>

<h1 id="headerJefe"><a><i><?= i18n("- MÁQUINAS SERVICIOS -") ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="20%"><?= i18n("ID") ?></th>
		<th width="20%"><?= i18n("Nombre:") ?></th>
    	<th width="20%"><?= i18n("Servicio:") ?></th>
       	<th width="20%"><?= i18n("Últ. Incidencia") ?></th>
        <th width="10%">&nbsp;</th>
        <th width="10%">&nbsp;</th>
    </tr>
</table>
	<table class="default">
		<?php
			$rows = $_SESSION['listaMaquina'];
			if (empty($rows)) {
			?>
				<div class="alert alert-warning" role="alert">
				<?= i18n("| INFO |- No hay máquinas para listar") ?>

				</div>
			<?php
			}
			else{
				foreach ($rows as $row) {
			?>
			<form method="POST" action="../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>">

			<tr>
				<td width="20%"  name = "idMaq"><?php echo $row['idMaq']; ?></td>
				<td width="20%" name = "nomMaq"><?php echo $row['nomMaq']; ?></td>
				<td width="20%">Sí</td>
				<td width="20%">13/09/2014</td>
				<td width="10%"><input type="button" value="Consulta" onclick="window.location.href='../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>'"/></td>
				<td width="10%"><input type="button" value="Eliminar" onclick="window.location.href='../../Controller/maquinasController.php?accion=Eliminar&idMaq=<?php echo $row['idMaq'];?>'"/></td>
			</tr>
			<?php
			}
		}
		?>
	</table>
</form>
<table class="default">
	<tr>
		<td colspan="4"><a href="altaJefe.php"><input type="submit" name="Alta" value="Alta M&aacute;quina"/></a></td>
	</tr>
</table>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
