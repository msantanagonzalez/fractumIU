<?php
	$userType="interno";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
	
	$rows = $_SESSION['consultaMaquina']; 
	foreach ($rows as $row) { 
?>

<h1 id='headerInterno'><a>- <?php echo $lang['MAQUINA_BIG']; ?> <?php echo $row['nomMaq']; ?></a></h1> <!--SECCIÓN-->
<!--INICIO TABLA-->
<br>
<form name='consultarMaquina' id='consultarMaquina' onsubmit='' action='../../Controller/maquinasController.php' method='post'>
	
	<div style='height:350px;width:auto;overflow-y: scroll;'>
		<table class='default'>
		
			<tr>
				<td><?php echo $lang['ID_MAQUINA']; ?></td>
				<td><input type='text' class="text"  disabled  name='idMaq' value='<?php echo $row['idMaq']; ?>' /></td>
				<td><?php echo $lang['NUMERO_DE_SERIE']; ?></td>
				<td><input type='text' class="text"  disabled  name='nSerie' value='<?php echo $row['nSerie']; ?>' /></td>
			</tr>
			<tr>
				<td colspan='4'><?php echo $lang['DESCRIPCION']; ?></td>
			</tr>
			<tr>	
		        <td colspan='4'>
					<textarea style="resize:none" rows="4" name='descripcionApertura' disabled>
					<?php echo $row['descripMaq']; ?>
					</textarea>
				</td>
		    </tr>
			<tr>
				<td><?php echo $lang['DOCUMENTACION']; ?></td>
		        <td><img src="../../Recursos/images/PDF.png"></td>
		        <td colspan="2"><a href='altaIncidencia.html'><input type='button' value='Alta Incidencia'></a></td>
			</tr>
			<?php } ?>
		</table>
 	</div>
	<br>
</form>
<h1 id="headerInterno"><a><i><?php echo $lang['INCIDENCIAS_RELATIVAS']; ?></i></a></h1>
<form method="POST" action="../../Controller/maquinasController.php">
	<table class="default">
		<tr> 
			<td width="20%"><?php echo $lang['ID001']; ?></td> 
			<td width="20%"><a href="../../Controller/maquinasController.php?accion=Consulta&idMaq=<?php echo $row['idMaq'];?>" ></a></td> 
			<td width="20%"><?php echo $lang['USUARIO3']; ?></td> 
			<td width="20%"><?php echo $lang['ABIERTA']; ?></td>
			<td width="15%"><a href="../../Controller/maquinasController.php?accion=Consulta&idMaq&idIncid=<?php echo $row['idIncid']; echo $row['idMaq']?>"></a></td>
			<td width="5%"><a href="../../Controller/incidenciasController.php?accion=Consulta&idIncid=<?php echo $row['idIncid'];?>"><?php echo $lang['CONSULTAR']; ?></a></td>
		</tr>
	</table>
</form>
<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>

