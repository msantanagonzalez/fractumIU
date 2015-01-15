<?php
function navJefe()
{
?>
<div id="sidebarJefe"> <!--BARRA LATERAL-->
	<h1 id="logo"><a href="../usuarios/homeJefeJefe.php">·Fractum!</a></h1>		
            <nav id="nav"> 
          		<ul>
            		<div align="center">
                   		<li class="current">
                        	<a href="../../Controller/usuariosController.php?accion=consultar&dniUsu=<?php echo $_SESSION["dni"];?>">
                        		<img src="../../Resources/images/DefaultAvatar.png"><em><strong><br>"jefeNegocio:" <?php echo $_SESSION["dni"];?></strong></em><strong></strong>
                        	</a>
                     	</li>
                     	<li class='current'><a href="../../Controller/incidenciasController.php?accion=Pendientes">Pendientes: <span class="badge"><?php echo $_SESSION['pendientes']; ?></span></a></li>
						          <li class="current"><a href="../../Controller/incidenciasController.php?accion=Listar">GESTIONAR INCIDENCIAS</a></li>
                      <li class="current"><a href="../../Controller/usuariosController.php?accion=gestionUsuarios">GESTIONAR USUARIOS</a></li>
                      <li class="current"><a href="../../Controller/empresasController.php?accion=Listar">GESTIONAR EMPRESAS</a></li>
                      <li class="current"><a href="../../Controller/maquinasController.php?accion=Listar">GESTIONAR MÁQUINAS</a></li>
						          <li class="current"><a href="../../Controller/serviciosController.php?accion=Listar">GESTIONAR SERVICIOS</a></li>
						          <li class='current'><a href="../../Controller/usuariosController.php?accion=logOut" id='Logout_Usuario'> > Log Out</a></li>
                      <form method="POST" action="#" style="text-align:center">
                        	<section class="box search">
    							           <input type="text" name="busqueda" placeholder="Buscar..." value=""/>
                      		</section>
							           <div hidden><input type="submit" name="buscar"/></div>
                      </form>
                </div>
				      </ul>
			</nav>
</div> <!-- FIN BARRA LATERAL -->
<?php
}

function navInterno()
{
?>
<div id="sidebarInterno"> <!--BARRA LATERAL-->
			<h1 id='logo'><a href='../usuarios/homeInternoInterno.php'>·Fractum!</a></h1> 	
                <nav id='nav'> 
              		<ul>
                		<div align='center'>
                       		<li class='current'>
                            	<a href="../../Controller/usuariosController.php?accion=consultar&dniUsu=<?php echo $_SESSION["dni"];?>">
                            		<img src='../../Resources/images/DefaultAvatar.png'><em><strong><br>"operarioInterno:" <?php echo $_SESSION["dni"];?></strong></em><strong></strong></img>
                            	</a>
                         	</li>
							<!--NOTIFICACIONES-->		
							<li class='current'><a href="../../Controller/incidenciasController.php?accion=Pendientes">Pendientes: <span class="badge"><?php echo $_SESSION['pendientes']; ?></span></a></li>
							<!-- FIN NOTIFICACIONES-->
							<li class='current'><strong><a href="../../Controller/incidenciasController.php?accion=Listar">Listar Incidencias</a></strong></li>
							<li class='current'><a href="../../View/incidencias/altaInterno.php">Alta incidencia</a></li>
							<li class='current'><a href="../../Controller/maquinasController.php?accion=Listar">Listar maquinas</a></li>
                            <li class='current'><a href='mailto:jefe@fractum.com?cc=administracion@fractum.es'>Contacto jefe</a></li>
							<li class='current'><a href="../../Controller/usuariosController.php?accion=logOut" id='Logout_Usuario'> > Log Out</a></li>
                            <form method='POST' action="#" style='text-align:center'>
                        	<section class='box search'>
								<input type='text' name='busqueda' placeholder='Buscar...'/>
                      		</section>
								<div hidden><input type='submit' name='buscar'/></div>
                            </form>
                      	</div>
					</ul>
				</nav>
		</div><!-- FIN BARRA LATERAL -->
<?php
}

function navExterno()
{
?>
<div id="sidebarExterno"> <!--BARRA LATERAL-->
			<h1 id='logo'><a href='../usuarios/homeExternoExterno.php'>·Fractum!</a></h1> 	
                <nav id='nav'> 
              		<ul>
                		<div align='center'>
                       		<li class='current'>
                            	<a href="../../Controller/usuariosController.php?accion=consultar&dniUsu=<?php echo $_SESSION["dni"];?>">
                            		<img src='../../Resources/images/DefaultAvatar.png'><em><strong><br>"operarioExterno:" <?php echo $_SESSION["dni"];?></strong></em><strong></strong></img>
                            	</a>
                         	</li>
                         	<!--NOTIFICACIONES-->		
							<li class='current'><a href="../../Controller/incidenciasController.php?accion=Pendientes">Pendientes: <span class="badge"><?php echo $_SESSION['pendientes']; ?></span></a></li>
							<!-- FIN NOTIFICACIONES-->
							<li class='current'><strong><a href="../../Controller/incidenciasController.php?accion=Listar">Listar Incidencias</a></strong></li>
							<li class='current'><a href="../../Controller/maquinasController.php?accion=Listar">Listar maquinas</a></li>
                            <li class='current'><strong><a href="../../Controller/serviciosController.php?accion=Listar">Listar Servicios</a></strong></li>
							<li class='current'><a href="#">Contacto jefe</a></li>
							<li class='current'><a href="../../Controller/usuariosController.php?accion=logOut" id='Logout_Usuario'> > Log Out</a></li>
                            <form method='POST' action="#" style='text-align:center'>
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
