<?php
	switch ($userType) {

		case "jefe":
			?>
					</div>
					</div>
					<div id="sidebarJefe"> <!--BARRA LATERAL-->
					<h1 id="logo"><a href="homeJefe.html">·Fractum!</a></h1>		
			            <nav id="nav"> 
			          		<ul>
			            		<div align="center">
			                   		<li class="current">
			                        	<a href="consultarPerfil.html">
			                        		<img src="../../Recursos/images/DefaultAvatar.png"><em><strong><br>".$jefeNegocio"</strong></em><strong></strong>
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
				</div><!-- FIN BARRA LATERAL -->
			</body>
			</html>
			<?php
			break;

		case 'interno':
			?>
					</div>
					</div>
					<div id="sidebarInterno"> <!--BARRA LATERAL-->
					<h1 id="logo"><a href="homeJefe.html">·Fractum!</a></h1>		
			            <nav id="nav"> 
			          		<ul>
			            		<div align="center">
			                   		<li class="current">
			                        	<a href="consultarPerfil.html">
			                        		<img src="../../Recursos/images/DefaultAvatar.png"><em><strong><br>".$jefeNegocio"</strong></em><strong></strong>
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
				</div><!-- FIN BARRA LATERAL -->
			</body>
			</html>
			<?php
			break;

		case 'externo':
			?>
					</div>
					</div>
					<div id="sidebarExterno"> <!--BARRA LATERAL-->
					<h1 id="logo"><a href="homeJefe.html">·Fractum!</a></h1>		
			            <nav id="nav"> 
			          		<ul>
			            		<div align="center">
			                   		<li class="current">
			                        	<a href="consultarPerfil.html">
			                        		<img src="../../Recursos/images/DefaultAvatar.png"><em><strong><br>".$jefeNegocio"</strong></em><strong></strong>
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
				</div><!-- FIN BARRA LATERAL -->
			</body>
			</html>
			<?php
			break;
	}
?>

