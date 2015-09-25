<?php
    include_once '../../Controller/common.php';
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
	<h1 id="headerInterno"><a><i><?php echo $lang['INCIDENCIAS_BIG']; ?></i></a></h1>
	<table class="default">
	    <tr>
	    	<th width="15%">#ID <?php echo $lang['INC']; ?></th>
	       	<th width="15%"><?php echo $lang['PROBLEMA']; ?></th>
	        <th width="15%"><?php echo $lang['ULTIMO_OPERARIO']; ?> </th>
	    	<th width="13%"><?php echo $lang['FECHA']; ?></th>
	        <th width="17%"><?php echo $lang['ESTADO']; ?></th>
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
					<?php echo $lang['INFO_NO_INCID']; ?>
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

	<!-- SUBGRUPO DE MAQUINAS -->
	<h1 id="headerInterno"><a><i><?php echo $lang['MAQUINAS']; ?></i></a></h1>
	<table class="default">
	  <tr>
	    <th width="12%"><?php echo $lang['ID_MAQUINA']; ?></th>
	  	<th width="9%"><?php echo $lang['SERVICIO']; ?></th>
	   	<th width="12%"><?php echo $lang['ULT_INCID']; ?></th>
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
					<?php echo $lang['INFO_NO_MAQ']; ?>
				</div>
				<?php
				}else{
					foreach ($rows as $row) {
					?>
						<tr>
							<td width="20%"  name = "idMaq"><?php echo $row['idMaq']; ?></td>
							<td width="20%"><?php echo $lang['SI']; ?></td>
							<!-- FALTA MARCAR LA FECHA DE LA ULTIMA INCIDENCIA DE LA MAQUINA-->
							<td width="20%"><?php echo $lang['FECHA_EXAMPLE']; ?></td>
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
