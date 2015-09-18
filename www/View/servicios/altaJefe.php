<?php
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerJefe"><a><i><?= i18n("ALTA SERVICIO") ?></i></a></h1>
<form name='FormAltaServicio' onsubmit="return altaServicioJefe()" method="POST" action="../../Controller/serviciosController.php">
	<table class="default">
		<tr>
			<td width="25%"><?= i18n("CIF Empresa:") ?></td>
			<td width="25%">
				<select title="Seleccione una de las empresas" required name="cifEmpr">
					<option value="" selected=""> - </option>
					<?php $resul2 = $_SESSION["listaEmpresas"]; foreach ($resul2 as $empresa){
						if($empresa['cifEmpr'] != 'DEFAULT'){
						?>
						<option value="<?php echo $empresa['cifEmpr'];?>"><?php echo $empresa['cifEmpr']." - ".$empresa['nomEmpr'];?></option>
						<?php
						}
					} ?>
				</select>
			</td>
			<td width="25%"><?= i18n("Periodicidad:") ?></td>
			<td width="25%">
				<select title="Seleccione periodicidad del mantenimiento" required id="periodicidad" name="periodicidad">
					<option value="" selected>-</option>
					<option value="1 mes">1 mes</option>
					<option value="3 meses">3 meses</option>
					<option value="6 meses">6 meses</option>
					<option value="12 meses">12 meses</option>
				</select>
		</tr>
		<tr>
			<td width="25%">#ID <?= i18n("Servicio:") ?></td>
			<td width="25%"><input id="idServ" type="text" class="text" name="idServ" value=""/></td>
			<td width="25%">#ID <?= i18n("Máquina:") ?></td>
			<td width="25%">
				<select title="Seleccione una maquina" required name="idMaq" id="idMaq">
					<option value="" selected>-</option>
					<?php $rows = $_SESSION["maqsJefe"]; foreach ($rows as $row){ ?>
					<option value="<?php echo $row['idMaq'];?>"><?php echo $row['idMaq']." - ".$row['nomMaq'];?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td width="25%"><?= i18n("Fecha Apertura:") ?> </td>
			<td width="25%"><input readonly="readonly" title="debe seleccionar una fecha de apertura" required id="fechaInicio" type="date" class="text" name="fInicioSer" value='<?php echo date('Y-m-d');?>' /></td>
			<td width="25%"><?= i18n("Fecha Cierre:") ?> </td>
			<td width="25%"> <input title="debe seleccionar una fecha de cierre" required type="date" class="text" name="fFinSer" value="" /></td>
		</tr>
		<tr>
			<td width="25%"><?= i18n("Coste:") ?></td>
			<td width="25%"><input id="coste" type="text" class="text" name="costeSer" placeholder="€/Mes" /></td>
			<td width="25%">&nbsp;</td>
			<td width="25%">&nbsp;</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td width="25%"><br><?= i18n("Descripción:") ?></td>
			<td colspan='3'width="75%">
				<textarea  id="des" style="resize:none; text-align:left;" style="t" rows="4" name='descripSer'> </textarea>
			</td>
		</tr>
		<tr>
			<td colspan="4"><a href="../../Controller/serviciosController.php?accion=Alta"><input type="submit" name="accion" value="Alta"/></a></td>
		</tr>
	</table>
</form>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
