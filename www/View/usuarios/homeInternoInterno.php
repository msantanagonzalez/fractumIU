<?php
    $userType="interno";
    require_once $_SESSION['cribPath'].'View/structure/header.php';
?>
<h1 id="headerInterno"><a><?= i18n("- INCIDENCIAS -") ?></a></h1> <!--SECCIÓN-->
<table class="default">
    <tr>
        <th width="20%">#ID <?= i18n("Inc.") ?></th>
        <th width="20%"><?= i18n("Últ. operario") ?></th>
        <th width="20%"><?= i18n("Últ. iteración") ?> </th>
        <th width="20%"><?= i18n("Estado:") ?></th>
        <th width="20%">&nbsp;</th>
    </tr>
</table>
<div style="height:107px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->
    <form method="POST" action="../../Controller/incidenciasController.php">
        <table class="default">
            <?php 
                if(isset($_SESSION['listaIncidencia']))
                $rows = $_SESSION['listaIncidencia'];
                $row2 = $_SESSION['listaOp'];
                $row3 = $_SESSION['listaIt'];
                if (empty($rows)) {
                ?>
                    <div class="alert alert-warning" role="alert">
                    <?= i18n("| INFO |- No hay incidencias para listar") ?> 
                    </div>
                <?php
                }
                else{
                    $cont = 0;
                    foreach($rows as $row){
                ?>
                <tr>
                    <td width="20%"><?php echo $row['idIncid'];?></td> 
                    <td width="20%"><?php if(isset($row2[$cont][0][0])) echo $row2[$cont][0][0]; else echo "-"; ?></td> <!-- Falta linkar al perfil del usuario. -->
                    <td width="20%"><?php if(isset($row3[$cont][0][0])) echo $row3[$cont][0][0]; else echo "-"; ?></td> 
                    <td width="20%"><?php echo $row['estadoIncid']; ?></td>
                    <td width="20%"><a href="../../Controller/incidenciasController.php?accion=Consulta&idIncidencia=<?php echo $row['idIncid']; ?>"><input type="button" value="Consultar"></input></a></td>
                </tr>
                <?php 
                    $cont++;
                } 
            }
            ?>
        </table>
    </form>
</div> 
<br>
<h1 id="headerInterno"><a><i><?= i18n("- MÁQUINAS -") ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="20%">#ID <?= i18n("Máquina:") ?></th>
    	<th width="20%"><?= i18n("Servicio:") ?></th>
       	<th width="20%"><?= i18n("Últ. Incidencia") ?></th>
        <th width="10%">&nbsp;</th>
        <th width="10%">&nbsp;</th>
    </tr>
</table>
<form method="POST" action="../../Controller/maquinasController.php">
	<table class="default">
		<?php 
            $incidencias = $_SESSION['listaIncidMaquina'];
            $servicio = $_SESSION['listaServicios'];
			if(isset($_SESSION['listaMaquina']))
			$rows = $_SESSION['listaMaquina'];
			if (empty($rows)) {
			?>
				<div class="alert alert-warning" role="alert">
				<?= i18n("| INFO |- No hay maquinas para listar") ?>  
				</div>
			<?php
			}
			else{
                $cont = 0;
				foreach ($rows as $row) {
				?>
				<tr> 
					<td width="20%"  name = "idMaq"><?php echo $row['idMaq']; ?></td> 
					<td width="20%"><?php echo $servicio[$cont]; ?></td> 
					 <td width="20%"><?php echo $incidencias[$cont][0][0]; ?></td>
                    <td width="3%"></td>
					<td width="10%"><a href="../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>"><input type="button" name="accion" value="Consultar"></input></a></button></td>
				</tr>
				<?php 
                    $cont++;
				} 
			}
		?>
	</table>
</form>
                    
<?php
    require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
