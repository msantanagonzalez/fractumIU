<?php
    include_once '../../Controller/common.php';
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>

<h1 id="headerJefe"><a><i><?php echo $lang['EMPRESA']; ?></i></a></h1>
	<form method="POST" action="../../Controller/empresasController.php">
		<?php $rows = $_SESSION['consultaEmpresa']; ?>
		<table class="default">
			<?php foreach ($rows as $row) { ?>
			<tr>
				<td width="25%"><?php echo $lang['CIF']; ?></td>
				<td width="25%"><input type="text" class="text" disabled name="cifEmpr" value="<?php echo $row['cifEmpr']; ?>"/></td>
				<td width="25%"><?php echo $lang['NOMBRE']; ?></td>
				<td width="25%"><input type="text" class="text" disabled name="nomEmpr" value="<?php echo $row['nomEmpr']; ?>"/></td>
			</tr>
			<tr>
				<td width="25%"><?php echo $lang['TELEFONO']; ?></td>
				<td width="25%"><input type="text" class="text" disabled name="telefEmpr" value="<?php echo $row['telefEmpr']; ?>" /></td>
				<td width="25%"><?php echo $lang['CORREO']; ?></td>
				<td width="25%"><input type="text" class="text" disabled name="mailEmpr" value="<?php echo $row['mailEmpr']; ?>" /></td>
			</tr>
			<?php } ?>
		</table>
	</form>
	<table class="default">
		<tr>
			<?php
			if($row['cifEmpr'] != 'DEFAULT'){
			?>
			<td colspan="4"><a href="../../Controller/empresasController.php?accion=Modificar&cifEmpr=<?php echo $row['cifEmpr']; ?>"><button type="submit" name="pModificar">Modificar</button></a></td>
			<?php
			}
			?>
		</tr>
	</table>
<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
