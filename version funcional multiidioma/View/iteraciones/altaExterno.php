<?php
	$userType="externo";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	$idIncid=$_SESSION["idIncid"];
	$nIteracion=$_SESSION["nIteracion"];
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerExterno"><a><?php echo $lang['NUEVA_ITERACION_EMPLEADO_EXTERNO']; ?></a></h1>
<br>
<form name='FormAltaIteracion' onsubmit= "return comprobarAltaIteracion()" action='../../Controller/iteracionesController.php' method='POST'>
	<div style='height:350px;width:auto;overflow-y: scroll;'>
		<table class='default'>
			<tr>
				<td><?php echo $lang['ID_INCIDENCIA']; ?></td>
				<td><input id="idIncid" type='text'  value='<?php echo $idIncid; ?>' disabled > </td>
				<td><?php echo $lang['NUMERO_ITERACION']; ?></td>
				<td><input id="nIteracion" type='text' value='<?php echo $nIteracion; ?>' disabled ></td>
			</tr>
				
			<tr>
				<td><?php echo $lang['FECHA_APERTURA']; ?></td>
				<td><input required title="Es necesario introducir una fecha de inicio" id="fechaCreacion" type='date' name='FechaCreacion' value='<?php echo date('Y/m/d');?>'></td>
				<td><?php echo $lang['HORA_INICIO']; ?></td> 
				<td><input id="horaInicio" type='time' class='text' value='<?php echo  date('h:i:s'); ?>'> </td>
				<td><?php echo $lang['HORA_FIN']; ?></td> 
				<td><input id="horaFin" type='time' class='text' value='<?php echo date('h:i:s', strtotime('+25 hour')); ?>'> </td>
			</tr>
			<tr>
				<td><?php echo $lang['ESTADO_ITERACION']; ?></td>
			    <td><input id="estadoItera" type='text' ></td>
				<td><?php echo $lang['COSTE_TRABAJO']; ?></td>
			    <td><input id="coste" type='text' ></td>
			</tr>
			<tr>
				<td width="30%"><br><?php echo $lang['DESCRIPCION']; ?></td>
				<td colspan='3' width="75%">
				<textarea id="des" style="resize:none; text-align:left;" style="t" rows="4" name='descripcion'></textarea>
				</td>
			</tr>
			
			<tr>
				<td><?php echo $lang['DOCUMENTACION']; ?></td>
			</tr>
			<tr>
				<td colspan='4'><input type='file' name='documentacionTrabajo'></td>
			</tr>
		</table>
	</div>
	<table>
		<tr> 
			<td width='25%'><a href="../../Controller/iteracionesController.php?accion='GUARDAR TRABAJO'"><input type='submit' name='accion' value='GUARDAR TRABAJO'></a> </td>
			<td width='25%'><a href="../../Controller/iteracionesController.php?accion='FINALIZAR TRABAJO'"><input type='submit' name='accion' value='CERRAR'></a></td>
			<td width='25%'><a href="../../Controller/iteracionesController.php?accion='Alta'"><input type='submit' name='accion' value='Alta'></a></td>
		</tr>
	</table>
</form>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>