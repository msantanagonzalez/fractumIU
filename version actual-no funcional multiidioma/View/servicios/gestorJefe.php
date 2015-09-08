<?php
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	require '../crearMensaje.php';
?>

<h1 id="headerJefe"><a><i><?php echo $lang['SERVICIOS_BIG']; ?></i></a></h1>
<table class="default">
    <tr>
		<th width="10%"><?php echo $lang['ID_SERVICIO']; ?></th>
    	<th width="10%"><?php echo $lang['ID_MAQUINA']; ?></th>
    	<th width="10%"><?php echo $lang['PERIODICIDAD']; ?></th>
       	<th width="10%"><?php echo $lang['COSTE']; ?></th>
       	<th width="10%"><?php echo $lang['EMPRESA']; ?></th>
        <th width="10%">&nbsp;</th>
        <th width="10%">&nbsp;</th>
    </tr>
</table>

<div style="height:350px;width:auto;overflow-y: scroll;">
	<table class="default">
		<?php
		$resul2 = $_SESSION["listaServicios"];
		if (empty($resul2)) {
		?>
			<div class="alert alert-warning" role="alert">
		<?php echo $lang['INFO_NO_SERV']; ?>
			</div>
		<?php
		}
		else{
			foreach ($resul2 as $row) {
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

<table class="default">
	<tr>
		<td colspan="4"><a href="../../Controller/serviciosController.php?accion=accesoAltaServicio"><input type="submit" name="accion" value="Alta"/></a></td>
	</tr>
</table>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
