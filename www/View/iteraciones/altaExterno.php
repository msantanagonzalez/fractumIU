<?php
	$userType="externo";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	$idIncid=$_REQUEST["idIncidencia"];
	$idMaq=$_GET["idMaq"];
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerExterno"><a><?= i18n("- NUEVA ITERACION DE EMPLEADO EXTERNO -") ?></a></h1>
<br>
<form name='FormAltaIteracion' onsubmit= "return comprobarAltaIteracion()" action='../../Controller/iteracionesController.php' method='POST'>
	<div style='height:350px;width:auto;overflow-y: scroll;'>
	<input type="hidden" class="text" name="idMaq" value='<?php $idMaq ?>'/>
	<input type="hidden" class="text" name="idIncid" value='<?php echo $idIncid; ?>'>
	<input type="hidden" class="text" name="nIteracion" value="NULL"/>
	<input type='hidden' class="text" name='estadoItera' value='1'>

		<table class='default'>
			<tr>
				<td><?= i18n("ID Incidencia:") ?></td>
				<td><input id="idIncid"  type='text' name='idIncid' value='<?php echo $idIncid; ?>' disabled ></td>
			</tr>
				
			<tr>
				<td><?= i18n("Fecha Apertura:") ?></td>
				<td><input readonly="readonly" required title="Es necesario introducir una fecha de inicio" id="fechaCreacion" type='date' name='fechaIter' value='<?php echo date('Y-m-d');?>'></td>
				<td><?= i18n("Hora Inicio:") ?></td> 
				<td><input readonly="readonly" name="hInicio" id="horaInicio" type='time' class='text' value='<?php echo  date('h:i:s'); ?>'> </td>
			<!--	<td>"Hora Fin:"</td>  -->
				<td><input type="hidden" name="hFin" id="horaFin" type='time' class='text' value='<?php echo date('h:i:s', strtotime('+26 hour')); ?>'> </td>
			</tr>
			<tr>
				<td><?= i18n("Estado Iteración:") ?></td>
			    <td><input id="estadoIteracion" type='text' value='Abierta' disabled></td>
				<td><?= i18n("Coste Trabajo:") ?></td>
			    <td><input required title="Por favor introduzca el coste de la operacion" name="costeIter" id="coste" type='text' ></td>
			</tr>
			<tr>
				<td width="30%"><br><?= i18n("Descripción:") ?></td>
				<td colspan='3' width="75%">
				<textarea required title="Por favor introduzca una breve descripcion" name="descripIter" id="des" style="resize:none; text-align:left;" style="t" rows="4" name='descripcion'></textarea>
				</td>
			</tr>
			
			<tr>
				<td><?= i18n("Documentación:") ?></td>
			</tr>
			<tr>
				<td colspan='4'><input type='file' name='docIteracion' id='docIteracion'></td>
			</tr>
		</table>
	</div>
	<table>
		<tr> 
			<td width='25%'><input type='submit' name='accion' value='GUARDAR TRABAJO'></a> </td>
			<td width='25%'><input type='submit' name='accion' value='CERRAR'></a></td>
			<td width='25%'><input type='submit' name='accion' value='altaIteracion'></a></td>
		</tr>
	</table>
</form>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>