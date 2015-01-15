<?php
	$userType="interno";
	require_once("../structure/header.php");
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerInterno"><a><i>NUEVA INCIDENCIA</i></a></h1>
<form name='FormAltaIncidencia' onsubmit="return comprobarAltaIncidenciaInterno()" action='../../Controller/incidenciasController.php' method='POST'>
	<input type="hidden" class="text" name="idIncidencia" value="id0"/>
	<input type="hidden" class="text" name="derivada" value="0"/>
	<input type='hidden' class='text' name="dniApertura" value='<?php echo $_SESSION['dni']; ?>'/>
		<table class='default'>
		   	<tr>
				<td>Apertura:</td>
				<td><input type='text' class='text' disabled value='<?php echo $_SESSION['dni']; ?>'/></td>
				<td>Responsable:</td>
				<td><input id="dniResponsable" type='text' class='text' name='dniResponsable' value=''/></td>
			</tr>
			<tr>
				<td>Fecha Apertura:</td>
				<td><input id="fechaApertura" type='date' name='fechaApertura' value=''></td>
				<td>Fecha Cierre:</td>
				<td><input id="fechaCierre" type='date' name='fechaCierre' value=''></td>
			</tr>	
			<tr>
				<td>Estado:</td>
				<td>
					<select name='estadoIncidencia'>
						<option value='NULL' selected>-</option>
						<option value='Abierta'>Abierta</option>
					  	<option value='Programada'>Programada</option>
					</select> 		
				</td>
				<td>Maquina:</td>
				<td>
					<select name='idMaquina'>
						  <option value='NULL' selected>-</option>
						  <option value='maq1'>maq1</option>
						  <option value='maq2'>maq2</option>
					</select> 		
				 </td>
			</tr>
			<tr>
				<td width="25%"><br>Descripci&oacute;n:</td>
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