<?php
	require_once("../structure/header.php");
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerInterno"><a><i><?= i18n("NUEVA INCIDENCIA") ?></i></a></h1>
<form name='FormAltaIncidencia' onsubmit="return comprobarAltaIncidenciaInterno()" action='../../Controller/incidenciasController.php' method='POST'>
	<input type="hidden" class="text" name="idIncidencia" value="id0"/>
	<input type="hidden" class="text" name="derivada" value="0"/>
	<input type='hidden' class='text' name="dniApertura" value='<?php echo $_SESSION['dni']; ?>'/>
	<input id="dniResponsable" type='hidden' class='text' name='dniResponsable' value='<?php echo $_SESSION['dni']; ?>'/>
		<table class='default'>
		   	<tr>
				<td><?= i18n("Apertura:") ?></td>
				<td><input type='text' class='text' disabled value='<?php echo $_SESSION['dni']; ?>'/></td>
				<td><?= i18n("Responsable:") ?></td>
				<td><input id="dniResponsable" type='text' disabled class='text' value='<?php echo $_SESSION['dni']; ?>'/></td>
			</tr>
			<tr>
				<td><?= i18n("Fecha Apertura:") ?></td>
				<td><input title="Se necesita una fecha de apertura" id="fechaApertura" type='date' name='fechaApertura' value='' required/></td>
				<td><?= i18n("Fecha Cierre:") ?></td>
				<td><input title="Se necesita una fecha de Cierre" id="fechaCierre" type='date' name='fechaCierre' value='' required/></td>
			</tr>	
			<tr>
				<td><?= i18n("Estado:") ?></td>
				<td>
					<select required title="Debe seleccionar un estado para esta incidencia" name='estadoIncidencia' >
						<<option value="" selected>-</option>
						<option value='Abierta'><?= i18n("Abierta") ?></option>
					  	<option value='Programada'><?= i18n("Programada") ?></option>
					</select> 		
				</td>
				<td><?= i18n("Máquina:") ?></td>
				<td>
					<select required title="Debe seleccionar una maquina" name='idMaquina'>
						  <option value="" selected>-</option>
						  <option value='maq1'>maq1</option>
						  <option value='maq2'>maq2</option>
					</select> 		
				 </td>
			</tr>
			<tr>
				<td width="25%"><br><?= i18n("Descripción:") ?></td>
				<td colspan='3' width="75%">
					<textarea id="des" style="resize:none; text-align:left;" style="t" rows="4" name='descripcion'></textarea>
				</td>
			</tr>
		</table>
		<table>
			<tr> 
				<th width="20%">
				</th>
				<th width="40%">
					<input type='submit' name='accion' value='Alta'>
				</th>
				<th width="20%">
				</th>
			</tr>
	</table>
</form>

<?php
	require_once("../structure/footer.php");
?>