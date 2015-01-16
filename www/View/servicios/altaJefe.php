<?php
	$userType="jefe";
	require_once("../structure/header.php");
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerJefe"><a><i><?= i18n("ALTA SERVICIO") ?></i></a></h1>
<form name='FormAltaServicio' onsubmit="return altaServicioJefe()" method="POST" action="../../Controller/serviciosController.php">
	<table class="default">
		<tr> 
			<td width="25%"><?= i18n("CIF Empresa:") ?></td> 
			<td width="25%">
			<select name="cifEmpr">
			  <option value="NULL">----</option>
				<?php
				$resul2 = $_SESSION["listaEmpresas"];
					foreach ($resul2 as $empresa){
				?>		
					  <option value="<?php echo $empresa['cifEmpr'];?>"><?php echo $empresa['cifEmpr']."-".$empresa['nomEmpr'];?></option>
				<?php
					}
				?>	
			</select>
			</td> 
			<td width="25%"><?= i18n("Periodicidad:") ?></td> 
			<td width="25%"> <input  id="periodicidad" type="text" class="text" name="periodicidad" value=""/></td>
		</tr>
		<tr> 
			<td width="25%">#ID <?= i18n("Servicio:") ?></td> 
			<td width="25%"><input id="idServ" type="text" class="text" name="idServ" value=""/></td> 
			<td width="25%">#ID <?= i18n("Máquina:") ?></td> 
			<td width="25%"> <input  id="idMaq" type="text" class="text" name="idMaq" value="" /></td>
		</tr>
		<tr> 
			<td width="25%"><?= i18n("Fecha Apertura:") ?> </td> 
			<td width="25%"><input  id="fechaInicio" type="text" class="text" name="fInicioSer" value="" /></td> 
			<td width="25%"><?= i18n("Fecha Cierre:") ?> </td> 
			<td width="25%"> <input id="fechaFin" type="text" class="text" name="fFinSer" value="" /></td>
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
				<textarea  id="des" style="resize:none; text-align:left;" style="t" rows="4" name='descripSer'>Mantenimiento completo, coste de piezas no incluido.
				</textarea>
			</td>
		</tr>
		<tr>
			<td colspan="4"><a href="../../Controller/serviciosController.php?accion=Alta"><input type="submit" name="accion" value="Alta"/></a></td>
		</tr> 
	</table>
</form>

<?php
	require_once("../structure/footer.php");
?>