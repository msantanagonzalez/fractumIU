<?php
	$userType="interno";
	require_once("../structure/header.php");
?>

<h1 id="headerInterno"><a><i>MAQUINAS</i></a></h1>
<table class="default">
    <tr>
    	<th width="20%">ID</th>
    	<th width="20%">Nombre</th>
       	<th width="20%">Servicio</th>
		<th width="20%">Ult.Incidencia</th>
        <th width="20%"></th>
    </tr>
</table>
<div style="height:300px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->

	<table class="default">
		<?php 
			$rows = $_SESSION['listaMaquina'];
			foreach ($rows as $row) {
		?>
		<form method="POST" action="../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>">

		<tr> 
			<td width="20%"><?php echo $row['idMaq']; ?></td> 
			<td width="20%"><?php echo $row['nomMaq']; ?></td> 
			<td width="20%"><a href="#">FULL COVER</a></td> 
			<td width="20%"><a href="../../Controller/incidenciasController.php?accion=consulta&idIncidencia">I001</a></td> 
			<td width="20%"><button href="../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>">Consultar</button></td>
		</tr>
		<?php } ?>
	</table>
</div>

<?php
	require_once("../structure/footer.php");
?>