<?php
 include_once '../../../Controller/common.php';
	$userType="interno";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>

<h1 id="headerInterno"><a><i><?php echo $lang['MAQUINAS_BIG']; ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="20%"><?php echo $lang['ID']; ?></th>
    	<th width="20%"><?php echo $lang['NOMBRE']; ?></th>
       	<th width="20%"><?php echo $lang['SERVICIO']; ?></th>
		<th width="20%"><?php echo $lang['ULT_INCID']; ?></th>
        <th width="20%"></th>
    </tr>
</table>
<div style="height:300px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->

	<table class="default">
		<?php 
			$rows = $_SESSION['listaMaquina'];
			foreach ($rows as $row) {
		?>
		<form method="POST" action="../../Controller/maquinasController.php">

		<tr> 
			<td width="20%"><?php echo $row['idMaq']; ?></td> 
			<td width="20%"><?php echo $row['nomMaq']; ?></td> 
			<td width="20%"><a href="#"<?php echo $lang['FULL_COVER']; ?></a></td> 
			<td width="20%"><a href="../../Controller/incidenciasController.php?accion=consulta&idIncidencia">I001</a></td> 
			<td width="20%"><button href="../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>">Consultar</button></td>
		</tr>
		<?php } ?>
	</table>
</div>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>