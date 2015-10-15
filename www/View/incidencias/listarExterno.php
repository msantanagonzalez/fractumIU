<?php
    include_once '../../Controller/common.php';
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>

<h1 id="headerExterno"><a><i><?php echo $lang['INCIDENCIAS_BIG']; ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="17%">#ID <?php echo $lang['INC']; ?></th>
       	<th width="17%"><?php echo $lang['RESPONSABLE']; ?></th>
        <th width="17%"><?php echo $lang['ID_MAQUINA']; ?></th>
    	<th width="17%"><?php echo $lang['APERTURA']; ?></th>
        <th width="17%"><?php echo $lang['ESTADO']; ?></th>
        <th width="17%">&nbsp;</th>
    </tr>
</table>
<form method="POST" action="../../Controller/incidenciasController.php">
	<table class="default">
		<?php
			$rows = $_SESSION['listaIncidencia1'];
			foreach ($rows as $row) {
		?>
		<tr>
			<td width="17%"><?php echo $row['idIncid'];?></td>
			<td width="17%"><?php echo $row['dniResponsable'];?></td>
			<td width="17%"><?php echo $row['idMaq'];?></td>
			<td width="17%"><?php echo $row['fAper']; ?></td>
			<?php if ($row['estadoIncid'] == "Derivada") { ?>
          		<td width="17%">Abierta</td>
          <?php } else if($row['estadoIncid'] == "En Curso Externo") { ?>
	          	<td width="17%">En Curso</td>
          <?php } else { ?>
              <td width="17%">Realizada</td>
          <?php } ?>
			<td width="10%">
 				<button type="button"  value="Consulta" onclick="window.location.href='../../Controller/incidenciasController.php?accion=Consulta&idIncidencia=<?php echo $row['idIncid']; ?>'"><?php echo $lang['CONSULTAR'] ?></button>
 		 	</td>
		</tr>
		<?php } ?>
	</table>
</form>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
