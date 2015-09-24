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
<h1 id="headerJefe"><a><i><?php echo $lang['INCIDENCIAS']; ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="17%">#ID <?php echo $lang['INC']; ?></th>
       	<th width="17%"><?php echo $lang['APERTURA']; ?></th>
        <th width="17%"><?php echo $lang['RESPONSABLE']; ?></th>
    	<th width="17%"><?php echo $lang['CIERRE']; ?></th>
        <th width="17%"><?php echo $lang['ESTADO']; ?></th>
        <th width="17%">&nbsp;</th>
    </tr>
</table>
<div style="height:115px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->
	<form method="POST" action="../../Controller/incidenciasController.php">
		<table class="default">
			<?php
				if(isset($_SESSION['listaIncidencia']))
				$rows = $_SESSION['listaIncidencia'];
				if (empty($rows)) {
				?>
					<div class="alert alert-warning" role="alert">
					<?php echo $lang['INFO_NO_INCID']; ?>
					</div>
				<?php
				}
				else{
					foreach ($rows as $row) {
				?>
				<tr>
					<td width="17%"><?php echo $row['idIncid'];?></td>
					<td width="17%"><?php echo $row['fAper']; ?></td>
					<td width="17%"><?php echo $row['dniResponsable']; ?></td> <!-- Falta linkar al perfil del usuario. -->
					<td width="17%"><?php echo $row['fCier']; ?></td>
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
</div>
<br>

<h1 id="headerJefe"><a><i><?php echo $lang['MAQUINAS']; ?></i></a></h1>
<table class="default">
		<tr>
    	<th width="20%">#ID <?php echo $lang['MAQUINA']; ?></th>
    	<th width="18%"><?php echo $lang['SERVICIO']; ?></th>
       	<th width="20%"><?php echo $lang['ULT_INCID']; ?></th>
				<th width="20%"><?php echo $lang['DOCUMENTACION']; ?></th>
        <th width="10%">&nbsp;</th>
        <th width="10%">&nbsp;</th>
    </tr>
</table>
<div style="height:115px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->
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
					<td width="20%"> <?php if(isset($row[1])){ echo "SÍ";} else echo "NO"; ?> </td>
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
	 					 <a href="../<?php echo $row[4];?>" target="_blank"> <img src="../../Resources/images/PDF.png"> </a>
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
</div>
<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
