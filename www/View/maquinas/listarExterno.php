<?php
	$userType="externo";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>

<h1 id="headerExterno"><a><?= i18n("- MAQUINAS -") ?></a></h1> <!--SECCIÓN-->
<table class="default"><!--TABLA-->
	<tr>
		<th width="20%"><?= i18n("ID") ?></th>
		<th width="20%"><?= i18n("Nombre:") ?></th>
	  <th width="20%"><?= i18n("Servicio") ?></th>
		<th width="20%"><?= i18n("Documentación") ?></th>
		<th width="20%"> </th>
	</tr>
</table>
<div style="height:350px;width:auto;overflow-y: scroll;"><!--ESTO DA LUGAR AL SCROLL-->

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
      <td width="20%"><?php echo $row['idMaq']; ?></th>
      <td width="20%"><?php echo $row['nomMaq']; ?></td>
			<td width="20%">
				<?php if(isset($row['idServ'])){echo "S&Iacute;";} else echo "NO" ?>
			</td>
			<td width="20%">
			<?php
			 if(isset($row['urlDocMaq'])){ ?>
				<a href="../<?php echo $row['urlDocMaq'];?>" target="_blank">
				 <img src="../../Resources/images/PDF.png">
				 </a>
			<?php } else echo "-" ?>
		 </td>
      <td width="20%">
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
