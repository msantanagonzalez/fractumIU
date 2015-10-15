<?php
    include_once '../../Controller/common.php';
    $userType="externo";
    require_once $_SESSION['cribPath'].'View/structure/header.php';
    //---- Meter esto en todas las vistas ----
  require_once $_SESSION['cribPath'].'Controller/generalController.php';
  checkIfLogged();
  // ----------------------------------------
?>

<h1 id="headerExterno"><a><?php echo $lang['INCIDENCIAS_BIG']; ?></a></h1> <!--SECCIÓN-->
<table class="default">
    <tr>
      <th width="17%">#ID<?php echo $lang['INC']; ?></th>
        <th width="17%"><?php echo $lang['ULTIMO_OPERARIO']; ?></th>
        <th width="17%"><?php echo $lang['RESPONSABLE']; ?> </th>
      <th width="17%"><?php echo $lang['FECHA_APERTURA']; ?></th>
        <th width="17%"><?php echo $lang['ESTADO']; ?></th>
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
        <?php echo $lang['INFO_NO_INCID']; ?>
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
 				   <button type="button"  value="Consulta" onclick="window.location.href='../../Controller/incidenciasController.php?accion=Consulta&idIncidencia=<?php echo $row['idIncid']; ?>'"><?php echo $lang['CONSULTAR']; ?> </button>
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
<h1 id="headerExterno"><a><?php echo $lang['MAQUINAS_BIG']; ?></a></h1> <!--SECCIÓN-->
<table class="default"><!--TABLA-->
    <tr>
        <th width="20%"><?php echo $lang['ID']; ?></th>
        <th width="20%"><?php echo $lang['NOMBRE']; ?></th>
        <th width="20%"><?php echo $lang['MANTENIMIENTO']; ?></th>
				<th width="20%"><?php echo $lang['ULT_INCID']; ?></th>
        <th width="20%">&nbsp; </th>
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
        <?php echo $lang['INFO_NO_MAQ']; ?>
          </div>
        <?php
        }
        else{
      foreach ($rows as $row) {
    ?>
    <form method="POST" action="../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>">

    <tr>
      <td width="20%"><?php echo $row['idMaq']; ?></th>
      <td width="20%"><?php echo $row['nomMaq']; ?></td>
      <?php if ($row['idServ']) { ?>
        <td>Si</td>
      <?php } else { ?>
        <td>No</td>
      <?php } ?>
      <td width="20%">
            <?php
            if(isset($row[4])){ ?>
            <a href="../<?php echo $row[4];?>" target="_blank">
              <img src="../../Resources/images/PDF.png">
            </a>
            <?php } else echo "-" ?>
          </td>
      <td width="20%">
        <button type="button"  value="Consulta" onclick="window.location.href='../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>'"><?php echo $lang['CONSULTAR']; ?></button>
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
