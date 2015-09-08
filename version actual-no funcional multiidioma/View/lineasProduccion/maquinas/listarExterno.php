<?php
	$userType="externo";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>

<h1 id="headerExterno"><a><?php echo $lang['MAQUINAS_BIG']; ?></a></h1> <!--SECCIÓN-->
<table class="default"><!--TABLA-->
	<tr>
		<th width="10%"><?php echo $lang['ID']; ?></th>
		<th width="25%"><?php echo $lang['USUARIO']; ?></th>
	    <th width="25%"><?php echo $lang['MANTENIMIENTO']; ?></th>
	    <th width="25%"><?php echo $lang['ULT_INCIDENCIA']; ?></th>
		<th width="15%"> </th>
	</tr>
</table>
<div style="height:350px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->

	<table class="default"><!--TABLA-->
		<?php 
			$rows = $_SESSION['listaMaquina'];
			foreach ($rows as $row) {
		?>
		<form method="POST" action="../../Controller/maquinasController.php">

		<tr>
			<td width="10%"><?php echo $row['idMaq']; ?></th>
			<td width="25%"><?php echo $row['nomMaq']; ?></td>
		    <td width="25%"><?php echo $lang['NO']; ?></td>
		    <td width="25%"><?php echo $lang['FECHA_EXAMPLE']; ?></td>
			<td width="15%"><button href='../../Controller/maquinasController.php?accion=consulta&idMaquina'=<?php echo $row['idMaq']; ?>">Consultar</button></td>
		</tr>
		<?php } ?>
	</table>
</div>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>