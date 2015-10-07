<?php
    include_once '../../Controller/common.php';
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>

<h1 id="headerJefe"><a><i><?php echo $lang['MAQUINAS_BIG']; ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="20%"><?php echo $lang['ID_MAQUINA']; ?></th>
    	<th width="18%"><?php echo $lang['SERVICIO']; ?></th>
       	<th width="20%"><?php echo $lang['ULT_INCID']; ?></th>
				<th width="20%"><?php echo $lang['DOCUMENTACION']; ?></th>
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
					<?php echo $lang['INFO_NO_MAQ']; ?>
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
 						<button type="button" onclick="window.location.href='../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>'"><?php echo $lang['CONSULTAR']; ?></button>
 					</td>
 					<td width="10%">
 						<button type="button" onclick="window.location.href='../../Controller/maquinasController.php?accion=Eliminar&idMaq=<?php echo $row['idMaq'];?>'"><?php echo $lang['ELIMINAR']; ?></button>
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
		<td colspan="4"><a href="altaJefe.php"><button type='submit'><?php echo $lang['ALTA_MAQUINA']; ?></button></a></td>
	</tr>
</table>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
