<?php
	$userType="interno";
	require_once("../structure/header.php");
?>

<h1 id='headerInterno'><a>- TRABAJANDO $IDincidencia -</a></h1> <!--SECCIÓN-->
<!--INICIO TABLA-->
<br>
<form name='' id='FormDetalle_Tarea' onsubmit='return Confirmar_EliminacionTarea()' action='' method='post' enctype="multipart/form-data">
	<div style='height:350px;width:auto;overflow-y: scroll;'>
		<table class='default'>
			<tr>
				<td>Operario Alta:</td>
				<td><input type='text' disabled value='$idOperario' / name='idOperario'></td>
				<td>Hora Inicio:</td>
				<td><input type='text' disabled class='text' value='$horaSistema'/ name='Estado_Tarea' id='Estado_Tarea'></td>
			</tr>
			<tr>
				<td>ID Incidencia:</td>
				<td><input type='text' disabled value='I001'></td>
				<td>Nombre Maquina:</td>
				<td><input type='text' disabled value='$nombreMaquina'></td>
			</tr>
			<tr>
				<td>Fecha Creacion:</td>
				<td><input type='date' disabled class='text' value='' / name='Nombre_Tarea'></td>
				<td>Coste Trabajo:</td>
			    <td><input type='text' value=''></td>
			</tr>
			<tr>
				<td colspan='4'>Descripcion:</td>
			</tr>
			<tr>	
			    <td colspan='4'>
					<textarea style="resize:none" rows="5" name='descripcionApertura'>
					</textarea>
				</td>
			</tr>
			<tr>
				<td>Documentacion:</td>
			</tr>
			<tr>
				<td colspan='4'><input type='file' name='documentacionTrabajo'></td>
			</tr>
		</table>
	</div>
	<table>
		<tr> 
			<td width='25%'><input type='button' value='GUARDAR TRABAJO'> </td>
			<td width='25%'><input type='button' value='CERRAR TRABAJO'> </td>
			<td width='25%'><a href="consultarIncidencia.html"><input type='button' value='ATRAS'></a></td>
		</tr>
	</table>
</form>

<?php
	require_once("../structure/footer.php");
?>