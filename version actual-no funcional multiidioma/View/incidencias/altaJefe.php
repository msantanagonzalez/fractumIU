<?php
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>
<h1 id="headerJefe"><a><i><?php echo $lang['NUEVA_INCIDENCIA']; ?></i></a></h1>
<form name='FormAltaIncidencia' onsubmit="return comprobarAltaIncidenciaJefe()" action='../../Controller/incidenciasController.php' method='POST'>
	<input type="hidden" class="text" name="idIncidencia" value="NULL"/>
	<input type="hidden" class="text" name="derivada" value="0"/>
	<input type='hidden' class='text' name="dniApertura" value='<?php echo $_SESSION['dni']; ?>'/>
	<input type='hidden' class='text' name="cifEmpr" value='DEFAULT'/>
		<table class='default'>
		   	<tr>
				<td><?php echo $lang['APERTURA']; ?></td>
				<td><input type='text' class='text' disabled value='<?php echo $_SESSION['dni']; ?>'/></td>
				<td><?php echo $lang['RESPONSABLE']; ?></td>
				<td>
					<select required title="Debe seleccionar a un responsable" name="dniResponsable" id="dniResponsable">
						<option value="" selected>-</option>
						<?php
						$rows = $_SESSION["consultaResponsables"];
						foreach ($rows as $row){ ?>
						<option value="<?php echo $row[0];?>"><?php echo $row[0]." - ".$row[1];?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><?php echo $lang['FECHA_APERTURA']; ?></td>
				<td><input readonly="readonly" title="Debe seleccionar una fecha de apertura" type='date' name='fechaApertura' value='<?php echo date('Y-m-d');?>' required/></td>
				<td><?php echo $lang['FECHA_CIERRE']; ?></td>
				<td><input title="Debe seleccionar una fecha de cierre" type="date" name='fechaCierre' value='' required/></td>
			</tr>
			<tr>
				<td><?php echo $lang['ESTADO']; ?></td>
				<td>
					<select required name='estadoIncidencia'>
					  	<option value='Programada' selected=""><?php echo $lang['PROGRAMADA']; ?></option>
					</select>
				</td>
				<td><?php echo $lang['MAQUINA']; ?></td>
				<td>
					<select required title="Debe seleccionar una maquina" name="idMaquina">
						<option value="" selected>-</option>
						<?php $rows = $_SESSION["listaMaquina"]; foreach ($rows as $row){ ?>
						<option value="<?php echo $row['idMaq'];?>"><?php echo $row['idMaq']." - ".$row['nomMaq'];?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td width="25%"><br><?php echo $lang['DESCRIPCION']; ?></td>
				<td colspan='3'width="75%">
					<textarea required title="Por favor redacte una breve descripcion" id="des" style="resize:none; text-align:left;" style="t" rows="4" name='descripIncid'>
					</textarea>
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
