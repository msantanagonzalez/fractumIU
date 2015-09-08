<?php
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>

<h1 id="headerExterno"><a><i><?php echo $lang['INCIDENCIAS_BIG']; ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="17%">#ID <?php echo $lang['INC']; ?></th>
       	<th width="17%"><?php echo $lang['ULTIMO_OPERARIO']; ?></th>
        <th width="17%"><?php echo $lang['ULTIMA_ITERACION']; ?></th>
    	<th width="17%"><?php echo $lang['APERTURA']; ?></th>
        <th width="17%"><?php echo $lang['ESTADO']; ?></th>
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
			<td width="17%"><?php echo $lang['AVERIA_ALTERNADOR']; ?></td> 
			<td width="17%">Fulanito</a></td> <!-- Falta linkar al perfil del usuario. -->
			<td width="17%"><?php echo $row['fAper']; ?></td>
			<td width="17%"><?php echo $row['estadoIncid']; ?></td>
			<td width="17%"><button><a href="../../Controller/incidenciasController.php?accion=Consulta&idIncidencia=<?php echo $row['idIncid']; ?>">Consultar</a></button></td>
		</tr>
		<?php } ?>
	</table>
</form>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>