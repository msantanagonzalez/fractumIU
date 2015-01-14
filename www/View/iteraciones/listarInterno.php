<?php
	$userType="interno";
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
			<td width="10%"><button><a href="../../Controller/iteracionesController.php?accion=Consulta&idIncid=<?php echo $row['idIncid'];?>">Consultar</a></button></td> <!--Se necesita niteracion para la consulta-->
		</tr>
		<?php } ?>
	</table>
</form>
<table class="default">
	<tr>
		<td colspan="4"><a href="altaInterno.php"><input type="button" name="sAlta" value="Alta Iteracion"/></a></td>
	</tr>
</table>

<?php
	require_once("../structure/footer.php");
?>