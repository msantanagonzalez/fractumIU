<?php
	$userType="jefe";
	require_once("../structure/header.php");
?>
<form method="POST" action="../../Controller/usuariosController.php">
	<input id="button" type="submit" name="accion" value="OPERARIOS INTERNOS">
</form>

<form method="POST" action="../../Controller/usuariosController.php">
	<input id="button" type="submit" name="accion" value="OPERARIOS EXTERNOS">
</form>
<?php
	require_once("../structure/footer.php");
?>