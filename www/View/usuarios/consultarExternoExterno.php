<?php
	$userType="externo";
	require_once("../structure/header.php");
	
	$datosUsuario = $_SESSION["datosUsuario"];
	$datosExterno = $_SESSION["datosExterno"];
	
foreach ($datosUsuario as $usuario){
?>

<h1 id="headerExterno"><a><i><?= i18n("PERFIL") ?> <?php echo $usuario['nomUsu']." ".$usuario['apellUsu']; ?></i></a></h1>
<form method="POST" action="modificarExternoExterno.php">
	<table class="default">
		<tr> 
			<td width="25%"><?= i18n("#ID:") ?> </td> 
			<td width="25%"><input type="text" class="text" name="peID" disabled value="<?php echo $_SESSION['dni']; ?>"/></td>
			<td width="25%"><?= i18n("Contraseña:") ?> </td> 
			<td width="25%"> <input type="password" class="text" name="pePass" disabled value="<?php echo $usuario['passUsu']; ?>"/></td>
		</tr>
		<tr> 
			<td width="25%"><?= i18n("Nombre:") ?> </td> 
			<td width="25%"><input type="text" class="text" name="peNombre" disabled value="<?php echo $usuario['nomUsu']; ?>"/></td>
			<td width="25%"><?= i18n("Apellidos:") ?> </td> 
			<td width="25%"> <input type="text" class="text" name="peApellidos" disabled value="<?php echo $usuario['apellUsu']; ?>"/></td> 
		</tr>
		<?php
		foreach ($datosExterno as $externo){
		?>
		<tr> 
			<td width="25%"><?= i18n("Empresa:") ?> </td> 
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
	require_once("../structure/footer.php");
?>