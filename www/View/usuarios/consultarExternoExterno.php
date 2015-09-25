<?php
    include_once '../../Controller/common.php';
	$userType="externo";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	
	$datosUsuario = $_SESSION["datosUsuario"];
	$datosExterno = $_SESSION["datosExterno"];
	
foreach ($datosUsuario as $usuario){
?>

<h1 id="headerExterno"><a><i><?php echo $lang['PERFIL_BIG']; ?> <?php echo $usuario['nomUsu']." ".$usuario['apellUsu']; ?></i></a></h1>
<form method="POST" action="modificarExternoExterno.php">
	<table class="default">
		<tr> 
			<td width="25%"><?php echo $lang['ID']; ?></td> 
			<td width="25%"><input type="text" class="text" name="peID" disabled value="<?php echo $_SESSION['dni']; ?>"/></td>
			<td width="25%"><?php echo $lang['CONTRASENA']; ?></td> 
			<td width="25%"> <input type="password" class="text" name="pePass" disabled value="<?php echo $usuario['passUsu']; ?>"/></td>
		</tr>
		<tr> 
			<td width="25%"><?php echo $lang['NOMBRE']; ?></td> 
			<td width="25%"><input type="text" class="text" name="peNombre" disabled value="<?php echo $usuario['nomUsu']; ?>"/></td>
			<td width="25%"><?php echo $lang['APELLIDOS']; ?></td> 
			<td width="25%"> <input type="text" class="text" name="peApellidos" disabled value="<?php echo $usuario['apellUsu']; ?>"/></td> 
		</tr>
		<?php
		foreach ($datosExterno as $externo){
		?>
		<tr> 
			<td width="25%"><?php echo $lang['EMPRESA']; ?></td> 
			<td width="25%"><input type="text" class="text" name="peEmpresa" disabled value="<?php echo $externo['cifEmpr']; ?>"/></td>
			<td></td>
			<td></td>
		</tr>
		<?php } ?>
		<tr>
			<td width="20%" colspan="4"><input type="submit" name="peModificar" value="Modificar"></td>
		</tr> 
	</table>
</form>
<?php
}
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>