<?php
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	require_once $_SESSION['cribPath'].'View/crearMensaje.php';
?>

<h1 id="headerJefe"><a><i><?= i18n("MÁQUINAS") ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="20%">#ID <?= i18n("Máquina") ?></th>
    	<th width="18%"><?= i18n("Servicio") ?></th>
       	<th width="20%"><?= i18n("&Uacute;lt. Incid.") ?></th>
				<th width="20%"><?= i18n("Documentación") ?></th>
        <th width="10%">&nbsp;</th>
        <th width="10%">&nbsp;</th>
    </tr>
</table>
<form method="POST" action="../../Controller/maquinasController.php">
	<table class="default">
		<?php

			if(isset($_SESSION['maqsJefe']))
			$rows = $_SESSION['maqsJefe'];
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
          <td width="10%">
 						<input type="button"  value="Consulta" onclick="window.location.href='../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>'"/>
 					</td>
 					<td width="10%">
 						<input type="button" value="Eliminar" onclick="window.location.href='../../Controller/maquinasController.php?accion=Eliminar&idMaq=<?php echo $row['idMaq'];?>'">
 					</td>
				</tr>
				<?php
                    $cont++;
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
