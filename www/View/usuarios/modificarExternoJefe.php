<?php
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	
	$datosUsuario = $_SESSION["datosUsuario"];
	$datosExterno = $_SESSION["datosExterno"];
	
foreach ($datosUsuario as $usuario){
?>
  <script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>          
<h1 id="headerJefe"><a><i><?= i18n("PERFIL") ?> <?php echo $usuario['nomUsu']." ".$usuario['apellUsu']; ?></i></a></h1>
<form method="POST" onsubmit="return modificarExternoJefe()" action="../../Controller/usuariosController.php?dniUsu=<?php echo $usuario['dniUsu']; ?>">
	<table class="default">
		<tr> 
			<td width="25%"><?= i18n("#ID:") ?> </td> 
			<td width="25%"><input type="text" disabled class="text" name="dniUsu" value="<?php echo $usuario['dniUsu']; ?>"/></td> 
			<td width="25%"><?= i18n("Contraseña:") ?> </td> 
			<td width="25%"> <input type="password" class="text" name="passUsu" value="<?php echo $usuario['passUsu']; ?>"/></td> 
		</tr>
		<tr> 
			<td width="25%"><?= i18n("Nombre:") ?> </td> 
			<td width="25%"><input id="nombre" type="text" class="text" name="nomUsu" value="<?php echo $usuario['nomUsu']; ?>"/></td> 
			<td width="25%"><?= i18n("Apellidos:") ?> </td> 
			<td width="25%"> <input id="apellidos" type="text" class="text" name="apellUsu" value="<?php echo $usuario['apellUsu']; ?>"/></td> 
		</tr>
		<?php
		foreach ($datosExterno as $externo){
		?>
		<tr> 
			<td width="25%"><?= i18n("Empresa:") ?> </td> 
			<td width="25%"><input id="empresa" type="text" class="text" name="cifEmpr" value="<?php echo $externo['cifEmpr']; ?>"/></td>
			<td></td>
			<td></td>
		</tr>
		<?php } ?>
		<tr>
			<td width="20%" colspan="4"><input type="submit" name="accion" value="Guardar"></td>
		</tr> 
	</table>
</form>

<?php
}
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>