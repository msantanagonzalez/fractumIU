<?php
	$userType="jefe";
	require_once("../structure/header.php");
?>

<h1 id="headerJefe"><a><i>M&Aacute;QUINAS</i></a></h1>
<table class="default">
    <tr>
    	<th width="20%">#ID M&aacute;q.</th>
    	<th width="20%">Servicio</th>
       	<th width="20%">&Uacute;lt. incidencia</th>
        <th width="10%">&nbsp;</th>
        <th width="10%">&nbsp;</th>
    </tr>
</table>
	<table class="default">
		<?php 
			$rows = $_SESSION['listaMaquina'];
			foreach ($rows as $row) {
		?>
		<form method="POST" action="../../Controller/maquinasController.php">

		<tr> 
			<td width="20%"  name = "idMaq"><?php echo $row['idMaq']; ?></td> 
			<td width="20%">Sí</td> 
			<td width="20%">13/09/2014</td> 
			<td width="10%"><button><a href="../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>">Consultar</a></button></td>
			<td width="10%"><button><a href="../../Controller/maquinasController.php?accion=Eliminar&idMaq=<?php echo $row['idMaq'];?>">Eliminar</a></button></td>
		</tr>
		<?php } ?>
	</table>
</form>
<table class="default">
	<tr>
		<td colspan="4"><a href="altaJefe.php"><input type="button" name="Alta" value="Alta M&aacute;quina"/></a></td>
	</tr>
</table>

<?php
	require_once("../structure/footer.php");
?>