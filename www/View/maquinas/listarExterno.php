<?php
	$userType="externo";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>

<h1 id="headerExterno"><a><?= i18n("- MÁQUINAS SERVICIOS -") ?></a></h1> <!--SECCIÓN-->
<table class="default"><!--TABLA-->
	<tr>
		<th width="10%"><?= i18n("ID") ?></th>
		<th width="25%"><?= i18n("Nombre:") ?></th>
	    <th width="25%"><?= i18n("Mantenimiento") ?></th>
	    <th width="25%"><?= i18n("Últ. Incidencia") ?></th>
		<th width="15%"> </th>
	</tr>
</table>
<div style="height:350px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->

	<table class="default"><!--TABLA-->
		<?php 
			$rows2 = $_SESSION['listaMaquina1'];
			foreach ($rows2 as $row) {
		?>
		<form method="POST" action="../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>">

		<tr>
			<td width="10%"><?php echo $row['idMaq']; ?></th>
			<td width="25%"><?php echo $row['nomMaq']; ?></td>
		    <td width="25%">No</td>
		    <td width="25%">10/11/2013</td>
			<td width="20%"><a href="../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>"><button >Consultar</button></a></td>
		</tr>
		<?php } ?>
	</table>
</div>

<h1 id="headerExterno"><a><?= i18n("- MÁQUINAS INCIDENCIAS-") ?></a></h1> <!--SECCIÓN-->
<table class="default"><!--TABLA-->
	<tr>
		<th width="10%"><?= i18n("ID") ?></th>
		<th width="25%"><?= i18n("Nombre:") ?></th>
	    <th width="25%"><?= i18n("Mantenimiento") ?></th>
	    <th width="25%"><?= i18n("Últ. Incidencia") ?></th>
		<th width="15%"> </th>
	</tr>
</table>
<div style="height:350px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->

	<table class="default"><!--TABLA-->
		<?php 
			$rows = $_SESSION['listaMaquina2'];
			foreach ($rows as $row1) {
		?>
		<form method="POST" action="../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row1['idMaq'];?>">

		<tr>
			<td width="10%"><?php echo $row1['idMaq']; ?></th>
			<td width="25%"><?php echo $row1['nomMaq']; ?></td>
		    <td width="25%">No</td>
		    <td width="25%">10/11/2013</td>
			<td width="20%"><a href="../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row1['idMaq'];?>"><button >Consultar</button></a></td>
		</tr>
		<?php } ?>
	</table>
</div>
<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>