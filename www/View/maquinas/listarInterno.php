<?php
	$userType="interno";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>

<h1 id="headerInterno"><a><i><?= i18n("- MÁQUINAS SERVICIOS -") ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="20%"><?= i18n("ID") ?></th>
    	<th width="20%"><?= i18n("Nombre:") ?></th>
       	<th width="20%"><?= i18n("Servicio:") ?></th>
		<th width="20%"><?= i18n("Últ. Incidencia") ?></th>
        <th width="20%"></th>
    </tr>
</table>
<div style="height:300px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->

	<table class="default">
		<?php
			$ultimaIncid = $_SESSION['listaIncidMaquina'];
			$rows = $_SESSION['listaMaquina'];
			$servicio = $_SESSION['listaServicios'];
			$cont = 0;
			foreach ($rows as $row) {
		?>
		<tr>
			<td width="20%"><?php echo $row['idMaq']; ?></td>
			<td width="20%"><?php echo $row['nomMaq']; ?></td>
			<td width="20%"><?php echo $servicio[$cont]; ?></td>
			<td width="20%"><a href="../../Controller/incidenciasController.php?accion=Consulta&idIncid=<?php echo $ultimaIncid[$cont][0][0];?>"><?php echo $ultimaIncid[$cont][0][0]; ?></td>
			<td width="20%"><a href="../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>"><button >Consultar</button></a></td>
		</tr>
		<?php
		 $cont++;
		} ?>
	</table>
</div>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
