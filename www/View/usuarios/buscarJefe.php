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
	<h1 id="headerJefe"><a><i><?= i18n("INCIDENCIAS") ?></i></a></h1>
	<table class="default">
	    <tr>
	    	<th width="15%">#ID <?= i18n("Inc.") ?></th>
	       	<th width="15%"><?= i18n("Problema") ?></th>
	        <th width="15%"><?= i18n("Últ. operario") ?> </th>
	    	<th width="13%"><?= i18n("Fecha") ?></th>
	        <th width="17%"><?= i18n("Estado") ?></th>
	        <th width="17%">&nbsp;</th>
	    </tr>
	</table>
	<!--<div style="height:107px;width:auto;overflow-y: scroll;">-->
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
						<td width="17%"><?php echo $row['descripIncid'];?></td>
						<!-- LINKADO al perfil del usuario. -->
						<td width="17%"><a href='../../Controller/usuariosController.php?accion=consultar&dniUsu=<?php echo $row['dniResponsable'];?>'><?php echo $row['dniResponsable']; ?></a></td>
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

	<!-- SUBGRUPO DE OPERARIOS INTERNOS -->
	<h1 id="headerJefe"><a><i><?= i18n("OPERARIOS INTERNOS") ?></i></a></h1>
	<table class="default">
		<tr>
			<th width="20%">#ID <?= i18n("Int.") ?></th>
			<th width="20%"><?= i18n("Nome/Apelidos") ?></th>
			<th width="20%"><?= i18n("Teléfono:") ?></th>
			<th width="20%">&nbsp;</th>
			<th width="20%">&nbsp;</th>
		</tr>
	</table>
	<table class="default">
		<?php
		if(isset($_SESSION['busquedaInterno']))
			$rows = $_SESSION['busquedaInterno'];
		if (empty($rows)) {
		?>
			<div class="alert alert-warning" role="alert">
			<?= i18n("| INFO |- Ningún resultado en Operarios Internos.") ?>
			</div>
		<?php
		}
		else{
			foreach ($rows as $row){
				?>
				<tr>
					<td width="20%" name = "dni"><?php echo $row['dniUsu']; ?> </td>
					<td width="20%" name = "nombre"><?php echo $row['nomUsu']." ".$row['apellUsu']; ?></td>
					<td width="20%" name = "telefono"><?php echo $row['telefOpeInt']; ?> </td>
					<td width="20%"><input type="button" value="Consulta" onclick="window.location.href='../../Controller/usuariosController.php?accion=consultar&dniUsu=<?php echo $row['dniUsu'];?>'"></td>
					<td width="20%"><input type="button" value="Eliminar" onclick="window.location.href='../../Controller/usuariosController.php?accion=eliminar&dniUsu=<?php echo $row['dniUsu'];?>'"></td>
				</tr>
			<?php
			}
		}
		?>
	</table>

	<!-- SUBGRUPO DE OPERARIOS EXTERNOS -->
	<h1 id="headerJefe"><a><i><?= i18n("OPERARIOS EXTERNOS") ?></i></a></h1>
	<table class="default">
		<tr>
			<th width="5%">#ID <?= i18n("Int.") ?>Ext.</th>
			<th width="4%"><?= i18n("Nome/Apelidos") ?></th>
			<th width="4%"><?= i18n("Teléfono:") ?></th>
			<th width="5%">Empresa</th>
			<th width="10%">&nbsp;</th>
			<th width="10%">&nbsp;</th>
		</tr>
	</table>

	<table class="default">
		<?php
		if(isset($_SESSION['busquedaExterno']))
			$rows = $_SESSION['busquedaExterno'];
		if (empty($rows)) {
		?>
			<div class="alert alert-warning" role="alert">
				<?= i18n("| INFO |- Ningún resultado en Operarios Externos. ") ?>
			</div>
			<?php
		}else{
			foreach ($rows as $row){
			?>
				<tr>
					<td width="20%" name = "dni"><?php echo $row['dniUsu']; ?> </td>
					<td width="20%" name = "nombre"><?php echo $row['nomUsu']." ".$row['apellUsu']; ?></td>
					<td width="20%" name = "telefono"><?php echo $row['telefEmpr']; ?> </td>
					<td width="17%" name = "empresa"><a href='../../Controller/empresasController.php?accion=Consulta&cifEmpr=<?php echo $row['cifEmpr'];?>'><?php echo $row['nomEmpr']; ?></a></td>
					<td width="7%"><input type="button" value="Consulta" onclick="window.location.href='../../Controller/usuariosController.php?accion=consultar&dniUsu=<?php echo $row['dniUsu'];?>'"></td>
					<td width="7%"><input type="button" value="Eliminar" onclick="window.location.href='../../Controller/usuariosController.php?accion=eliminar&dniUsu=<?php echo $row['dniUsu'];?>'"></td>
				</tr>
				<?php
			}
		}
	?>
	</table>

	<!-- SUBGRUPO DE MAQUINAS -->
	<h1 id="headerJefe"><a><i><?= i18n("MÁQUINAS") ?></i></a></h1>
	<table class="default">
	  <tr>
	    <th width="12%">#ID <?= i18n("Máquina") ?></th>
	  	<th width="9%"><?= i18n("Servicio") ?></th>
	   	<th width="12%"><?= i18n("Últ. Incidencia") ?></th>
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
							<!-- FALTA MARCAR LA FECHA DE LA ULTIMA INCIDENCIA DE LA MAQUINA-->
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

	<!-- SUBGRUPO DE SERVICIOS -->
	<h1 id="headerJefe"><a><i><?= i18n("SERVICIOS") ?></i></a></h1>
	<table class="default">
	  <tr>
			<th width="2%">#ID <?= i18n("Servicio:") ?></th>
	    <th width="2%">#ID <?= i18n("Máquina:") ?></th>
	  	<th width="2%"><?= i18n("Periodicidad:") ?></th>
	   	<th width="2%"><?= i18n("Coste:") ?></th>
	   	<th width="2%"><?= i18n("Empresa:") ?></th>
	    <th width="10%">&nbsp;</th>
	    <th width="10%">&nbsp;</th>
	  </tr>
	</table>

	<table class="default">
		<?php
		if(isset($_SESSION['busquedaServicio']))
			$rows = $_SESSION['busquedaServicio'];
		if (empty($rows)) {
		?>
			<div class="alert alert-warning" role="alert">
				<?= i18n("| INFO |- Ningún resultado en Servicios.") ?>
			</div>
		<?php
		}else{
			foreach ($rows as $row) {
			?>
				<form method="POST" action="../../Controller/serviciosController.php">
					<tr>
						<td width="10%"><?php echo $row['idServ'];?></td>
						<td width="10%"><?php echo $row['idMaq'];?></td>
						<td width="10%"><?php echo $row['periodicidad'];?></td>
						<td width="10%"><?php echo $row['costeSer'];?></td>
						<td width="7%"><?php echo $row['cifEmpr'];?></td>
						<td width="5%"><input type="button" value="Consulta" onclick="window.location.href='../../Controller/serviciosController.php?accion=Consulta&idServ=<?php echo $row['idServ']; ?>'"/></td>
						<td width="5%"><input type="button" value="Eliminar" onclick="window.location.href='../../Controller/serviciosController.php?accion=Eliminar&idServ=<?php echo $row['idServ']; ?>'"/></td>
					</tr>
				</form>
				<?php
			}
		}
			?>
	</table>
</div>
	<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
	?>
