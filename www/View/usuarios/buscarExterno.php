<?php
	$userType	=	"jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	require_once $_SESSION['cribPath'].'View/crearMensaje.php';
	//---- Meter esto en todas las vistas ----
	require_once $_SESSION['cribPath'].'Controller/generalController.php';
	checkIfLogged();
	// ----------------------------------------

?>
<div style='height:525px;width:auto;overflow-y: scroll;'>

	<!-- SUBGRUPO DE INCIDENCIAS -->
	<h1 id="headerExterno"><a><i><?= i18n("INCIDENCIAS") ?></i></a></h1>
	<table class="default">
	    <tr>
	    	<th width="17%">#ID <?= i18n("Inc.") ?></th>
	       	<th width="17%"><?= i18n("Problema") ?></th>
	        <th width="17%"><?= i18n("Últ. operario") ?> </th>
	    	<th width="17%"><?= i18n("Fecha") ?></th>
	        <th width="17%"><?= i18n("Estado") ?></th>
	        <th width="17%">&nbsp;</th>
	    </tr>
	</table>

	<form method="POST" action="../../Controller/incidenciasController.php">
		<table class="default">
		<?php
			if(isset($_SESSION['busquedaIncidencia']))
				$rows = $_SESSION['busquedaIncidencia'];
			if (empty($rows)) {
			?>
				<div class="alert alert-warning" role="alert">
					<?= i18n("| INFO |- Ningún resultado en incidencias.") ?>
				</div>
				<?php
			}else{
				foreach ($rows as $row) {
				?>
					<tr>
						<td width="17%"><?php echo $row['idIncid'];?></td>
						<td width="17%">Avería alternador</td>
						<td width="17%">Fulanito</a></td> <!-- Falta linkar al perfil del usuario. -->
						<td width="17%"><?php echo $row['fAper']; ?></td>
						<td width="17%"><?php echo $row['estadoIncid']; ?></td>
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

	<!-- SUBGRUPO DE MAQUINAS -->
	<h1 id="headerExterno"><a><i><?= i18n("MÁQUINAS INCIDENCIAS") ?></i></a></h1>
	<table class="default">
	  <tr>
	    <th width="20%">#ID <?= i18n("Máquina") ?></th>
	  	<th width="20%"><?= i18n("Servicio") ?></th>
	   	<th width="20%"><?= i18n("Últ. Incidencia") ?></th>
	    <th width="10%">&nbsp;</th>
	    <th width="10%">&nbsp;</th>
	  </tr>
	</table>
	<form method="POST" action="../../Controller/maquinasController.php">
		<table class="default">
		<?php
			if(isset($_SESSION['busquedaMaquina']))
				$rows = $_SESSION['busquedaMaquina'];
			if (empty($rows)) {
			?>
				<div class="alert alert-warning" role="alert">
					<?= i18n("| INFO |- Ningún resultado en máquinas.") ?>
				</div>
				<?php
				}else{
					foreach ($rows as $row) {
					?>
						<tr>
							<td width="20%"  name = "idMaq"><?php echo $row['idMaq']; ?></td>
							<td width="20%"><?= i18n("Si") ?></td>
							<td width="20%">13/09/2014</td>
							<td width="10%">
								<input type="button"  value="Consulta" onclick="window.location.href='../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>'"/>
							</td>
							<td width="10%">
								<input type="button" value="Eliminar" onclick="window.location.href='../../Controller/maquinasController.php?accion=Eliminar&idMaq=<?php echo $row['idMaq'];?>'">
							</td>
						</tr>
					<?php
					}
				}
			?>
		</table>
	</form>

</div>
	<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
	?>
