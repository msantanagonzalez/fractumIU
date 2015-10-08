<?php
include_once '../../Controller/common.php';
require_once $_SESSION['cribPath'].'View/structure/header.php';
$rows = $_SESSION['consultaIncidencia'];

foreach ($rows as $row) { ?>
<h1 id="headerInterno"><a><i><?php echo $lang['INCIDENCIA_BIG']; ?> <?php echo $row['idIncid']; ?></i></a></h1>
<div style='height:525px;width:auto;overflow-y: scroll;'>
	<form method="POST" action="../../Controller/incidenciasController.php">
		<?php
		require_once $_SESSION['cribPath'].'View/crearMensaje.php';

		?>
		<input type="hidden" class="text" name="idIncidencia" value="<?php echo $row['idIncid']; ?>"/>
		<input type="hidden" class="text" name="derivada" value="<?php echo $row['derivada']; ?>"/>
		<table class="default">

			<tr>
				<td width="25%"><?php echo $lang['APERTURA']; ?> </td>
				<td width="25%"><input type="text" class="text" disabled name="dniApertura" value="<?php echo $row['dniApertura']; ?>"/></td>
				<td width="25%"><?php echo $lang['RESPONSABLE']; ?> </td>
				<td width="25%"><input type="text" class="text" disabled name="dniResponsable" value="<?php echo $row['dniResponsable']; ?>"/></td>
			</tr>
			<tr>
				<td width="25%"><?php echo $lang['FECHA_APERTURA']; ?> </td>
				<td width="25%"><input type="text" class="text" disabled name="fechaApertura" value="<?php echo $row['fAper']; ?>" /></td>
				<?php if($row['estadoIncid'] == 'Cerrada'){ ?>
				<td width="25%"><?php echo $lang['FECHA_CIERRE']; ?> </td>
				<td width="25%"><input type="text" class="text" disabled name="fechaCierre" value="<?php echo $row['fCier'] ?>" /></td>
				<?php } ?>
			</tr>
			<tr>
				<td><?php echo $lang['ESTADO']; ?></td>
				<td>
					<select name='estadoIncidencia' disabled>
						<option value='<?php echo $row['estadoIncid']; ?>' selected><?php echo $row['estadoIncid']; ?></option>
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
					<textarea style="resize:none; text-align:left;" style="t" rows="4" name='descripcion' disabled>
					<?php echo $row['descripIncid'];?>
					</textarea>
				</td>
			</tr>

		</table>
	</form>
	<table class="default">
		<tr>
			<?php

			$ultimaIteracion = $_SESSION['estadoIteracion'];
			if(($row['dniApertura']==$_SESSION['dni']) and ($row['estadoIncid']!='Cerrada') and ($row['estadoIncid']!='Derivada')and (($ultimaIteracion [0][0]!= 1) or ($ultimaIteracion [0][0] == 'En Curso Externo'))){?>
					<td colspan="4"><a href="../../Controller/incidenciasController.php?accion=Modificar&idIncidencia=<?php echo $row['idIncid']; ?>"><button type="submit" name="Modificar" value="Modificar"><?php echo $lang['MODIFICAR']; ?></button></a></td>
				<?php
			}
			?>
		</tr>
<?php } ?>

	</table>
	<h1 id="headerInterno"><a><i><?php echo $lang['ITERACIONES_BIG']; ?></i></a></h1>
	<table class="default"><!--TABLA-->
	    <tr>
				<th width="20%"><?php echo $lang['ITERACION']; ?></th>
        <th width="20%"><?php echo $lang['OPERARIO']; ?></th>
				<th width="20%"><?php echo $lang['ESTADO']; ?></th>
				<th width="20%"><?php echo $lang['DOCUMENTACION']; ?></th>
	      <th width="20%">&nbsp; </th>
	    </tr>
	</table>
	<form method="POST" action="../../Controller/iteracionesController.php">
		<table class="default"><!--TABLA-->
			<?php

				$ultimaIteracion = $_SESSION['estadoIteracion'];
					/*var_dump($ultimaIteracion);*/
				$rows2 = $_SESSION['listaIteraciones'];

				foreach ($rows2 as $row2) {


			?>
			<tr>
				<td width="20%"><?php echo $row2['nIteracion']; ?></td>
				<td width="20%"><?php echo $row2['dniUsu']; ?></td>
				<td width="20%"><?php if($row2['estadoItera']==1){echo 'Abierta' ;}else{ echo 'Cerrada';}  ?></td>
				<td width="20%">
				 <?php if(isset($row2['urlDocItr'])){ ?>
					<a href="../<?php echo $row2['urlDocItr'];?>" target="_blank">
						<img src="../../Resources/images/PDF.png">
					</a>
				 <?php } else echo "-" ?>
				</td>
				<td width="20%"><button type="button" onclick="window.location.href='../../Controller/iteracionesController.php?accion=consultaIteracion&idIncid=<?php echo $row2[0] ?>&nIteracion=<?php echo $row2[1] ?>'"><?php echo $lang['CONSULTAR']; ?></button>

			</tr>
				<?php } ?>
		</table>
	</form>
		</table>
<table class="default">
	<tr>
			<?php

			if(($row['estadoIncid']!='Cerrada')AND ($row['estadoIncid']!='Derivada') AND ($row['estadoIncid']!='Pendiente Derivar')AND($ultimaIteracion [0][0]!= 1)){
			?>

					<td colspan="4"><button type="button" onclick="window.location.href='../../View/iteraciones/altaInterno.php?accion=altaIteracion&idIncidencia=<?php echo $row['idIncid'] ?>&idMaq=<?php echo $row['idMaq']; ?>'"><?php echo $lang['NUEVA_ITERACION_EMPLEADO_INTERNO']; ?></button></td>

			<?php

			}
			?>
	</tr>

</table>
</div>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
