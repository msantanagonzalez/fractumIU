<?php
	$userType="interno";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>

<h1 id="headerInterno"><a><i><?php echo $lang['MAQUINAS_BIG']; ?></a></h1>
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
			
			<?php
			if (empty($ultimaIncid[$cont][0][0])) {
			?>
			<td><?php echo 'Sin Incidencias'; ?></td>
			<?php
			}else{	
			?>
			
			<td width="20%"><a href="../../Controller/incidenciasController.php?accion=Consulta&idIncidencia=<?php echo $ultimaIncid[$cont][0][0];?>"><?php echo $ultimaIncid[$cont][0][0]; ?></td>
			
			<?php }
			?>
			
			<td width="20%"><a href="../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>"><colspan="4"><input type="button" value="Consultar"</a></td>
			
		</tr>
		<?php
		 $cont++;
		} ?>
	</table>
</div>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
