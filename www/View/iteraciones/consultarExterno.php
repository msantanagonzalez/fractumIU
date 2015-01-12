<?php
	$userType="externo";
	require_once("../structure/header.php");
?>

<h1 id='headerExterno'><a>- DETALLES TRABAJO -</a></h1>


	<div style='height:350px;width:auto;overflow-y: scroll;'>
	<form method="POST" action="../../Controller/iteracionesController.php">
	<?php $rows = $_SESSION['consultaIteracion']; ?>
		<table class='default'>
			<tr>
				<td>Identificador Incidencia:</td>
				<td><input type='text' disabled name="numeroIncidencia" value="<?php echo $row['idIncid']; ?>"></td>
				<td>Numero Iteracion:</td>
		        <td><input type='text' disabled name="numeroTrabajo" value="<?php echo $row['nIteracion']; ?>"></td>
			</tr>

			<tr>
				
		        <td>Coste:</td>
		        <td><input type='text'  name="coste" value="<?php echo $row['costeIter']; ?>"></td>
		        <td>Fecha Inicio:</td>
		        <td><input type='date' disabled value="<?php echo $row['fechaIter']; ?>"></td>
		 
		    </tr>
			<br>
		    <tr>
		        <td>Hora Inicio:</td>
		        <td><input type='time' disabled value="<?php echo $row['hInicio']; ?>"></td>
		        <td>Hora Fin:</td>
		        <td><input type='time'  value="<?php echo $row['hFin']; ?>"></td>
				<td>Estado Iteracion</td>
		        <td><input type='time'  value="<?php echo $row['estadoItera']; ?>"></td>
		  </tr>
		    </tr>
				<td>Documentacion:</td>
		        <td colspan='3'><input type='text' disabled class='text' name="documentacion" value='#001-"Nombre archivo"'/ name='Descripcion_Tarea'></td>
		    </tr>
		    <tr>
				<td colspan='5'>Descripcion:</td>
			</tr>
			</tr>
				<td colspan='5'>
					<textarea style="resize:none" class="text" rows="5" name='descripcionHistoricoIncidencia' disabled>
					"<?php echo $row['descripIter']; ?>"
					</textarea>
				</td>
		    </tr>
		</table>
 	
    <br>
    <table>
		<tr>
		<td width='25%'><a href="consultarIncidencia.html"><input type='button' value='Atras'></a></td>
		<td colspan="4"><a href="../../Controller/iteracionesController.php?accion=Modificar&idIncidencia=<?php echo $row['idIncid']; ?>"><input type="submit" name="pModificar" value="Modificar"></a></td>
		</tr> 
	</table>
</form>
</div>
<?php
	require_once("../structure/footer.php");
?>