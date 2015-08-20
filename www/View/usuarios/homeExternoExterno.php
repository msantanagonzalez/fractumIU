<?php
    $userType="externo";
    require_once $_SESSION['cribPath'].'View/structure/header.php';
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
          <td width="17%"><?php echo $row['estadoIncid']; ?></td>
          <td width="17%"><button><a href="../../Controller/incidenciasController.php?accion=Consulta&idIncidencia=<?php echo $row['idIncid']; ?>">Consultar</a></button></td>
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
        <th width="25%"><?= i18n("Últ. Incidencia") ?></th>
        <th width="15%"> </th>
    </tr>
</table>
<div style="height:107px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->
    <table class="default"><!--TABLA-->
    <?php 
      $rows2 = $_SESSION['listaMaquina1'];
      foreach ($rows2 as $row) {
    ?>
    <form method="POST" action="../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>">

    <tr>
      <td width="10%"><?php echo $row['idMaq']; ?></th>
      <td width="25%"><?php echo $row['nomMaq']; ?></td>
        <td width="25%">No</td>
        <td width="25%">10/11/2013</td>
      <td width="20%"><a href="../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>"><button >Consultar</button></a></td>
    </tr>
    <?php } ?>
  </table>


    <table class="default"><!--TABLA-->
    <?php 
      $rows = $_SESSION['listaMaquina2'];
      foreach ($rows as $row1) {
    ?>
    <form method="POST" action="../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row1['idMaq'];?>">

    <tr>
      <td width="10%"><?php echo $row1['idMaq']; ?></th>
      <td width="25%"><?php echo $row1['nomMaq']; ?></td>
        <td width="25%">No</td>
        <td width="25%">10/11/2013</td>
      <td width="20%"><a href="../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row1['idMaq'];?>"><button >Consultar</button></a></td>
    </tr>
    <?php } ?>
  </table>

</div>
             	  
<?php
    require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>