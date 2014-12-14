<?php
$userType="interno";
include_once('../../structure/bodyHeader.php');
?>
               	  <h1 id="headerInterno"><a>- INCIDENCIAS -</a></h1> <!--SECCIÓN-->
                	<table class="default"><!--TABLA-->
                       	<tr>
                       		<th width="20%">ID</th>
                        	<th width="20%">Maquina</th>
                            <th width="20%">Apertura</th>
                            <th width="20%">Estado</th>
							<th width="10%"> </th>
							<th width="10%"> </th>
                     	</tr>
                    </table>
                	<div style="height:107px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->
                   		<table class="default"><!--TABLA-->
                   			<tr>
	                   			<td width="20%">ID001</td>
	                        	<td width="20%"><a href="consultarMaquina.html">Centrifugadora de lechuga</a></td>
	                            <td width="20%">Marco Santana</td>
	                            <td width="20%">Abierta</td>
								<td width="10%"><button onclick="window.location.href='consultarIncidencia.html'">Consultar</button></td>
								<td width="10%"><button>Derivar</button></td>
							</tr>
							<tr>
	                   			<td width="20%">ID002</td>
	                        	<td width="20%"><a href="consultarMaquina.html">Impresor 3D</a></td>
	                            <td width="20%">Antonio Gonz&aacute;lez</td>
	                            <td width="20%">Pendiente de cierre</td>
								<td width="10%"><button onclick="window.location.href='consultarIncidencia.html'">Consultar</button></td>
								<td width="10%"><button>Cerrar</button></td>
							</tr>
							<tr>
	                   			<td width="20%">ID003</td>
	                        	<td width="20%"><a href="consultarMaquina.html">Ensamblador</a></td>
	                            <td width="20%">Antonio Gonz&aacute;lez</td>
	                            <td width="20%">Derivada</td>
								<td width="10%"><button onclick="window.location.href='consultarIncidencia.html'">Consultar</button></td>
								<td width="10%"><button>Cerrar</button></td>
							</tr>
                   		</table>
                	</div> <br>
                    
                    <h1 id="headerInterno"><a>- MAQUINAS -</a></h1> <!--SECCIÓN-->
                	<table class="default"><!--TABLA-->
                       	<tr>
							<th width="20%">ID</th>
                        	<th width="20%">Nombre</th>
                            <th width="20%">Servicio</th>
                            <th width="20%">Ult.Incidencia</th>
							<th width="20%"> </th>
                     	</tr>
                    </table>
                  	<div style="height:107px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->
                   		<table class="default"><!--TABLA-->
						<tr>
							<td width="20%">CL01</td>
                        	<td width="20%"><a href="consultarMaquina.html">Centrifugadora de lechuga</a></td>
                            <td width="20%">FULL COVER</td>
                            <td width="20%"><a href="consultarIncidencia.html">I0001</a></td>
							<td width="20%"><button onclick="window.location.href='consultarMaquina.html'">Consultar</button></td>
                     	</tr>
                     	<tr>
							<td width="20%">SI01</td>
                        	<td width="20%"><a href="consultarMaquina.html">Secadora industrial</a></td>
                            <td width="20%">-----</td>
                            <td width="20%">-----</td>
							<td width="20%"><button onclick="window.location.href='consultarMaquina.html'">Consultar</button></td>
                     	</tr>
                   		</table>
                	</div>
                    
<?php
include_once('../../structure/bodyFooter.php');
?>



