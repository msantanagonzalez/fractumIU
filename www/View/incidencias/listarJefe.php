<?php
	require_once("../structure/header.php");
?>

<h1 id="headerJefe"><a><i>INCIDENCIAS</i></a></h1>
<table class="default">
    <tr>
    	<th width="17%">#ID Inc.</th>
       	<th width="17%">&Uacute;lt. operario</th>
        <th width="17%">&Uacute;lt. iteración</th>
    	<th width="17%">T&iacute;tulo</th>
        <th width="17%">Estado</th>
        <th width="17%">&nbsp;</th>
    </tr>
</table>
<form method="POST" action="../../Controller/incidenciasController.php">
	<table class="default">
		<?php 
			$rows = $_SESSION['listaIncidencia'];
			foreach ($rows as $row) {
		?>
		<tr> 
			<td width="17%"><?php echo $row['idIncid'];?></td> 
			<td width="17%">Avería alternador</td> 
			<td width="17%">Fulanito</a></td> <!-- Falta linkar al perfil del usuario. -->
			<td width="17%"><?php echo $row['fAper']; ?></td>
			<td width="17%"><?php echo $row['estadoIncid']; ?></td>
			<td width="17%"><button><a href="../../Controller/incidenciasController.php?accion=Consulta&idIncidencia=<?php echo $row['idIncid']; ?>">Consultar</a></button></td>
		</tr>
		<?php } ?>
	</table>
</form>
<table>
	<tr>
		<th width="20%"></th>
		<th width="40%"><a href="altaJefe.php"><input type="button" name="alta" value="Alta"></a></th>
		<th width="20%"></th>
	</tr>
</table>

<?php
	require_once("../structure/footer.php");
?>