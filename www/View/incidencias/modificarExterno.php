<?php
  include_once '../../Controller/common.php';
  require_once $_SESSION['cribPath'].'View/structure/header.php';
  include_once '../../Controller/common.php';
$rows = $_SESSION['consultaIncidencia'];
foreach ($rows as $row) { ?>
<h1 id="headerExterno"><a><i><?php echo $lang['INCIDENCIAS_BIG']; ?><?php echo $row['idIncid']; ?></i></a></h1>
<div style='height:525px;width:auto;overflow-y: scroll;'>
  <form method="POST" action="../../Controller/incidenciasController.php">
    <input type="hidden" class="text" name="idIncidencia" value="<?php echo $row['idIncid']; ?>"/>
    <input type="hidden" class="text" name="derivada" value="<?php echo $row['derivada']; ?>"/>
    <input type="hidden" class="text" name="cifEmpr" value="<?php echo $row['cifEmpr']; ?>"/>
    <input type="hidden" class="text" name="dniResponsable" value="<?php echo $row['dniResponsable']; ?>"/>
    <input type="hidden" class="text" name="dniApertura" value="<?php echo $row['dniApertura']; ?>"/>
    <input readonly="readonly" type="hidden" class="text" name="fechaApertura" value="<?php echo $row['fAper']; ?>"/>
    <input type="hidden" class="text" name="fechaCierre" value="<?php echo $row['fCier']; ?>" />
    <input type="hidden" class="text" name="idMaquina" value="<?php echo $row['idMaq']; ?>" />
    <input type="hidden" class="text" name="descripcion" value="<?php echo $row['descripIncid']; ?>" />

    <table class="default">
      <tr>
        <td width="25%"><?php echo $lang['APERTURA']; ?></td>
        <td width="25%"><input type="text" class="text" disabled name="dniApertura" value="<?php echo $row['dniApertura']; ?>"/></td>
        <td width="25%"><?php echo $lang['RESPONSABLE']; ?></td>
        <td width="25%"><input type="text" class="text" disabled name="dniResponsable" value="<?php echo $row['dniResponsable']; ?>"/></td>
      </tr>
      <tr>
        <td width="25%"><?php echo $lang['FECHA_APERTURA']; ?></td>
        <td width="25%"><input readonly="readonly" type="text" class="text" disabled name="fechaApertura" value="<?php echo $row['fAper']; ?>" /></td>

      </tr>
      <tr>
        <td><?php echo $lang['ESTADO']; ?></td>
        <td>
          <select name='estadoIncidencia'>
            <option value='<?php echo $row['estadoIncid']; ?>' selected>-- En Curso --</option>
            <option value='Pendiente Cierre'>Finalizada</option>
          </select>
        </td>
        <td><?php echo $lang['MAQUINA']; ?></td>
        <td>
          <select name='idMaquina' disabled>
              <option value='<?php echo $row['idMaq']; ?>' selected><?php echo $row['idMaq']; ?></option>
          </select>
         </td>
      </tr>
      <tr>
        <td width="25%"><br><?php echo $lang['DESCRIPCION']; ?></td>
        <td colspan='3' width="75%">
          <textarea style="resize:none; text-align:left;" style="t" rows="4" name='descripcion' disabled><?php echo $row['descripIncid'];?></textarea>
        </td>
      </tr>
      <?php } ?>
    </table>

    <table class="default">
      <tr>
        <td colspan="4"><button type="submit" name="accion" value="Modificado"><?php echo $lang['MODIFICAR'] ?></button></td>
      </tr>
    </table>
  </form>
</div>

<?php
  require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
