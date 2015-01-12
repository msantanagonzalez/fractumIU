<?php
	$userType="jefe";
	require_once("../structure/header.php");
?>

<h1 id="headerJefe"><a><i>SERVICIOS</i></a></h1>
<table class="default">
    <tr>
    	<th width="20%">#ID M&aacute;q.</th>
    	<th width="20%">Periodicidad</th>
       	<th width="20%">Coste</th>
       	<th width="20%">Empresa</th>
        <th width="10%">&nbsp;</th>
        <th width="10%">&nbsp;</th>
    </tr>
</table>
<form method="POST" action="../../Controller/serviciosController.php">
	<table class="default">
		<?php 
			$rows = $_SESSION['listaServicios'];
			foreach ($rows as $row) {
		?>
		<tr> 
			<td width="20%"><?php echo $row['idMaq'];?></td> 
			<td width="20%"><?php echo $row['periodicidad'];?></td> 
			<td width="20%"><?php echo $row['costeSer'];?></td>
			<td width="20%"><?php echo $row['cifEmpr'];?></td> 
			<td width="10%"><button><a href="../../Controller/serviciosController.php?accion=Consulta&idServ=<?php echo $row['idServ']; ?>">Consultar</a></button></td>
			<td width="10%"><button><a href="../../Controller/serviciosController.php?accion=Eliminar&idServ=<?php echo $row['idServ']; ?>">Eliminar</a></button></td>
		</tr>
		<?php } ?>
		
	</table>
</form>
<table class="default">
	<tr>
		<td colspan="4"><a href="altaJefe.php"><input type="button" name="accion" value="Alta"/></a></td>
	</tr>
</table>

<?php
	require_once("../structure/footer.php");
?>