<?php
	$userType	=	"jefe";
	require_once("../structure/header.php");
	require '../crearMensaje.php';
?>
<h1 id="headerJefe"><a><i>INCIDENCIAS</i></a></h1>
<table class="default">
    <tr>
    	<th width="17%">#ID Inc.</th>
       	<th width="17%">&Uacute;lt. operario</th>
        <th width="17%">&Uacute;lt. iteración</th>
    	<th width="17%">T&iacute;tulo</th>
        <th width="17%">Estado</th>
        <th width="17%">&nbsp;</th>
    </tr>
</table>
<form method="POST" action="../../Controller/incidenciasController.php">
	<table class="default">
		<?php 
			if(isset($_SESSION['listaIncidencia']))
			$rows = $_SESSION['listaIncidencia'];
			if (empty($rows)) {
			?>
				<div class="alert alert-warning" role="alert">
				| INFO |- No hay incidencias para listar 
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
<br>
<h1 id="headerJefe"><a><i>M&Aacute;QUINAS</i></a></h1>
<table class="default">
    <tr>
    	<th width="20%">#ID M&aacute;q.</th>
    	<th width="20%">Servicio</th>
       	<th width="20%">&Uacute;lt. incidencia</th>
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
				| INFO |- No hay maquinas para listar 
				</div>
			<?php
			}
			else{
				foreach ($rows as $row) {
				?>
				<tr> 
					<td width="20%"  name = "idMaq"><?php echo $row['idMaq']; ?></td> 
					<td width="20%">Sí</td> 
					<td width="20%">13/09/2014</td> 
					<td width="10%"><button><a href="../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>">Consultar</a></button></td>
					<td width="10%"><button><a href="../../Controller/maquinasController.php?accion=Eliminar&idMaq=<?php echo $row['idMaq'];?>">Eliminar</a></button></td>
				</tr>
				<?php 
				} 
			}
		?>
</table>
</form>
				
<?php
	require_once("../structure/footer.php");
?>