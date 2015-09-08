<?php
	$userType="externo";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	$idIncid=$_SESSION["idIncid"];
	$nIteracion=$_SESSION["nIteracion"];
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerExterno"><a><?= i18n("- NUEVA ITERACION DE EMPLEADO EXTERNO -") ?></a></h1>
<br>
<form name='FormAltaIteracion' onsubmit= "return comprobarAltaIteracion()" action='../../Controller/iteracionesController.php' method='POST'>
	<div style='height:350px;width:auto;overflow-y: scroll;'>
		<table class='default'>
			<tr>
				<td><?= i18n("ID Incidencia:") ?></td>
				<td><input id="idIncid" type='text'  value='<?php echo $idIncid; ?>' disabled > </td>
				<td><?= i18n("Número Iteración:") ?></td>
				<td><input id="nIteracion" type='text' value='<?php echo $nIteracion; ?>' disabled ></td>
			</tr>
				
			<tr>
				<td><?= i18n("Fecha Apertura:") ?></td>
				<td><input readonly="readonly" required title="Es necesario introducir una fecha de inicio" id="fechaCreacion" type='date' name='FechaCreacion' value='<?php echo date('Y/m/d');?>'></td>
				<td><?= i18n("Hora Inicio:") ?></td> 
				<td><input readonly="readonly" id="horaInicio" type='time' class='text' value='<?php echo  date('h:i:s'); ?>'> </td>
			<!--	<td>"Hora Fin:"</td>  -->
				<td><input type="hidden" id="horaFin" type='time' class='text' value='<?php echo date('h:i:s', strtotime('+26 hour')); ?>'> </td>
			</tr>
			<tr>
				<td><?= i18n("Estado Iteración:") ?></td>
			    <td><input id="estadoItera" type='text' ></td>
				<td><?= i18n("Coste Trabajo:") ?></td>
			    <td><input required title="por favor introduzca el coste de la operacion" id="coste" type='text' ></td>
			</tr>
			<tr>
				<td width="30%"><br><?= i18n("Descripción:") ?></td>
				<td colspan='3' width="75%">
				<textarea required title="por favor introduzca una breve descripcion" id="des" style="resize:none; text-align:left;" style="t" rows="4" name='descripcion'></textarea>
				</td>
			</tr>
			
			<tr>
				<td><?= i18n("Documentación:") ?></td>
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