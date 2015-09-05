<?php
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<?php
	$iData = $_SESSION['consultaIncidencia'];
	$hasServicios = $_SESSION['consultaServicios'];
	$empresas = $_SESSION['listaEmpresasJefe'];
 ?>
<h1 id="headerJefe"><a><i><?= i18n("INCIDENCIA") ?> <?php echo $iData[0][0]; ?> </i></a></h1>
<div>
	<form name="formModificarIncidencia" onsubmit="return comprobarModificarIncidenciaJefe()" method="POST" action="../../Controller/incidenciasController.php">
			<input type="hidden" class="text" name="idIncidencia" value="<?php echo $iData[0][0]; ?>"/>
			<input type="hidden" class="text" name="dniApertura" value="<?php echo $iData[0][4]; ?>"/>
			<input type="hidden" class="text" name="idMaquina" value="<?php echo $iData[0][5]; ?>"/>
			<input type="hidden" class="text" name='descripcion' value="<?php echo $iData[0][8];?>"/>
			<input type="hidden" class="text" name='cifEmpr' value="<?php echo $iData[0][9];?>"/>

		<table class="default">
			<tr>
				<td width="25%"><?= i18n("Apertura:") ?> </td>
				<td width="25%"><input type="text" class="text" disabled value="<?php echo $iData[0][4]; ?>"/></td>
				<td width="25%"><?= i18n("Responsable:") ?></td>
				<td width="25%">
					<select required title="Debe seleccionar a un responsable" name="dniResponsable" id="dniResponsable">
						<option value='<?php echo $iData[0][3];; ?>' hidden selected><?php echo $iData[0][3]; ?></option>
						<?php
						$rows = $_SESSION["listaInternosJefe"];
						foreach ($rows as $row){ ?>
						<option value="<?php echo $row[0];?>"><?php echo $row[0]." - ".$row[1];?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td width="25%"><?= i18n("Fecha Apertura:") ?></td>
				<td width="25%"><input title="Debe insertar una fecha de Apertura" id="fechaApertura" type="date" class="text" name="fechaApertura" value="<?php echo $iData[0][1]; ?>" required/></td>
				<td width="25%"><?= i18n("Fecha Cierre:") ?></td>
				<td width="25%"><input title="Debe insertar una fecha de cierre" id="fechaCierre" type="date" class="text" name="fechaCierre" value="<?php echo $iData[0][2]; ?>" required/></td>
			</tr>
			<tr>
				<td><?= i18n("Estado:") ?></td>
				<td>
					<select title="Seleccione o no una opcion" required name='estadoIncidencia'>
						<option value='<?php echo $iData[0][6]; ?>' hidden selected><?php echo $iData[0][6]; ?></option>
						<?php
						if($iData[0][6] == 'Programada'){
						?>
						<option value='Cerrada'>Cerrada</option>
						<?php
						}else{
						?>
						<option value='Derivada'>Derivada</option>
						<option value='Cerrada'>Cerrada</option>
						<?php
						}
						?>


					</select>
				</td>
				<td><?= i18n("Empresa:") ?></td>
				<td>
					<select required name='cifEmpr'>
						<option title="Debe seleccionar una empresa" value="" selected>-</option>
						<?php foreach ($empresas as $key){
							if($key['cifEmpr'] != 'DEFAULT'){
							?>
								<option value='<?php echo $key['cifEmpr']; ?>'><?php echo $key['cifEmpr']; ?></option>
							<?php
							}
						}?>
					</select>
				<td>
			</tr>
			<tr>
				<td><?= i18n("Máquina:") ?></td>
				<td>
					<select disabled>
					  	<option value='<?php echo $iData[0][5]; ?>' selected><?php echo $iData[0][5]; ?></option>
					</select>
				 </td>
				 <td><?= i18n("Servicios:") ?></td>
 				<td>
 					<?php
 					if($hasServicios){
 						?>
 							<input type="checkbox" checked disabled/>
 						<?php
 					}else{
 						?>
 							<input type="checkbox" disabled/>
 						<?php
 					}
 					?>
 				</td>
			</tr>
			<tr>
				<td width="25%"><br><?= i18n("Descripción:") ?></td>
				<td colspan='3' width="75%">
					<textarea  style="resize:none; text-align:left;" style="t" rows="4" disabled>
					<?php echo $iData[0][8];?>
					</textarea>
				</td>
			</tr>
		</table>

	<table class="default">
		<tr>
			<td colspan="4"><input type="submit" name="accion" value="Modificado"></td>
		</tr>
	</table>
	</form>
</div>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
