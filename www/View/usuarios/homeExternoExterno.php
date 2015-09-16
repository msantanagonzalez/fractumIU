<?php
    $userType="externo";
    require_once $_SESSION['cribPath'].'View/structure/header.php';
    //---- Meter esto en todas las vistas ----
  require_once $_SESSION['cribPath'].'Controller/generalController.php';
  checkIfLogged();
  // ----------------------------------------
?>

<h1 id="headerExterno"><a><?= i18n("- INCIDENCIAS -") ?></a></h1> <!--SECCIÓN-->
<table class="default">
    <tr>
      <th width="17%">#ID <?= i18n("Inc.") ?></th>
        <th width="17%"><?= i18n("Últ. operario") ?></th>
        <th width="17%"><?= i18n("Responsable") ?> </th>
      <th width="17%"><?= i18n("Fecha Apertura") ?></th>
        <th width="17%"><?= i18n("Estado:") ?></th>
        <th width="17%">&nbsp;</th>
    </tr>
</table>
<div style="height:107px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->
  <form method="POST" action="../../Controller/incidenciasController.php">
    <table class="default">
      <?php
        if(isset($_SESSION['listaIncidencia1']))
        $rows = $_SESSION['listaIncidencia1'];
        if (empty($rows)) {
        ?>
          <div class="alert alert-warning" role="alert">
          <?= i18n("| INFO |- No hay incidencias para listar") ?>
          </div>
        <?php
        }
        else{
          foreach ($rows as $row) {
        ?>
        <tr>
          <td width="17%"><?php echo $row['idIncid'];?></td>
          <td width="17%">[----------]</td>
          <td width="17%"><?php echo $row['dniResponsable'];?></a></td> <!-- Falta linkar al perfil del usuario. -->
          <td width="17%"><?php echo $row['fAper']; ?></td>
          <?php if ($row['estadoIncid'] == "Derivada") { ?>
          		<td width="17%">Abierta</td>
          <?php } else if($row['estadoIncid'] == "En Curso Externo") { ?>
	          	<td width="17%">En Curso</td>
          <?php } else { ?>
              <td width="17%">Realizada</td>
          <?php } ?> 
         <td width="10%">
 				   <input type="button"  value="Consulta" onclick="window.location.href='../../Controller/incidenciasController.php?accion=Consulta&idIncidencia=<?php echo $row['idIncid']; ?>'"/>
 		     </td>
        </tr>
        <?php
        }
      }
      ?>
    </table>
  </form>
</div>
<br>
<h1 id="headerExterno"><a><?= i18n("- MÁQUINAS -") ?> </a></h1> <!--SECCIÓN-->
<table class="default"><!--TABLA-->
    <tr>
        <th width="10%">ID</th>
        <th width="25%"><?= i18n("Nombre:") ?></th>
        <th width="25%"><?= i18n("Mantenimiento") ?></th>
        <th width="15%"> </th>
    </tr>
</table>
<div style="height:107px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->
    <table class="default"><!--TABLA-->
    <?php

        if(isset($_SESSION['listaMaquina2'])){
          $rows = $_SESSION['listaMaquina2'];
        }
        if (empty($rows)) {
        ?>
          <div class="alert alert-warning" role="alert">
          <?= i18n("| INFO |- No hay maquinas para listar") ?>
          </div>
        <?php
        }
        else{
      foreach ($rows as $row) {
    ?>
    <form method="POST" action="../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>">

    <tr>
      <td width="10%"><?php echo $row['idMaq']; ?></th>
      <td width="25%"><?php echo $row['nomMaq']; ?></td>
      <?php if ($row['idServ']) { ?>
        <td>Si</td>
      <?php } else { ?>
        <td>No</td>
      <?php } ?>
      <td width="10%">
        <input type="button"  value="Consulta" onclick="window.location.href='../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>'"/>
    </td>
    </tr>
    <?php } ?>
    </form>
  </table>
    <?php } ?>
    </form>
  </table>

</div>

<?php
    require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
