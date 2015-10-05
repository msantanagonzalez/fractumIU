<?php
  include_once '../../Controller/common.php';
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<?php
	$iData = $_SESSION['consultaIncidencia'];
	$hasServicios = $_SESSION['consultaServicios'];
	$empresas = $_SESSION['listaEmpresasJefe'];
 ?>
<h1 id="headerJefe"><a><i><?php echo $lang['INCIDENCIA_BIG']; ?> <?php echo $iData[0][0]; ?> </i></a></h1>
<div>
	<form name="formModificarIncidencia" onsubmit="return comprobarModificarIncidenciaJefe()" method="POST" action="../../Controller/incidenciasController.php">
			<input type="hidden" class="text" name="idIncidencia" value="<?php echo $iData[0][0]; ?>"/>
			<input type="hidden" class="text" name="dniApertura" value="<?php echo $iData[0][4]; ?>"/>
			<input type="hidden" class="text" name="idMaquina" value="<?php echo $iData[0][5]; ?>"/>
			<input type="hidden" class="text" name='descripcion' value="<?php echo $iData[0][8];?>"/>
			<input type="hidden" class="text" name='cifEmpr' value="<?php echo $iData[0][9];?>"/>
			<input type="hidden" class="text" name='estadoIncidencia' value="<?php echo $iData[0][6];?>"/>

		<table class="default">
			<tr>
				<td width="25%"><?php echo $lang['APERTURA']; ?> </td>
				<td width="25%"><input type="text" class="text" disabled value="<?php echo $iData[0][4]; ?>"/></td>
				<td width="25%"><?php echo $lang['RESPONSABLE']; ?></td>
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
				<td width="25%"><?php echo $lang['FECHA_APERTURA']; ?></td>
				<td width="25%"><input readonly="readonly" title="Debe insertar una fecha de Apertura" id="fechaApertura" type="date" class="text" name="fechaApertura" value="<?php echo $iData[0][1]; ?>" required/></td>

			</tr>
			<tr>
        <?php if($iData[0][6]!='Pendiente Derivar'){?>
				<td><?php echo $lang['ESTADO']; ?></td>
				<td>
					    <select title="Seleccione o no una opcion" required name='estadoIncidencia'>
                            <option hidden selected value='<?php echo $iData[0][6]; ?>'>
                                <?php echo $iData[0][6]; ?>
                            </option>
    						<?php if($iData[0][6] == 'Programada'){?>
    						    <option value='Cerrada'>Cerrada</option>
    						<?php }else{ ?>
    	                        <option value='Cerrada'>Cerrada</option>
    						<?php } ?>
                        </select>
				</td>
        <?php }else{ ?>
            <!-- <input disabled type="text" class="text" name="estadoIncidencia" value="Elige empresa ->>"/> -->
            <td colspan="2"> <a><i>Elige una empresa para derivar ->></i></a> </td>
        <?php } ?>

				<td><?php echo $lang['EMPRESA']; ?></td>
				<td>
					<select required name='cifEmpr'>
						<option title="Debe seleccionar una empresa" value="<?php echo $iData[0][9] ?>" hidden selected>
                            <?php if($iData[0][9]=='DEFAULT'){ echo '-'; }else{ echo $iData[0][9]; }?>
                        </option>
<?php 					if($iData[0][9]!='DEFAULT'){ ?>
						<option value='DEFAULT'>-</option>
<?php 					}
 						foreach ($empresas as $key){
                            if($key['cifEmpr'] != 'DEFAULT' && ($iData[0][9]!=$key['cifEmpr'])){ ?>
                                    <option value='<?php echo $key['cifEmpr']; ?>'><?php echo $key['cifEmpr']; ?></option>
<?php 						}
						} ?>
					</select>
				<td>
			</tr>
			<tr>
				<td><?php echo $lang['MAQUINAS_BIG']; ?></td>
				<td>
					<select disabled>
					  	<option value='<?php echo $iData[0][5]; ?>' selected><?php echo $iData[0][5]; ?></option>
					</select>
				</td>
				<td><?php echo $lang['SERVICIOS_BIG']; ?></td>
 				<td>
<?php				if($hasServicios){ ?>
 						<input type="checkbox" checked disabled/>
<?php 				}else{ ?>
						<input type="checkbox" disabled/>
<?php 				} ?>
 				</td>
			</tr>
			<tr>
				<td width="25%"><br><?php echo $lang['DESCRIPCION']; ?></td>
				<td colspan='3' width="75%"><textarea style="resize:none; text-align:left;" style="t" rows="4" disabled><?php echo $iData[0][8]; ?></textarea></td>
			</tr>
		</table>

		<table class="default">
			<tr>
				<td colspan="4"><button type="submit" name="accion" value="Modificado">Guardar</button></td>
			</tr>
		</table>
	</form>
</div>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
