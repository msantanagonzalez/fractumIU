<?php
   	include_once '../../Controller/common.php';
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>

<h1 id="headerInterno"><a><i><?php echo $lang['INCIDENCIAS_BIG']; ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="17%">#ID  <?php echo $lang['INC']; ?></th>
    
        <th width="17%"><?php echo $lang['ULTIMA_ITERACION']; ?></th>
    	<th width="17%"><?php echo $lang['APERTURA']; ?></th>
        <th width="17%"><?php echo $lang['ESTADO']; ?></th>
        <th width="17%">&nbsp;</th>
    </tr>
</table>
<form method="POST" action="../../Controller/incidenciasController.php">
	<table class="default">
		<?php 
			$rows = $_SESSION['pendientesInterno'];
			if (empty($rows)) {
			?>
				<div class="alert alert-info" role="alert">
					<?php echo $lang['INFO_NO_INCID']; ?>
				</div>
			<?php
			}
			else{
			foreach ($rows as $row) {
			?>
			<tr> 
				<td width="17%"><?php echo $row['idIncid'];?></td> 
				 
				<td width="17%"><?php echo $row['dniApertura'];?></a></td> <!-- Falta linkar al perfil del usuario. -->
				<td width="17%"><?php echo $row['fAper']; ?></td>
				<td width="17%"><?php echo $row['estadoIncid']; ?></td>
				<td width="10%"><button type="button" onclick="window.location.href='../../Controller/incidenciasController.php?accion=Consulta&idIncidencia=<?php echo $row['idIncid']; ?>'"><?php echo $lang['CONSULTAR']; ?></button>
				
			</tr>
			<?php 
			} 
		}
		?>
	</table>
</form>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>