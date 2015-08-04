<?php
	require_once("../structure/header.php");
	require '../crearMensaje.php';
?>

<h1 id="headerJefe"><a><i><?= i18n("INCIDENCIAS") ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="17%">#ID <?= i18n("Inc.") ?></th>
       	<th width="17%"><?= i18n("Últ. operario") ?></th>
        <th width="17%"><?= i18n("Últ. iteración") ?></th>
    	<th width="17%"><?= i18n("Apertura:") ?></th>
        <th width="17%"><?= i18n("Estado:") ?></th>
        <th width="17%">&nbsp;</th>
    </tr>
</table>
<form method="POST" action="../../Controller/incidenciasController.php">
	<table class="default">
		<?php 
			$rows = $_SESSION['listaIncidencia'];
			if (empty($rows)) {
			?>
				<div class="alert alert-info" role="alert">
				<?= i18n("| INFO |- No hay incidencias para listar") ?>
				</div>
			<?php
			}
			else{
				foreach ($rows as $row) {
			?>
			<tr> 
				<td width="17%"><?php echo $row['idIncid'];?></td> 
				<td width="17%"><?= i18n("Avería alternador") ?></td> 
				<td width="17%">Fulanito</a></td> <!-- Falta linkar al perfil del usuario. -->
				<td width="17%"><?php echo $row['fAper']; ?></td>
				<td width="17%"><?php echo $row['estadoIncid']; ?></td>
				<td width="17%"><input type="button" value="Consulta" onclick="window.location.href='../../Controller/incidenciasController.php?accion=Consulta&idIncidencia=<?php echo $row['idIncid']; ?>'"/></td>
			</tr>
			<?php
			} 
		}
		?>
	</table>
</form>

<?php
	require_once("../structure/footer.php");
?>