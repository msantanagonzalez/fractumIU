<?php
	$userType="jefe";
	require_once("../../structure/header.php");
?>
            	<h1 id="headerJefe"><a><i>OPERARIOS INTERNOS</i></a></h1>

            	<table class="default">
                    <tr>
                    	<th width="20%">#ID Int.</th>
                    	<th width="20%">Nombre/Apellidos</th>
                       	<th width="20%">Tel&eacute;fono</th>
                        <th width="20%">&nbsp;</th>
                        <th width="20%">&nbsp;</th>

                    </tr>
                </table>
        
	        		<div style="height:150px;width:auto;overflow-y: scroll;">
						<table class="default">
							<?php
							$resul2 = $_SESSION["listaInternos"];
							foreach ($resul2 as $usuario){
								?>
								<form method="POST" action="../../../Controller/usuariosController.php?dniUsu=<?php echo $usuario['dniUsu'];?>">
									<tr> 
										<td width="20%" name = "dni"><?php echo $usuario['dniUsu']; ?> </td> 
										<td width="20%" name = "nombre"><?php echo $usuario['nomUsu']." ".$usuario['apellUsu']; ?></td> 
										<td width="20%" name = "telefono"><?php echo $usuario['telefOpeInt']; ?> </td> 
										<td width="20%"><input type="submit" value="consultar" name="accion"></td>
										<td width="20%"><input type="submit" value="eliminar" name="accion"></td>
									</tr>
								</form>
							<?php 
							}
							?>
			 			</table>
			 		</div>
				<!--FIN SECCIÓN-->
				<br>
				<!--IINICIO SECCIÓN-->
            	<h1 id="headerJefe"><a><i>OPERARIOS EXTERNOS</i></a></h1>

            	<table class="default">
                    <tr>
                    	<th width="20%">#ID Ext.</th>
                    	<th width="20%">Nombre/Apellidos</th>
                       	<th width="20%">Tel&eacute;fono</th>
                        <th width="20%">Empresa</th>
                        <th width="10%">&nbsp;</th>
                        <th width="10%">&nbsp;</th>
                    </tr>
                </table>
        
        		
	        		<div style="height:150px;width:auto;overflow-y: scroll;">
						<table class="default">
							<?php
							$resul2 = $_SESSION["listaExternos"];
							foreach ($resul2 as $usuario){
								?>
								<form method="POST" action="../../../Controller/usuariosController.php?dniUsu=<?php echo $usuario['dniUsu'];?>">
									<tr> 
										<td width="20%" name = "dni"><?php echo $usuario['dniUsu']; ?> </td> 
										<td width="20%" name = "nombre"><?php echo $usuario['nomUsu']." ".$usuario['apellUsu']; ?></td> 
										<td width="20%" name = "telefono"><?php echo $usuario['telefEmpr']; ?> </td> 
										<td width="20%" name = "telefono"><?php echo $usuario['nomEmpr']; ?> </td> 
										<td width="10%"><input type="submit" value="consultar" name="accion"></td>
										<td width="10%"><input type="submit" value="eliminar" name="accion"></td>
									</tr>
								</form>
							<?php 
							}
							?>
			 			</table>
			 		</div>

				<table class="default">
			 		<tr>
						<td colspan="2"><a href="altaExterno.php"><input type="button" name="piAlta" value="Alta Externo"/></a></td>
						<td colspan="2"><a href="altaInterno.php"><input type="button" name="piAlta" value="Alta Interno"/></a></td>
					</tr>
			 	</table>
				
<?php
	require_once("../../structure/footer.php");
?>