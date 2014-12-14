<?php

function navJefe()
{
?>
<div id="sidebarJefe"> <!--BARRA LATERAL-->
	<h1 id="logo"><a href="homeJefe.html">·Fractum!</a></h1>		
            <nav id="nav"> 
          		<ul>
            		<div align="center">
                   		<li class="current">
                        	<a href="consultarPerfil.html">
                        		<img src="../../../Resources/images/DefaultAvatar.png"><em><strong><br>".$jefeNegocio"</strong></em><strong></strong>
                        	</a>
                     	</li>
                     	<li class='current'><a href='gestorPendientes.html'>Pendientes: <span class="badge">100</span></a></li>
						<li class="current"><a href="gestorIncidencias.html">GESTIONAR INCIDENCIAS</a></li>
                       	<li class="current"><a href="gestorUsuarios.html">GESTIONAR USUARIOS</a></li>
                       	<li class="current"><a href="gestorMaquinas.html">GESTIONAR MÁQUINAS</a></li>
						<li class="current"><a href="gestorServicios.html">GESTIONAR SERVCICOS</a></li>
						<li class='current'><a href='../Login.html' id='Logout_Usuario' onclick ='return Salir_Usuario()'> > Log Out</a></li>
                        <form method="POST" action="resultadosBusqueda.html" style="text-align:center">
                    	<section class="box search">
							<input type="text" name="busqueda" placeholder="Buscar..." value=""/>
                  		</section>
							<div hidden><input type="submit" name="buscar"/></div>
                        </form>
                  	</div>
				</ul>
			</nav>
</div>
	<!-- FIN BARRA LATERAL -->
<?php
}

function navInterno()
{
?>
<div id="sidebarInterno"> <!--BARRA LATERAL-->
			<h1 id='logo'><a href='homeInterno.html'>·Fractum!</a></h1> 	
                <nav id='nav'> 
              		<ul>
                		<div align='center'>
                       		<li class='current'>
                            	<a href='perfilInterno.html'>
                            		<img src='../../../Resources/images/DefaultAvatar.png'><em><strong><br>".$operarioInterno."</strong></em><strong></strong></img>
                            	</a>
                         	</li>
							<!--NOTIFICACIONES-->		
							<li class='current'><a href='listarPendienteCierre.html'>Pendientes: <span class="badge">100</span></a></li>
							<!-- FIN NOTIFICACIONES-->
							<li class='current'><strong><a href='listarIncidencias.html'>Listar Incidencias</a></strong></li>
							<li class='current'><a href='altaIncidencia.html'>Alta incidencia</a></li>
							<li class='current'><a href='listarMaquinas.html'>Listar maquinas</a></li>
                            <li class='current'><a href='mailto:jefe@fractum.com?cc=administracion@fractum.es'>Contacto jefe</a></li>
							<li class='current'><a href='#' id='Logout_Usuario' onclick ='return Salir_Usuario()'> > Log Out</a></li>
                            <form method='POST' action='#' style='text-align:center'>
                        	<section class='box search'>
								<input type='text' name='busqueda' placeholder='Buscar...'/>
                      		</section>
								<div hidden><input type='submit' name='buscar'/></div>
                            </form>
                      	</div>
					</ul>
				</nav>
		</div>
		<!-- FIN BARRA LATERAL -->
<?php
}

function navExterno()
{
?>
<div id="sidebarExterno"> <!--BARRA LATERAL-->
			<h1 id='logo'><a href='homeExterno.html'>·Fractum!</a></h1> 	
                <nav id='nav'> 
              		<ul>
                		<div align='center'>
                       		<li class='current'>
                            	<a href='perfilOperarioExterno.html'>
                            		<img src='../../../Resources/images/DefaultAvatar.png'><em><strong><br>".$operarioExterno."</strong></em><strong></strong></img>
                            	</a>
                         	</li>
                         	<!--NOTIFICACIONES-->		
							<li class='current'><a href='listarIncidenciasPendientes.html'>Pendientes: <span class="badge">50</span></a></li>
							<!-- FIN NOTIFICACIONES-->
							<li class='current'><strong><a href='listarIncidencias.html'>Listar Incidencias</a></strong></li>
							<li class='current'><a href='listarMaquinas.html'>Listar maquinas</a></li>
                            <li class='current'><a href='#'>Contacto jefe</a></li>
							<li class='current'><a href='#' id='Logout_Usuario' onclick ='return Salir_Usuario()'>   > Log Out</a></li>
                            <form method='POST' action='buscar.html' style='text-align:center'>
                        	<section class='box search'>
								<input type='text' name='busqueda' placeholder='Buscar...'/>
                      		</section>
								<div hidden><input type='submit' name='buscar'/></div>
                            </form>
                      	</div>
					</ul>
				</nav>
</div> <!-- FIN BARRA LATERAL -->
<?php
}
?>