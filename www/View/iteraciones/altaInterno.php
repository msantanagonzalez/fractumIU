<?php
	$userType="interno";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	$idIncid=$_REQUEST['idIncidencia'];
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerInterno"><a><?= i18n("- NUEVA ITERACION DE EMPLEADO INTERNO -") ?></a></h1>
<br>
<form name='FormAltaIteracion' onsubmit= "return comprobarAltaIteracion()" action='../../Controller/iteracionesController.php' method='POST'>
	<input type="hidden" class="text" name="idIncid" value='<?php echo $idIncid; ?>'>
	<input type="hidden" class="text" name="nIteracion" value="NULL"/>
	<input type='hidden' class="text" name='estadoItera' value='1'>
	
	
	<div style='height:350px;width:auto;overflow-y: scroll;'>
		<table class='default'>
			<tr>
				<td><?= i18n("ID Incidencia:") ?></td>
				<td><input id="idIncid"  type='text' name='idIncid' value='<?php echo $idIncid; ?>' disabled ></td>
				<td><?= i18n("ID Usuario:") ?></td>
				<td><input   type='text'  value='<?php echo $_SESSION['dni']; ?>' disabled ></td>
			</tr>
				
			<tr>
				<td><?= i18n("Fecha Apertura:") ?></td>
				<td><input required title="Es necesario introducir una fecha de inicio" id="fechaIter" type='date' name='fechaIter' value='<?php echo date('Y/m/d');?>'/></td>
				<td><?= i18n("Hora Inicio:") ?></td> 
				<td><input  title="Es necesario introducir una hora de inicio" id="hInicio" type='time' name='hInicio' class='text' value='<?php echo  date('h:i:s'); ?>'> </td>
				<td><?= i18n("Hora Fin:") ?></td> 
				<td><input  title="es necesario introducir una hora de fin" id="hFin" type='time' name='hFin' class='text' value='<?php echo date('h:i:s', strtotime('+25 hour')); ?>'> </td>
			</tr>
			<tr>
				<td><?= i18n("Estado Iteración:") ?></td>
			    <td><input id="estadoItera" type='text' value='Abierta' disabled></td>
				<td><?= i18n("Coste Trabajo:") ?></td>
			    <td><input id=" costeIter" type='text' name='costeIter' value=''></td>
			</tr>
			<tr>
				<td width="30%"><br><?= i18n("Descripción:") ?></td>
				<td colspan='3' width="75%">
				<textarea id="des" style="resize:none; text-align:left;" style="t" rows="4" name='descripIter'></textarea>
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
			<td width='25%'><input type='submit' name='accion' value='CERRAR'></td>
			<td width='25%'><input type='submit' name='accion' value='altaIteracion'></td>
			
		</tr>
	</table>
</form>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>