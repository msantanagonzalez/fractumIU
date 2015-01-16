<?php
    $userType="externo";
    require_once("../structure/header.php");
?>

<h1 id="headerExterno"><a><?= i18n("- INCIDENCIAS -") ?></a></h1> <!--SECCIÓN-->
<table class="default">
    <tr>
      <th width="17%">#ID <?= i18n("Inc.") ?></th>
        <th width="17%"><?= i18n("Últ. operario") ?></th>
        <th width="17%"><?= i18n("Últ. iteración") ?> </th>
      <th width="17%"><?= i18n("Título") ?></th>
        <th width="17%"><?= i18n("Estado:") ?></th>
        <th width="17%">&nbsp;</th>
    </tr>
</table>
<div style="height:107px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->
  <form method="POST" action="../../Controller/incidenciasController.php">
    <table class="default">
      <?php 
        if(isset($_SESSION['listaIncidencia']))
        $rows = $_SESSION['listaIncidencia'];
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
          <td width="17%">Avería alternador</td> 
          <td width="17%">Fulanito</a></td> <!-- Falta linkar al perfil del usuario. -->
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
        <tr>
            <td width="10%">MA001</th>
            <td width="25%"><?= i18n("Centrifugadora Verduras") ?></td>
            <td width="25%"><?= i18n("No") ?></td>
            <td width="25%">10/11/2013</td>
            <td width="15%"><button onclick="window.location.href='consultarMaquina.html'">Consultar</button></td>
        </tr>
        <tr>
            <td width="10%">MA002</th>
            <td width="25%"><?= i18n("Cortadora Tomates") ?></td>
            <td width="25%"><?= i18n("Si") ?></td>
            <td width="25%">14/11/2014</td>
            <td width="15%"><button onclick="window.location.href='consultarMaquina.html'">Consultar</button></td>
        </tr>
    </table>
</div>
             	  
<?php
    require_once("../structure/footer.php");
?>