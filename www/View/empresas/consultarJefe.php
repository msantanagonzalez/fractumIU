<?php
	$userType="jefe";
	require_once("../structure/header.php");
?>

<h1 id="headerJefe"><a><i>EMPRESA </i></a></h1>
	<form method="POST" action="../../Controller/empresasController.php">
		<?php $rows = $_SESSION['consultaEmpresa']; ?>
		<table class="default">
			<?php foreach ($rows as $row) { ?>
			<tr> 
				<td width="25%">#CIF: </td> 
				<td width="25%"><input type="text" class="text" disabled name="cifEmpr" value="<?php echo $row['cifEmpr']; ?>"/></td> 
				<td width="25%">Nombre: </td> 
				<td width="25%"><input type="text" class="text" disabled name="nomEmpr" value="<?php echo $row['nomEmpr']; ?>"/></td>
			</tr>
			<tr> 
				<td width="25%">Tel&eacute;fono: </td> 
				<td width="25%"><input type="text" class="text" disabled name="telefEmpr" value="<?php echo $row['telefEmpr']; ?>" /></td> 
				<td width="25%">Correo: </td> 
				<td width="25%"><input type="text" class="text" disabled name="mailEmpr" value="<?php echo $row['mailEmpr']; ?>" /></td>
			</tr>
			<?php } ?>
		</table>
	</form>
	<table class="default">
		<tr>
			<td colspan="4"><a href="../../Controller/empresasController.php?accion=Modificar&cifEmpr=<?php echo $row['cifEmpr']; ?>"><input type="submit" name="pModificar" value="Modificar"></a></td>
		</tr> 
	</table>
<?php
	require_once("../structure/footer.php");
?>