<?php
	$userType="externo";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>

<h1 id='headerExterno'><a><?php echo $lang['DETALLES_TRABAJO_BIG']; ?></a></h1>


	<div style='height:350px;width:auto;overflow-y: scroll;'>
	<form method="POST" action="../../Controller/iteracionesController.php">
	<?php $rows = $_SESSION['consultaIteracion']; 
	 foreach ($rows as $row) { ?>
		<table class='default'>
			<tr>
				<td><?php echo $lang['IDENTIFICADOR_INCIDENCIA']; ?></td>
				<td><input type='text' disabled name="numeroIncidencia" value="<?php echo $row['idIncid']; ?>"></td>
				<td><?php echo $lang['NUMERO_ITERACION']; ?></td>
		        <td><input type='text' disabled name="numeroTrabajo" value="<?php echo $row['nIteracion']; ?>"></td>
			</tr>

			<tr>
				
		        <td><?php echo $lang['COSTE']; ?></td>
		        <td><input type='text'  disabled name="coste" value="<?php echo $row['costeIter']; ?>"></td>
		        <td><?php echo $lang['FECHA_APERTURA']; ?></td>
		        <td><input type='date' disabled value="<?php echo $row['fechaIter']; ?>"></td>
		 
		    </tr>
			<br>
		    <tr>
		        <td><?php echo $lang['HORA_INICIO']; ?></td>
		        <td><input type='time' disabled value="<?php echo $row['hInicio']; ?>"></td>
		        <td><?php echo $lang['HORA_FIN']; ?></td>
		        <td><input type='time' disabled value="<?php echo $row['hFin']; ?>"></td>
				<td><?php echo $lang['ESTADO_ITERACION']; ?></td>
		        <td><input type='time' disabled value="<?php echo $row['estadoItera']; ?>"></td>
		  </tr>
		    </tr>
				<td><?php echo $lang['DOCUMENTACION']; ?></td>
		        <td colspan='3'><input type='text' disabled class='text' name="documentacion" value='#001-"Nombre archivo"'/ name='Descripcion_Tarea'></td>
		    </tr>
		    <tr>
				<td colspan='5'><?php echo $lang['DESCRIPCION']; ?></td>
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
			<td colspan="4"><a href="../../Controller/iteracionesController.php?accion=Modificar&idIncidencia=<?php echo $row['idIncid'];?>&nIteracion=<?echo $row['nIteracion'];?>"><input type="button" name="Modificar" value="Modificar"></a></td>
		</tr> 
	</table>
	<?php } ?>
</form>
</div>
<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>