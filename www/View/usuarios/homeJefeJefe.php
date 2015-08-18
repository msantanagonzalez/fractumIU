<?php
//----------|Get the path|----------//
$path = dirname(__FILE__); //Gets the full path
$smallPath = mb_substr($path,0,28); //gets the server path
define('cribPath',$smallPath.'/');
//---------------------------------//

	$userType	=	"jefe";
	require_once cribPath.'View/structure/header.php';
	require_once cribPath.'View/crearMensaje.php';
?>
<h1 id="headerJefe"><a><i><?= i18n("INCIDENCIAS") ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="17%">#ID <?= i18n("Inc.") ?></th>
       	<th width="17%"><?= i18n("Problema") ?></th>
        <th width="17%"><?= i18n("Últ. operario") ?> </th>
    	<th width="17%"><?= i18n("Fecha") ?></th>
        <th width="17%"><?= i18n("Estado") ?></th>
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
					<td width="17%">
						<input type="button" value="Consulta" onclick="window.location.href='../../Controller/incidenciasController.php?accion=Consulta&idIncidencia=<?php echo $row['idIncid']; ?>'"/>
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
<h1 id="headerJefe"><a><i><?= i18n("MÁQUINAS") ?></i></a></h1>
<table class="default">
    <tr>
    	<th width="20%">#ID <?= i18n("Máquina") ?></th>
    	<th width="20%"><?= i18n("Servicio") ?></th>
       	<th width="20%"><?= i18n("Últ. Incidencia") ?></th>
        <th width="10%">&nbsp;</th>
        <th width="10%">&nbsp;</th>
    </tr>
</table>
<form method="POST" action="../../Controller/maquinasController.php">
	<table class="default">
		<?php 
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
				foreach ($rows as $row) {
				?>
				<tr> 
					<td width="20%"  name = "idMaq"><?php echo $row['idMaq']; ?></td> 
					<td width="20%"><?= i18n("Si") ?></td> 
					<td width="20%">13/09/2014</td> 
					<td width="10%">
						<input type="button"  value="Consulta" onclick="window.location.href='../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>'"/>
					</td>
					<td width="10%">
						<input type="button" value="Eliminar" onclick="window.location.href='../../Controller/maquinasController.php?accion=Eliminar&idMaq=<?php echo $row['idMaq'];?>'">
					</td>
				</tr>
				<?php 
				} 
			}
		?>
</table>
</form>
				
<?php
	require_once cribPath.'View/structure/footer.php';
?>