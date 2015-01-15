<?php
function navJefe()
{
?>
<div id="sidebarJefe"> <!--BARRA LATERAL-->
	<h1 id="logo"><a href="../usuarios/homeJefeJefe.php"><?= i18n("·Fractum!") ?></a></h1>		
            <nav id="nav"> 
          		<ul>
            		<div align="center">
                   		<li class="current">
                        	<a href="../../Controller/usuariosController.php?accion=consultar&dniUsu=<?php echo $_SESSION["dni"];?>">
                        		<img src="../../Resources/images/DefaultAvatar.png"><em><strong><br><?= i18n("jefeNegocio:") ?><?php echo $_SESSION["dni"];?></strong></em><strong></strong>
                        	</a>
                     	</li>
                     	<li class='current'><a href="../../Controller/incidenciasController.php?accion=Pendientes"><?= i18n("Pendientes:") ?><span class="badge"><?php echo $_SESSION['pendientes']; ?></span></a></li>
						          <li class="current"><a href="../../Controller/incidenciasController.php?accion=Listar"><?= i18n("GESTIONAR INCIDENCIAS") ?></a></li>
                      <li class="current"><a href="../../Controller/usuariosController.php?accion=gestionUsuarios"><?= i18n("GESTIONAR USUARIOS") ?></a></li>
                      <li class="current"><a href="../../Controller/empresasController.php?accion=Listar"><?= i18n("GESTIONAR EMPRESAS") ?></a></li>
                      <li class="current"><a href="../../Controller/maquinasController.php?accion=Listar"><?= i18n("GESTIONAR MÁQUINAS") ?></a></li>
						          <li class="current"><a href="../../Controller/serviciosController.php?accion=Listar"><?= i18n("GESTIONAR SERVICIOS") ?></a></li>
						          <li class='current'><a href="../../Controller/usuariosController.php?accion=logOut" id='Logout_Usuario'><?= i18n("> Log Out") ?> </a></li>
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
			<h1 id='logo'><a href='../usuarios/homeInternoInterno.php'><?= i18n("·Fractum!") ?></a></h1> 	
                <nav id='nav'> 
              		<ul>
                		<div align='center'>
                       		<li class='current'>
                            	<a href="../../Controller/usuariosController.php?accion=consultar&dniUsu=<?php echo $_SESSION["dni"];?>">
                            		<img src='../../Resources/images/DefaultAvatar.png'><em><strong><br><?= i18n("operarioInterno:") ?> <?php echo $_SESSION["dni"];?></strong></em><strong></strong></img>
                            	</a>
                         	</li>
							<!--NOTIFICACIONES-->		
							<li class='current'><a href="../../Controller/incidenciasController.php?accion=Pendientes"><?= i18n("Pendientes:") ?><span class="badge"><?php echo $_SESSION['pendientes']; ?></span></a></li>
							<!-- FIN NOTIFICACIONES-->
              <li class='current'><a href="../../View/incidencias/altaInterno.php"><?= i18n("Alta incidencia") ?></a></li>
							<li class='current'><strong><a href="../../Controller/incidenciasController.php?accion=Listar"><?= i18n("Listar Incidencias") ?></a></strong></li>
							<li class='current'><a href="../../Controller/maquinasController.php?accion=Listar"><?= i18n("Listar máquinas") ?></a></li>
                            <li class='current'><a href='mailto:jefe@fractum.com?cc=administracion@fractum.es'><?= i18n("Contacto jefe") ?></a></li>
							<li class='current'><a href="../../Controller/usuariosController.php?accion=logOut" id='Logout_Usuario'> <?= i18n("> Log Out") ?></a></li>
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
			<h1 id='logo'><a href='../usuarios/homeExternoExterno.php'><?= i18n("·Fractum!") ?></a></h1> 	
                <nav id='nav'> 
              		<ul>
                		<div align='center'>
                       		<li class='current'>
                            	<a href="../../Controller/usuariosController.php?accion=consultar&dniUsu=<?php echo $_SESSION["dni"];?>">
                            		<img src='../../Resources/images/DefaultAvatar.png'><em><strong><br><?= i18n("operarioExterno:") ?><?php echo $_SESSION["dni"];?></strong></em><strong></strong></img>
                            	</a>
                         	</li>
                         	<!--NOTIFICACIONES-->		
							<li class='current'><a href="../../Controller/incidenciasController.php?accion=Pendientes"><?= i18n("Pendientes:") ?> <span class="badge"><?php echo $_SESSION['pendientes']; ?></span></a></li>
							<!-- FIN NOTIFICACIONES-->
							<li class='current'><strong><a href="../../Controller/incidenciasController.php?accion=Listar"><?= i18n("Listar Incidencias") ?></a></strong></li>
							<li class='current'><a href="../../Controller/maquinasController.php?accion=Listar"><?= i18n("Listar máquinas") ?></a></li>
                            <li class='current'><strong><a href="../../Controller/serviciosController.php?accion=Listar"><?= i18n("Listar Servicios") ?></a></strong></li>
							<li class='current'><a href="#"><?= i18n("Contacto jefe") ?></a></li>
							<li class='current'><a href="../../Controller/usuariosController.php?accion=logOut" id='Logout_Usuario'><?= i18n("> Log Out") ?></a></li>
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
