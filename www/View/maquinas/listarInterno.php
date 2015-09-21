<?php
	$userType="interno";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	require_once $_SESSION['cribPath'].'View/messages/messages_ga.php';
?>

<h1 id="headerInterno"><a><i><?= i18n("- MÁQUINAS -") ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="20%"><?= i18n("ID") ?></th>
      <th width="20%"><?= i18n("Servicio:") ?></th>
			<th width="20%"><?= i18n("Últ. Incidencia") ?></th>
		  <th width="20%"><?= i18n("Documentación") ?></th>
      <th width="20%"></th>
    </tr>
</table>
<div style="height:300px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->

	<table class="default">
		<?php
			if(isset($_SESSION['listaMaquina']))
				$rows = $_SESSION['listaMaquina'];
				if (empty($rows)) {
				?>
					<div class="alert alert-warning" role="alert">
					<?= i18n("| INFO |- No hay maquinas para listar") ?>
					</div>
				<?php
				}
				else{
	                $cont = 0;
					foreach ($rows as $row) {
					?>
					<tr>
						<td width="20%"  name = "idMaq"><?php echo $row[0]; ?></td>
						<td width="20%">
							<?php if(isset($row[1])){echo "S&Iacute;";} else echo "NO" ?></td>
						 <td width="20%">
							<?php if(isset($row[2])){ ?>
								 <a href="../../Controller/incidenciasController.php?accion=Consulta&idIncidencia=<?php echo $row[2]?>">
									 <?php echo $row[2];?>
								 </a>
							<?php } else echo "-" ?>
						 </td>
						 <td width="20%">
		 				 <?php
						 	if(isset($row[4])){ ?>
		 					 <a href="../<?php echo $row[4];?>" target="_blank">
		 						<img src="../../Resources/images/PDF.png">
		 						</a>
		 				 <?php } else echo "-" ?>
		 				</td>
						<td width="20%"><a href="../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row[0];?>"><colspan="4"><input type="button" value="Consultar"</a></td>
			<?php }
			?>
		</tr>
		<?php
		 $cont++;
		} ?>
	</table>
</div>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
