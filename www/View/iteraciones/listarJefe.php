<?php
	$userType="jefe";
	require_once("../structure/header.php");
?>

<h1 id="headerJefe"><a><i>ITERACIONES</i></a></h1>
<table class="default">
    <tr>
    	<th width="28%">#idIncidencia</th>
    	<th width="40%">Numero Iteracion</th>
        <th width="10%">&nbsp;</th>
        <th width="10%">&nbsp;</th>
    </tr>
</table>
<form method="POST" action="../../Controller/iteracionesController.php">
	<table class="default">
		<?php 
			$rows = $_SESSION['listarIteraciones'];
			foreach ($rows as $row) {
		?>
		<tr> 
			<td width="30%"><?php echo $row['idIncid'];?></td>  
			<td width="40%"><?php echo $row['nIteracion']; ?></td>
			<td width="10%"><button><a href="../../Controller/iteracionesController.php?accion=Consulta&idIncid&nIteracion=<?php echo $row['idIncid']; echo $row['nIteracion'] ?>">Consultar</a></button></td>
		</tr>
		<?php } ?>
	</table>
</form>

<?php
	require_once("../structure/footer.php");
?>