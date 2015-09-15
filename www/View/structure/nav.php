<?php
function navJefe()
{
require_once $_SESSION['cribPath'].'Controller/busquedaController.php';
?>
<div id="sidebarJefe"> <!--BARRA LATERAL-->
	<h1 id="logo"><a href="../../Controller/usuariosController.php?accion=nav"><?= i18n("·Fractum!") ?></a></h1>
            <nav id="nav">
          		<ul>
            		<div align="center">
                   		<li class="current">
                        	<a href="../../Controller/usuariosController.php?accion=consultar&dniUsu=<?php echo $_SESSION["dni"];?>">
                        		<img src="../../Resources/images/DefaultAvatar.png"><em><strong><br><?= i18n("jefeNegocio:") ?> <?php echo $_SESSION["dni"];?></strong></em><strong></strong>
                        	</a>
                     	</li>
                     	<li class='current'> <a href="../incidencias/pendientesJefe.php"><?= i18n("Pendientes:") ?>
                        <span class="badge"> <?php echo $_SESSION['PendsJefe']; ?> </span> </a> </li>
						          <li class="current"><a href="../../Controller/incidenciasController.php?accion=Listar"><?= i18n("Gestionar Incidencias") ?></a></li>
                      <li class="current"><a href="../../Controller/usuariosController.php?accion=gestionUsuarios"><?= i18n("Gestionar Usuarios") ?></a></li>
                      <li class="current"><a href="../../Controller/empresasController.php?accion=Listar"><?= i18n("Gestionar Empresas") ?></a></li>
                      <li class="current"><a href="../../Controller/maquinasController.php?accion=Listar"><?= i18n("Gestionar Máquinas") ?></a></li>
						          <li class="current"><a href="../../Controller/serviciosController.php?accion=Listar"><?= i18n("Gestionar Servicios") ?></a></li>
						          <li class='current'><a href="../../Controller/usuariosController.php?accion=logOut" id='Logout_Usuario'><?= i18n("> Log Out") ?></a></li>
                      <form method="POST" action="../../Controller/busquedaController.php" style="text-align:center">
                        	<section class="box search"><input type="text" name="busqueda" placeholder="Buscar..." required/></section>
							           <div hidden><input type="submit" name="buscar" value="busquedaJefe"/></div>
                      </form>
                </div>
				      </ul>
			</nav>
</div> <!-- FIN BARRA LATERAL -->
<?php
}

function navInterno()
{
require_once $_SESSION['cribPath'].'Controller/busquedaController.php';
?>
<div id="sidebarInterno"> <!--BARRA LATERAL-->
			<h1 id='logo'><a href='../../Controller/usuariosController.php?accion=nav'><?= i18n("·Fractum!") ?></a></h1>
                <nav id='nav'>
              		<ul>
                		<div align='center'>
                       		<li class='current'>
                            	<a href="../../Controller/usuariosController.php?accion=consultar&dniUsu=<?php echo $_SESSION["dni"];?>">
                            		<img src='../../Resources/images/DefaultAvatar.png'><em><strong><br><?= i18n("operarioInterno:") ?> <?php echo $_SESSION["dni"];?></strong></em><strong></strong></img>
                            	</a>
                         	</li>
							<!--NOTIFICACIONES-->
							<!-- <li class='current'><a href="../../Controller/incidenciasController.php?accion=Pendientes"><?= i18n("Pendientes:") ?><span class="badge"><?php echo $_SESSION['cantPendientes']; ?></span></a></li> -->
							<li class='current'><a href="../incidencias/pendientesInterno.php"><?= i18n("Pendientes:") ?><span class="badge"><?php echo $_SESSION['cantPendientes']; ?></span></a></li>
							<!-- FIN NOTIFICACIONES-->
              <li class='current'><a href="../../View/incidencias/altaInterno.php"><?= i18n("Alta incidencia") ?></a></li>
							<li class='current'><strong><a href="../../Controller/incidenciasController.php?accion=Listar"><?= i18n("Listar Incidencias") ?></a></strong></li>
							<li class='current'><a href="../../Controller/maquinasController.php?accion=Listar"><?= i18n("Listar máquinas") ?></a></li>
                            <li class='current'><a href='mailto:jefe@fractum.com?cc=administracion@fractum.es'><?= i18n("Contacto jefe") ?></a></li>
							<li class='current'><a href="../../Controller/usuariosController.php?accion=logOut" id='Logout_Usuario'> <?= i18n("> Log Out") ?></a></li>
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
			<h1 id='logo'><a href='../../Controller/usuariosController.php?accion=nav'><?= i18n("·Fractum!") ?></a></h1>
                <nav id='nav'>
              		<ul>
                		<div align='center'>
                       		<li class='current'>
                            	<a href="../../Controller/usuariosController.php?accion=consultar&dniUsu=<?php echo $_SESSION["dni"];?>">
                            		<img src='../../Resources/images/DefaultAvatar.png'><em><strong><br><?= i18n("operarioExterno:") ?><?php echo $_SESSION["dni"];?></strong></em><strong></strong></img>
                            	</a>
                         	</li>
            	<!--NOTIFICACIONES-->
              <li class='current'> <a href="../../Controller/incidenciasController.php?accion=pendiente"><?= i18n("Pendientes:") ?>
                        <span class="badge"> <?php echo $_SESSION['pendientesExterno']; ?> </span> </a> </li>
              <!-- FIN NOTIFICACIONES-->
							<li class='current'><strong><a href="../../Controller/incidenciasController.php?accion=Listar"><?= i18n("Listar Incidencias") ?></a></strong></li>
							<li class='current'><a href="../../Controller/maquinasController.php?accion=Listar"><?= i18n("Listar máquinas") ?></a></li>
                            <li class='current'><strong><a href="../../Controller/serviciosController.php?accion=Listar"><?= i18n("Listar Servicios") ?></a></strong></li>
							<li class='current'><a href='mailto:jefe@fractum.com?cc=administracion@fractum.es'><?= i18n("Contacto jefe") ?></a></li>
							<li class='current'><a href="../../Controller/usuariosController.php?accion=logOut" id='Logout_Usuario'><?= i18n("> Log Out") ?></a></li>
                            <form method='POST' action="../../Controller/busquedaController.php" style='text-align:center'>
                        	<section class='box search'>
								<input type='text' name='busqueda' placeholder='Buscar...' required/>
                      		</section>
								<div hidden><input type='submit' name='buscar' value='busquedaExterno'/></div>
                            </form>
                      	</div>
					</ul>
				</nav>
</div> <!-- FIN BARRA LATERAL -->
<?php
}
?>
