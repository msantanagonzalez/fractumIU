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
	<h1 id="headerJefe"><a><i><?php echo $lang['INCIDENCIAS_BIG']; ?></i></a></h1>
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
							<button type="button" onclick="window.location.href='../../Controller/incidenciasController.php?accion=Consulta&idIncidencia=<?php echo $row['idIncid']; ?>'"><?php echo $lang['CONSULTAR']; ?></button>
						</td>
					</tr>
					<?php
				}
			}
			?>
		</table>
	</form>

	<!-- SUBGRUPO DE OPERARIOS INTERNOS -->
	<h1 id="headerJefe"><a><i><?php echo $lang['OPERARIOS_INTERNOS_BIG']; ?></i></a></h1>
	<table class="default">
		<tr>
			<th width="20%">#ID <?php echo $lang['INT']; ?></th>
			<th width="20%"><?php echo $lang['NOMBRE_APELLIDOS']; ?></th>
			<th width="20%"><?php echo $lang['TELEFONO']; ?></th>
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
		<?php echo $lang['INFO_NO_OP_INTERNO']; ?>
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
					<td width="20%"><button type="button" onclick="window.location.href='../../Controller/usuariosController.php?accion=consultar&dniUsu=<?php echo $row['dniUsu'];?>'"><?php echo $lang['CONSULTAR']; ?></button></td>
					<td width="20%"><button type="button" onclick="window.location.href='../../Controller/usuariosController.php?accion=eliminar&dniUsu=<?php echo $row['dniUsu'];?>'"><?php echo $lang['ELIMINAR']; ?></button></td>
				</tr>
			<?php
			}
		}
		?>
	</table>

	<!-- SUBGRUPO DE OPERARIOS EXTERNOS -->
	<h1 id="headerJefe"><a><i><?php echo $lang['OPERARIOS_EXTERNOS_BIG']; ?></i></a></h1>
	<table class="default">
		<tr>
			<th width="5%">#ID<?php echo $lang['INT']; ?>Ext.</th>
			<th width="4%"><?php echo $lang['NOMBRE_APELLIDOS']; ?></th>
			<th width="4%"><?php echo $lang['TELEFONO']; ?>/th>
			<th width="5%"><?php echo $lang['EMPRESA']; ?></th>
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
			<?php echo $lang['INFO_NO_OP_EXTERNO']; ?>
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
					<td width="7%"><button type="button" onclick="window.location.href='../../Controller/usuariosController.php?accion=consultar&dniUsu=<?php echo $row['dniUsu'];?>'"><?php echo $lang['CONSULTAR']; ?></button></td>
					<td width="7%"><button type="button" onclick="window.location.href='../../Controller/usuariosController.php?accion=eliminar&dniUsu=<?php echo $row['dniUsu'];?>'"><?php echo $lang['ELIMINAR']; ?></button></td>
				</tr>
				<?php
			}
		}
	?>
	</table>

	<!-- SUBGRUPO DE MAQUINAS -->
	<h1 id="headerJefe"><a><i><?php echo $lang['MAQUINAS_BIG']; ?></i></a></h1>
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
								<button type="button" onclick="window.location.href='../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>'"><?php echo $lang['CONSULTAR']; ?></button>
							</td>
							<td width="10%">
								<button type="button" onclick="window.location.href='../../Controller/maquinasController.php?accion=Eliminar&idMaq=<?php echo $row['idMaq'];?>'"><?php echo $lang['ELIMINAR']; ?></button>
							</td>
						</tr>
					<?php
					}
				}
			?>
		</table>
	</form>

	<!-- SUBGRUPO DE SERVICIOS -->
	<h1 id="headerJefe"><a><i><?php echo $lang['SERVICIOS_BIG']; ?></i></a></h1>
	<table class="default">
	  <tr>
			<th width="2%"><?php echo $lang['ID_SERVICIO']; ?></th>
	    <th width="2%"><?php echo $lang['ID_MAQUINA']; ?></th>
	  	<th width="2%"><?php echo $lang['PERIODICIDAD']; ?></th>
	   	<th width="2%"><?php echo $lang['COSTE']; ?></th>
	   	<th width="2%"><?php echo $lang['EMPRESA']; ?></th>
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
				<?php echo $lang['INFO_NO_SERV']; ?>
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
