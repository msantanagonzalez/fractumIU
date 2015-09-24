<?php
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	require_once $_SESSION['cribPath'].'View/messages/messages_ga.php';
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerInterno"><a><i><?= i18n("NUEVA INCIDENCIA") ?></i></a></h1>
<form name='FormAltaIncidencia' onsubmit="return comprobarAltaIncidenciaInterno()" action='../../Controller/incidenciasController.php' method='POST' enctype="multipart/form-data">
	<input type="hidden" class="text" name="idIncidencia" value='NULL'/>
	<input type="hidden" class="text" name="cifEmpr" value='DEFAULT'/>
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
				<td><input readonly="readonly" title="Se necesita una fecha de apertura" id="fechaApertura" type='date' name='fechaApertura' value='<?php echo date('Y-m-d');?>' required/></td>
				 <td><?= i18n("Fecha Cierre:") ?></td>
				 <?php
				 //DA ERROR PORQUE FALTA EL FOR EACH
				  ?>
				 <td><input readonly="readonly" id="fechaCierre" type='date' name='fechaCierre' value="<?php if($rows[0]['estadoIncid']=="Cerrada"){echo 'NULL';}else{echo $rows[0]['fCier'];}  ?>" /></td>

			</tr>
			<tr>
				<td><?= i18n("Estado:") ?></td>
				<td>
					<select required title="Debe seleccionar un estado para esta incidencia" name='estadoIncidencia' >
						<<option value="" selected>		-</option>
						<option value='Abierta'><?= i18n("Abierta") ?></option>
						<option value='Pendiente Derivar'><?= i18n("Pendiente de Derivar") ?></option>
					</select>
				</td>
				<td><?= i18n("Máquina:") ?></td>
				<td>
					<select required title="Debe seleccionar una maquina" name='idMaquina'>
						  <option value="" required>-</option>
						  <?php
								$rows = $_SESSION["maqsJefe"];
								foreach ($rows as $row){ ?>
								<option value="<?php echo $row[0];?>"><?php echo $row[0]." - ".$row[1];?></option>
						  <?php } ?>
					</select>
				 </td>
			</tr>
			<tr>
				<td colspan='1' width="25%"><?= i18n("Descripción:") ?></td>
				<td colspan='3' width="75%"><textarea id="des" style="resize:none; text-align:left;" style="t" rows="4" name='descripIncid'></textarea></td>
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
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
