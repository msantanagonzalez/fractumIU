<?php
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	require '../crearMensaje.php';
?>
            	<h1 id="headerJefe"><a><i><?php echo $lang['OPERARIOS_INTERNOS_BIG']; ?></i></a></h1>

            	<table class="default">
                    <tr>
                    	<th width="20%">#ID <?php echo $lang['INT']; ?></th>
                    	<th width="20%"><?php echo $lang['NOMBRE_APELLIDOS']; ?></th>
                       	<th width="20%"><?php echo $lang['TELEFONO']; ?></th>
                        <th width="20%">&nbsp;</th>
                        <th width="20%">&nbsp;</th>

                    </tr>
                </table>

	        		<div style="height:150px;width:auto;overflow-y: scroll;">
						<table class="default">
							<?php
							$resul2 = $_SESSION["listaInternos"];
							if (empty($resul2)) {
							?>
								<div class="alert alert-warning" role="alert">
								<?php echo $lang['INFO_NO_OP_INTERNO']; ?>
								</div>
							<?php
							}
							else{
								foreach ($resul2 as $usuario){
									?>
										<tr>
											<td width="20%" name = "dni"><?php echo $usuario['dniUsu']; ?> </td>
											<td width="20%" name = "nombre"><?php echo $usuario['nomUsu']." ".$usuario['apellUsu']; ?></td>
											<td width="20%" name = "telefono"><?php echo $usuario['telefOpeInt']; ?> </td>
											<td width="20%"><input type="button" value="Consulta" onclick="window.location.href='../../Controller/usuariosController.php?accion=consultar&dniUsu=<?php echo $usuario['dniUsu'];?>'"></td>
											<td width="20%"><input type="button" value="Eliminar" onclick="window.location.href='../../Controller/usuariosController.php?accion=eliminar&dniUsu=<?php echo $usuario['dniUsu'];?>'"></td>
										</tr>
								<?php
								}
							}
							?>
			 			</table>
			 		</div>
				<!--FIN SECCIÓN-->
				<br>
				<!--IINICIO SECCIÓN-->
            	<h1 id="headerJefe"><a><i><?php echo $lang['OPERARIOS_EXTERNOS_BIG']; ?></i></a></h1>

            	<table class="default">
                    <tr>
                    	<th width="20%">#ID <?php echo $lang['EXT']; ?><?php echo $lang['ID']; ?></th>
                    	<th width="21%"><?php echo $lang['NOMBRE_APELLIDOS']; ?></th>
                       	<th width="16%"><?php echo $lang['TELEFONO']; ?></th>
                        <th width="20%"><?php echo $lang['EMPRESA']; ?></th>
                        <th width="10%">&nbsp;</th>
                        <th width="10%">&nbsp;</th>
                    </tr>
                </table>


	        		<div style="height:150px;width:auto;overflow-y: scroll;">
						<table class="default">
							<?php
							$resul2 = $_SESSION["listaExternos"];
							if (empty($resul2)) {
							?>
								<div class="alert alert-warning" role="alert">
								<?= i18n("| INFO |- No hay usuarios externos para listar ") ?>
								</div>
							<?php
							}
							else{
								foreach ($resul2 as $usuario){
									?>
										<tr>
											<td width="20%" name = "dni"><?php echo $usuario['dniUsu']; ?> </td>
											<td width="20%" name = "nombre"><?php echo $usuario['nomUsu']." ".$usuario['apellUsu']; ?></td>
											<td width="20%" name = "telefono"><?php echo $usuario['telefEmpr']; ?> </td>
											<td width="17%" name = "empresa"><?php echo $usuario['nomEmpr']; ?> </td>
											<td width="7%"><input type="button" value="Consulta" onclick="window.location.href='../../Controller/usuariosController.php?accion=consultar&dniUsu=<?php echo $usuario['dniUsu'];?>'"></td>
											<td width="7%"><input type="button" value="Eliminar" onclick="window.location.href='../../Controller/usuariosController.php?accion=eliminar&dniUsu=<?php echo $usuario['dniUsu'];?>'"></td>
										</tr>
								<?php
								}
							}
							?>
			 			</table>
			 		</div>
					<br>
				<table class="default">
			 		<tr>
						<td colspan="2"><a href="../../Controller/usuariosController.php?accion=accesoAltaExterno"><input type="submit" name="piAlta" value="Alta Externo"/></a></td>
						<td colspan="2"><a href="altaInternoJefe.php"><input type="submit" name="piAlta" value="Alta Interno"/></a></td>
					</tr>
			 	</table>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
