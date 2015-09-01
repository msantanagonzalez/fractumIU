<?php
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	require_once $_SESSION['cribPath'].'View/crearMensaje.php';
?>

<h1 id="headerJefe"><a><i><?= i18n("MÁQUINAS") ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="20%">#ID <?= i18n("Máquina") ?></th>
    	<th width="18%"><?= i18n("Servicio") ?></th>
       	<th width="20%"><?= i18n("&Uacute;lt. Incid.") ?></th>
        <th width="10%">&nbsp;</th>
        <th width="10%">&nbsp;</th>
    </tr>
</table>
<form method="POST" action="../../Controller/maquinasController.php">
	<table class="default">
		<?php
            $incidencias = $_SESSION['listaIncidMaquina'];
            $servicio = $_SESSION['listaServ'];
			if(isset($_SESSION['listaMaquina']))
			$rows = $_SESSION['listaMaquina'];
			if (empty($rows)) {
			?>
				<div class="alert alert-warning" role="alert">
				<?= i18n("| INFO |- No hay maquinas para listar") ?>
				</div>
			<?php
			}
			else{
                $cont = 0;
				foreach ($rows as $row) {
				?>
				<tr>
					<td width="20%"  name = "idMaq"><?php echo $row['idMaq']; ?></td>
					<td width="20%">
						<?php if(isset($servicio[$cont][0])){ ?>
							<a href="../../Controller/serviciosController.php?accion=Consulta&idServ=<?php echo $servicio[$cont][0] ?>"> <?php echo $servicio[$cont][0] ?>
					<?php }else echo "NO" ?></td>
					 <td width="20%"><?php if(isset($incidencias[$cont][0][0])) echo $incidencias[$cont][0][0]; else echo "-"?></td>
                     <td width="10%">
 						<input type="button"  value="Consulta" onclick="window.location.href='../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>'"/>
 					</td>
 					<td width="10%">
 						<input type="button" value="Eliminar" onclick="window.location.href='../../Controller/maquinasController.php?accion=Eliminar&idMaq=<?php echo $row['idMaq'];?>'">
 					</td>
				</tr>
				<?php
                    $cont++;
				}
			}
		?>
	</table>
</form>
<table class="default">
	<tr>
		<td colspan="4"><a href="altaJefe.php"><input type="submit" name="Alta" value="Alta M&aacute;quina"/></a></td>
	</tr>
</table>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
