<?php
    include_once '../../Controller/common.php';
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	require_once $_SESSION['cribPath'].'View/crearMensaje.php';
?>

<h1 id="headerJefe"><a><i><?php echo $lang['EMPRESA']; ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="28%"><?php echo $lang['CIF']; ?></th>
    	<th width="40%"><?php echo $lang['NOMBRE']; ?></th>
        <th width="10%">&nbsp;</th>
        <th width="10%">&nbsp;</th>
    </tr>
</table>
<form method="POST" action="../../Controller/empresasController.php">
	<table class="default">
		<!--<td width="10%"><button><a onclick="return Eliminar_Elemento()">Eliminar</a></button></td> -->
		<?php
			$rows = $_SESSION['listaEmpresas'];
			if (empty($rows)) {
			?>
				<div class="alert alert-warning" role="alert">
				<?php echo $lang['INFO_NO_MAQ']; ?>

				</div>
			<?php
			}else{
			foreach ($rows as $row) {
				if($row[0]!="A0000000Z"){
				?>
				<tr>
					<td width="31%"><?php echo $row['cifEmpr'];?></td>
					<td width="40%"><?php echo $row['nomEmpr']; ?></td>
					<td width="10%"><input type="button" value="Consulta" onclick="window.location.href='../../Controller/empresasController.php?accion=Consulta&cifEmpr=<?php echo $row['cifEmpr']; ?>'"/></td>
					<?php
					if ($row['cifEmpr'] != 'DEFAULT'){
					?>
					<td width="10%"><input type="button" value="Eliminar" onclick="window.location.href='../../Controller/empresasController.php?accion=Eliminar&cifEmpr=<?php echo $row['cifEmpr']; ?>'"></td>
					<?php
					}
					?>					
				</tr>
				<?php
}				}
		}
		?>
	</table>
</form>
<table class="default">
	<tr>
		<td colspan="4"><a href="altaEmpresa.php"><input type="submit" name="sAlta" value="Alta Empresa"/></a></td>
	</tr>
</table>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
