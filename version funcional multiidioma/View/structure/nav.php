<?php
/*<?php echo $lang['JEFENEGOCIO']; ?>*/
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
							<!-- aca abajo va el jefe de negocio -->
                        		<img src="../../Resources/images/DefaultAvatar.png"><em><strong><br> Jefe de Negocio <?php echo $_SESSION["dni"];?></strong></em><strong></strong>
                        	</a>
                     	</li>
                     	<li class='current'> <a href="../../Controller/incidenciasController.php?accion=Pendientes">Pendientes:</a>
                        <!-- <span class="badge"> <?php echo $_SESSION['pendientes']; ?> </span> </a> </li> -->
						          <li class="current"><a href="../../Controller/incidenciasController.php?accion=Listar">Gestionar Incidencias</a></li>
                      <li class="current"><a href="../../Controller/usuariosController.php?accion=gestionUsuarios">Gestionar Usuarios</a></li>
                      <li class="current"><a href="../../Controller/empresasController.php?accion=Listar">Gestionar Empresas</a></li>
                      <li class="current"><a href="../../Controller/maquinasController.php?accion=Listar">Gestionar Máquinas</a></li>
						          <li class="current"><a href="../../Controller/serviciosController.php?accion=Listar">Gestionar Servicios</a></li>
						          <li class='current'><a href="../../Controller/usuariosController.php?accion=logOut" id='Logout_Usuario'>> Log Out</a></li>
                      <form method="POST" action="../../Controller/busquedaController.php" style="text-align:center">
                        	<section class="box search"><input type="text" name="busqueda" placeholder="Buscar..." required/></section>
							           <div hidden><input type="submit" name="buscar" value="busquedaJefe"/></div>
                      </form>
					  <!-- <li><a href="nav.php?lang=es">español -->
					  <!-- <li><a href="nav.php?lang=ga">gallego -->
					  
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
                            		<img src='../../Resources/images/DefaultAvatar.png'><em><strong><br>operarioInterno: <?php echo $_SESSION["dni"];?></strong></em><strong></strong></img>
                            	</a>
                         	</li>
							<!--NOTIFICACIONES-->
							 <!-- <li class='current'><a href="../../Controller/incidenciasController.php?accion=Pendientes">Pendientes:<span class="badge"><?php echo $_SESSION['pendientes']; ?></span></a></li> -->
							<!-- FIN NOTIFICACIONES-->
              <li class='current'><a href="../../View/incidencias/altaInterno.php">Alta incidencia</a></li>
							<li class='current'><strong><a href="../../Controller/incidenciasController.php?accion=Listar">Listar Incidencias</a></strong></li>
							<li class='current'><a href="../../Controller/maquinasController.php?accion=Listar">Listar máquinas</a></li>
                            <li class='current'><a href='mailto:jefe@fractum.com?cc=administracion@fractum.es'>Contacto jefe</a></li>
							<li class='current'><a href="../../Controller/usuariosController.php?accion=logOut" id='Logout_Usuario'> > Log Out</a></li>
                            <form method='POST' action="../../Controller/busquedaController.php" style='text-align:center'>
                        	<section class='box search'>
								<input type='text' name='busqueda' placeholder='Buscar...' required/>
                      		</section>
								<div hidden><input type='submit' name='buscar' value='busquedaInterno'/></div>
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
                            		<img src='../../Resources/images/DefaultAvatar.png'><em><strong><br>operarioExterno:<?php echo $_SESSION["dni"];?></strong></em><strong></strong></img>
                            	</a>
                         	</li>
                         	<!--NOTIFICACIONES-->
							<!-- <li class='current'><a href="../../Controller/incidenciasController.php?accion=Pendientes">Pendientes: <span class="badge"><?php echo $_SESSION['pendientes']; ?></span></a></li> -->
							<!-- FIN NOTIFICACIONES-->
							<li class='current'><strong><a href="../../Controller/incidenciasController.php?accion=Listar">Listar Incidencias</a></strong></li>
							<li class='current'><a href="../../Controller/maquinasController.php?accion=Listar">"Listar máquinas</a></li>
                            <li class='current'><strong><a href="../../Controller/serviciosController.php?accion=Listar">Listar Servicios</a></strong></li>
							<li class='current'><a href="#">Contacto jefe</a></li>
							<li class='current'><a href="../../Controller/usuariosController.php?accion=logOut" id='Logout_Usuario'>> Log Out</a></li>
                            <form method='POST' action="../../Controller/busquedaController.php" style='text-align:center'>
                        	<section class='box search'>
								<input type='text' name='busqueda' placeholder='Buscar...' required/>
                      		</section>
								<div hidden><input type='submit' name='buscar' value='busquedaExterno'/></div>
                            </form>
                      	</div>
					</ul>
				</nav>
					<!--<button><li><a href="nav.php?lang=es">español</button>-->
					<!--<li><a href="nav.php?lang=ga">gallego-->
</div> <!-- FIN BARRA LATERAL -->
<?php
}
?>
