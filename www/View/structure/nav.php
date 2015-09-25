<?php
    include_once '../../Controller/common.php';
function navJefe(){
    require_once $_SESSION['cribPath'].'Controller/busquedaController.php';
    // Language
    $language = $_SESSION['lang'];
    require_once("../../Resources/languages/lang." . $language . ".php");
    $lang = $_SESSION['language'];
?>
<div id="sidebarJefe"> <!--BARRA LATERAL-->
	<h1 id="logo"><a href="../../Controller/usuariosController.php?accion=nav">·Fractum!</a></h1>
            <nav id="nav">
          		<ul>
            		<div align="center">
                   		<li class="current">
                        	<a href="../../Controller/usuariosController.php?accion=consultar&dniUsu=<?php echo $_SESSION["dni"];?>">
                        		<img src="../../Resources/images/DefaultAvatar.png"><em><strong><br><?php echo $lang['JEFENEGOCIO'] . "<br>"; echo $_SESSION["dni"];?></strong></em><strong></strong>
                        	</a>
                     	</li>
                     	<li class='current'> <a href="../incidencias/pendientesJefe.php"><?php echo $lang['PENDIENTES'] . ":" ?>
                        <span class="badge"> <?php echo $_SESSION['PendsJefe']; ?> </span> </a> </li>
						          <li class="current"><a href="../../Controller/incidenciasController.php?accion=Listar"><?php echo $lang['GESTIONARINCIDENCIAS']; ?></a></li>
                      <li class="current"><a href="../../Controller/usuariosController.php?accion=gestionUsuarios"><?php echo $lang['GESTIONARUSUARIOS']; ?></a></li>
                      <li class="current"><a href="../../Controller/empresasController.php?accion=Listar"><?php echo $lang['GESTIONAREMPRESAS']; ?></a></li>
                      <li class="current"><a href="../../Controller/maquinasController.php?accion=Listar"><?php echo $lang['GESTIONARMAQUINAS']; ?></a></li>
						          <li class="current"><a href="../../Controller/serviciosController.php?accion=Listar"><?php echo $lang['GESTIONARSERVICIOS']; ?></a></li>
						          <li class='current'><a href="../../Controller/usuariosController.php?accion=logOut" id='Logout_Usuario'><?php echo $lang['LOGOUT']; ?></a></li>
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

function navInterno(){
require_once $_SESSION['cribPath'].'Controller/busquedaController.php';
    // Language
    $language = $_SESSION['lang'];
    require_once("../../Resources/languages/lang." . $language . ".php");
    $lang = $_SESSION['language'];
?>
<div id="sidebarInterno"> <!--BARRA LATERAL-->
			<h1 id='logo'><a href='../../Controller/usuariosController.php?accion=nav'>·Fractum!</a></h1>
                <nav id='nav'>
              		<ul>
                		<div align='center'>
                       		<li class='current'>
                            	<a href="../../Controller/usuariosController.php?accion=consultar&dniUsu=<?php echo $_SESSION["dni"];?>">
                            		<img src='../../Resources/images/DefaultAvatar.png'><em><strong><br><?php echo $lang['OPERARIOINTERNO'] . "<br>"; ?><?php echo $_SESSION["dni"];?></strong></em><strong></strong></img>
                            	</a>
                         	</li>
							<!--NOTIFICACIONES-->
							<li class='current'><a href="../incidencias/pendientesInterno.php"><?php echo $lang['PENDIENTES'] . ":"; ?><span class="badge"><?php echo $_SESSION['cantPendientes']; ?></span></a></li>
							<!-- FIN NOTIFICACIONES-->
              <li class='current'><a href="../../View/incidencias/altaInterno.php"><?php echo $lang['ALTAINCIDENCIA']; ?></a></li>
							<li class='current'><strong><a href="../../Controller/incidenciasController.php?accion=Listar"><?php echo $lang['LISTARINCIDENCIAS']; ?></a></strong></li>
							<li class='current'><a href="../../Controller/maquinasController.php?accion=Listar"><?php echo $lang['LISTARMAQUINAS']; ?></a></li>
                            <li class='current'><a href='mailto:jefe@fractum.com?cc=administracion@fractum.es'><?php echo $lang['CONTACTOJEFE']; ?></a></li>
							<li class='current'><a href="../../Controller/usuariosController.php?accion=logOut" id='Logout_Usuario'><?php echo $lang['LOGOUT']; ?></a></li>
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

function navExterno(){
  require_once $_SESSION['cribPath'].'Controller/busquedaController.php';
    // Language
    $language = $_SESSION['lang'];
    require_once("../../Resources/languages/lang." . $language . ".php");
    $lang = $_SESSION['language'];
?>
<div id="sidebarExterno"> <!--BARRA LATERAL-->
			<h1 id='logo'><a href='../../Controller/usuariosController.php?accion=nav'>·Fractum!</a></h1>
                <nav id='nav'>
              		<ul>
                		<div align='center'>
                       		<li class='current'>
                            	<a href="../../Controller/usuariosController.php?accion=consultar&dniUsu=<?php echo $_SESSION["dni"];?>">
                            		<img src='../../Resources/images/DefaultAvatar.png'><em><strong><br><?php echo $lang['OPERARIOEXTERNO'] . "<br>"; echo $_SESSION["dni"];?></strong></em><strong></strong></img>
                            	</a>
                         	</li>
            	<!--NOTIFICACIONES-->
              <li class='current'> <a href="../incidencias/pendientesExterno.php"><?php echo $lang['PENDIENTES']; ?>
                        <span class="badge"> <?php echo $_SESSION['cantPendientesE']; ?> </span> </a> </li>
              <!-- FIN NOTIFICACIONES-->
							<li class='current'><strong><a href="../../Controller/incidenciasController.php?accion=Listar"><?php echo $lang['LISTARINCIDENCIAS']; ?></a></strong></li>
							<li class='current'><a href="../../Controller/maquinasController.php?accion=Listar"><?php echo $lang['LISTARMAQUINAS']; ?></a></li>
                            <li class='current'><strong><a href="../../Controller/serviciosController.php?accion=Listar"><?php echo $lang['LISTARSERVICIOS']; ?></a></strong></li>
							<li class='current'><a href='mailto:jefe@fractum.com?cc=administracion@fractum.es'><?php echo $lang['CONTACTOJEFE']; ?></a></li>
							<li class='current'><a href="../../Controller/usuariosController.php?accion=logOut" id='Logout_Usuario'><?php echo $lang['LOGOUT']; ?></a></li>
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
