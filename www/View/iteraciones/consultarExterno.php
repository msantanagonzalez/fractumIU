<?php
	$userType="externo";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>

<h1 id='headerExterno'><a><?= i18n("- DETALLES TRABAJO -") ?></a></h1>


	<div style='height:350px;width:auto;overflow-y: scroll;'>
	<form method="POST" action="../../Controller/iteracionesController.php">
	<?php $rows = $_SESSION['consultaIteracion']; 
	 foreach ($rows as $row) { ?>
		<table class='default'>
			<tr>
				<td><?= i18n("Identificador Incidencia:") ?></td>
				<td><input type='text' disabled name="numeroIncidencia" value="<?php echo $row['idIncid']; ?>"></td>
				<td><?= i18n("Número Iteración") ?></td>
		        <td><input type='text' disabled name="numeroTrabajo" value="<?php echo $row['nIteracion']; ?>"></td>
			</tr>

			<tr>
				
		        <td><?= i18n("Coste") ?></td>
		        <td><input type='text'  disabled name="coste" value="<?php echo $row['costeIter']; ?>"></td>
		        <td><?= i18n("Fecha Apertura:") ?></td>
		        <td><input type='date' disabled value="<?php echo $row['fechaIter']; ?>"></td>
		 
		    </tr>
			<br>
		    <tr>
		        <td><?= i18n("Hora Inicio:") ?></td>
		        <td><input type='time' disabled value="<?php echo $row['hInicio']; ?>"></td>
		        <td><?= i18n("Hora Fin:") ?></td>
		        <td><input type='time' disabled value="<?php echo $row['hFin']; ?>"></td>
				<td><?= i18n("Estado Iteración:") ?></td>
		        <td><input type='text' disabled value="<?php echo $row['estadoItera']; ?>"></td>
		  </tr>
		    </tr>
				<td><?= i18n("Documentación:") ?></td>
		        <td colspan='3'><input type='text' disabled class='text' name="documentacion" name='Descripcion_Tarea'></td>
		    </tr>
		    <tr>
				<td colspan='5'><?= i18n("Descripción:") ?></td>
			</tr>
			</tr>
				<td colspan='5'>
					<textarea style="resize:none" class="text" rows="5" name='descripcionHistoricoIncidencia' disabled><?php echo $row['descripIter']; ?></textarea>
				</td>
		    </tr>
		</table>
 	
    <br>
    <table>
		<tr>
			<td colspan="4"><a href="../../Controller/iteracionesController.php?accion=Modificar Iteracion&idIncidencia=<?php echo $row['idIncid'];?>&nIteracion=<?echo $row['nIteracion'];?>"><input type="button" name="Modificar" value="Modificar"></a></td>
		</tr> 
	</table>
	<?php } ?>
</form>
</div>
<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>