<?php
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerInterno"><a><i><?php echo $lang['NUEVA_INCIDENCIA']; ?></i></a></h1>
<form name='FormAltaIncidencia' onsubmit="return comprobarAltaIncidenciaInterno()" action='../../Controller/incidenciasController.php' method='POST' enctype="multipart/form-data">
	<input type="hidden" class="text" name="idIncidencia" value='NULL'/>
	<input type="hidden" class="text" name="cifEmpr" value='K7885586J'/>
	<input type="hidden" class="text" name="derivada" value="0"/>
	<input type='hidden' class='text' name="dniApertura" value='<?php echo $_SESSION['dni']; ?>'/>
	<input id="dniResponsable" type='hidden' class='text' name='dniResponsable' value='<?php echo $_SESSION['dni']; ?>'/>
		<table class='default'>
		   	<tr>
				<td><?php echo $lang['APERTURA']; ?></td>
				<td><input type='text' class='text' disabled value='<?php echo $_SESSION['dni']; ?>'/></td>
				<td><?php echo $lang['RESPONSABLE']; ?></td>
				<td><input id="dniResponsable" type='text' disabled class='text' value='<?php echo $_SESSION['dni']; ?>'/></td>
			</tr>
			<tr>
				<td><?php echo $lang['FECHA_APERTURA']; ?></td>
				<td><input title="Se necesita una fecha de apertura" id="fechaApertura" type='date' name='fechaApertura' value='' required/></td>
				<td><?php echo $lang['FECHA_CIERRE']; ?></td>
				<td><input title="Se necesita una fecha de Cierre" id="fechaCierre" type='date' name='fechaCierre' value='' required/></td>
			</tr>
			<tr>
				<td><?php echo $lang['ESTADO']; ?></td>
				<td>
					<select required title="Debe seleccionar un estado para esta incidencia" name='estadoIncidencia' >
						<<option value="" selected>		-</option>
						<option value='Abierta'><?php echo $lang['ABIERTA']; ?></option>
						<option value='Pendiente Derivar'><?php echo $lang['PENDIENTE_DE_DERIVAR']; ?></option>
					</select>
				</td>
				<td><?php echo $lang['MAQUINA']; ?></td>
				<td>
					<select required title="Debe seleccionar una maquina" name='idMaquina'>
						  <option value="" required>-</option>
						  <?php
								$rows = $_SESSION["listaMaquina"];
								foreach ($rows as $row){ ?>
								<option value="<?php echo $row[0];?>"><?php echo $row[0]." - ".$row[1];?></option>
						  <?php } ?>
					</select>
				 </td>
			</tr>
			<tr>
				<td width="25%%"><br><?php echo $lang['DESCRIPCION']; ?></td>
				<td colspan='3' width="75%">
					<textarea id="des" style="resize:none; text-align:left;" style="t" rows="4" name='descripIncid'></textarea>
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
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
