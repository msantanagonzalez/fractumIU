<?php
	$userType="jefe";
	require_once("../structure/header.php");
	require '../crearMensaje.php';
?>

<h1 id="headerJefe"><a><i><?= i18n("EMPRESA") ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="28%"><?= i18n("#CIF:") ?></th>
    	<th width="40%"><?= i18n("Nombre:") ?></th>
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
				<?= i18n("| INFO |- No hay empresas para listar ") ?>
				
				</div>
			<?php
			}else{
			foreach ($rows as $row) {
				?>
				<tr> 
					<td width="30%"><?php echo $row['cifEmpr'];?></td>  
					<td width="40%"><?php echo $row['nomEmpr']; ?></td>
					<td width="10%"><button><a href="../../Controller/empresasController.php?accion=Consulta&cifEmpr=<?php echo $row['cifEmpr']; ?>">Consultar</a></button></td>
					<td width="10%"><button><a href="../../Controller/empresasController.php?accion=Eliminar&cifEmpr=<?php echo $row['cifEmpr']; ?>">Eliminar</a></button></td>
				</tr>
				<?php 
				}
		}
		?>
	</table>
</form>
<table class="default">
	<tr>
		<td colspan="4"><a href="altaEmpresa.php"><input type="button" name="sAlta" value="Alta Empresa"/></a></td>
	</tr>
</table>

<?php
	require_once("../structure/footer.php");
?>