<?php
	$userType="externo";
	require_once("../structure/header.php");
	require '../crearMensaje.php';
?>

<h1 id="headerExterno"><a><i><?= i18n("SERVICIOS") ?></i></a></h1>
<table class="default">
    <tr>
		<th width="10%">#ID <?= i18n("Servicio:") ?></th>
    	<th width="10%">#ID <?= i18n("Máquina:") ?></th>
    	<th width="10%"><?= i18n("Periodicidad:") ?></th>
       	<th width="10%"><?= i18n("Coste:") ?></th>
       	<th width="10%"><?= i18n("Empresa:") ?></th>
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
			<?= i18n("| INFO |- No hay servicios para listar") ?>
			 
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
					<td width="10%"><?php echo $row['cifEmpr'];?></td> 
					<td width="10%"><button><a href="../../Controller/serviciosController.php?accion=Consulta&idServ=<?php echo $row['idServ']; ?>">Consultar</a></button></td>
				</tr>
			</form>
			<?php 
			} 
		}
		?>
		
	</table>
</div>



<?php
	require_once("../structure/footer.php");
?>