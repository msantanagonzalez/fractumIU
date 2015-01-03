<?php
	$userType="jefe";
	require_once("../../structure/header.php");
?>
            	<h1 id="headerJefe"><a><i>OPERARIOS INTERNOS</i></a></h1>

            	<table class="default">
                    <tr>
                    	<th width="25%">#ID Int.</th>
                    	<th width="25%">Nombre/Apellidos</th>
                       	<th width="25%">Tel&eacute;fono</th>
                        <th width="13%">&nbsp;</th>
                        <th width="13%">&nbsp;</th>

                    </tr>
                </table>
        
	        		<div style="height:150px;width:auto;overflow-y: scroll;">
						<table class="default">
							<?php
							/**
							 * Tapon emergencia, pensando algo mejor....
							 */
							$resul2 = $_SESSION["usu"];
							while( $usuario = mysql_fetch_array($resul2) ){
								?>
								<form method="POST" action="../../../Controller/usuariosController.php">
									<tr> 
										<td width="25%" name = "dni"><?php echo $usuario['dni']; ?> </td> 
										<td width="25%" name = "nombre"><?php echo $usuario['nomUsu']; echo $usuario['apellUsu']; ?></td> 
										<td width="25%" name = "telefono"><?php echo $usuario['telefOpeInt']; ?> </td> 
										<td width="13%"><input value="consultar" name="accion"></td>
										<td width="13%"><input value="eliminar" name="accion"></td>
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
        
        		<form method="POST" action="">
	        		<div style="height:150px;width:auto;overflow-y: scroll;">
						<table class="default">
							<tr> 
								<td width="20%">12345678X</td> 
								<td width="20%">Fulanito Gonz&aacute;lez Crespo</td> 
								<td width="20%">612345789</td> 
								<td width="20%">Empresa 1</td> 
								<td width="10%"><button><a href="consultarPerfilExterno.html">Consultar</a></button></td>
								<td width="10%"><button><a onclick="return Eliminar_Elemento()">Eliminar</a></button></td>
							</tr>
							<tr> 
								<td width="20%">12345678X</td> 
								<td width="20%">Fulanito Gonz&aacute;lez Crespo</td> 
								<td width="20%">612345789</td>
								<td width="20%">Empresa 2</td>  
								<td width="10%"><button><a href="consultarPerfilExterno.html">Consultar</a></button></td>
								<td width="10%"><button><a onclick="return Eliminar_Elemento()">Eliminar</a></button></td>
							</tr>
							<tr> 
								<td width="20%">12345678X</td> 
								<td width="20%">Fulanito Gonz&aacute;lez Crespo</td> 
								<td width="20%">612345789</td> 
								<td width="20%">Empresa 3</td> 
								<td width="10%"><button><a href="consultarPerfilExterno.html">Consultar</a></button></td>
								<td width="10%"><button><a onclick="return Eliminar_Elemento()">Eliminar</a></button></td>
							</tr>
			 			</table>
			 		</div>
				</form>
				<table class="default">
			 		<tr>
						<td colspan="2"><a href="altaExterno.php"><input type="button" name="piAlta" value="Alta Externo"/></a></td>
						<td colspan="2"><a href="altaInterno.php"><input type="button" name="piAlta" value="Alta Interno"/></a></td>
					</tr>
			 	</table>
				
<?php
	require_once("../../structure/footer.php");
?>