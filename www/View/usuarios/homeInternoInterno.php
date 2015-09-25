<?php
    include_once '../../Controller/common.php';
    $userType="interno";
    require_once $_SESSION['cribPath'].'View/structure/header.php';
	require_once $_SESSION['cribPath'].'View/messages/messages_ga.php';
?>
<h1 id="headerInterno"><a><?php echo $lang['INCIDENCIAS_BIG']; ?></a></h1> <!--SECCIÓN-->
<table class="default">
    <tr>
        <th width="20%">#ID <?php echo $lang['INC']; ?></th>
        <th width="20%"><?php echo $lang['ULTIMO_OPERARIO']; ?></th>
        <th width="20%"><?php echo $lang['ULTIMA_ITERACION']; ?> </th>
        <th width="20%"><?php echo $lang['ESTADO']; ?></th>
        <th width="20%">&nbsp;</th>
    </tr>
</table>
<div style="height:150px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->
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
                  <?php echo $lang['INFO_NO_INCID']; ?> 
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
<h1 id="headerInterno"><a><i><?php echo $lang['MAQUINAS_BIG']; ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="20%"><?php echo $lang['ID_MAQUINA']; ?></th>
    	<th width="20%"><?php echo $lang['SERVICIO']; ?></th>
       	<th width="20%"><?php echo $lang['ULT_INCID']; ?></th>
				<th width="20%"><?php echo $lang['DOCUMENTACION']; ?></th>
        <th width="10%">&nbsp;</th>
        <th width="10%">&nbsp;</th>
    </tr>
</table>
<div style="height:150px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->
<form method="POST" action="../../Controller/maquinasController.php">
	<table class="default">
		<?php
            $incidencias = $_SESSION['listaIncidMaquina'];
            $servicio = $_SESSION['listaServicios'];
			if(isset($_SESSION['maqsJefe']))
			$rows = $_SESSION['maqsJefe'];
			if (empty($rows)) {
			?>
				<div class="alert alert-warning" role="alert">
			<?php echo $lang['INFO_NO_MAQ']; ?>
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
					<td width="20%"><?php if(!$incidencias[$cont]) echo "-"; else echo $incidencias[$cont][0][0]; ?></td>
          <td width="3%"></td>
          <td width="20%">
            <?php
            if(isset($row[4])){ ?>
            <a href="../<?php echo $row[4];?>" target="_blank">
              <img src="../../Resources/images/PDF.png">
            </a>
            <?php } else echo "-" ?>
          </td>
					<td width="20%"><a href="../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>"><input type="button" name="accion" value="Consultar"></input></a></button></td>
				</tr>
				<?php
                    $cont++;
				}
			}
		?>
	</table>
</form>
</div>
<?php
    require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
