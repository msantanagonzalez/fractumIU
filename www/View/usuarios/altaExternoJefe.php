<?php
	$userType="jefe";
	require_once("../structure/header.php");
?>

<h1 id="headerJefe"><a><i>ALTA OPERARIO EXTERNO</i></a></h1>
<form method="POST" action="../../Controller/usuariosController.php">
	<table class="default">
		<tr> 
			<td width="25%">DNI Operario Externo: </td> 
			<td width="25%"><input type="text" class="text" name="dni"/></td> 
			<td width="25%">Empresa: </td>
			<td width="25%">
			<select name="cif">
			  <option value="NULL">----</option>
				<?php
				$resul2 = $_SESSION["listaEmpresas"];
					foreach ($resul2 as $empresa){
				?>		
					  <option value="<?php echo $empresa['cifEmpr'];?>"><?php echo $empresa['cifEmpr']."-".$empresa['nomEmpr'];?></option>
				<?php
					}
				?>	
			</select>
			</td>
		</tr>
		<tr> 
			<td width="25%">Nombre: </td> 
			<td width="25%"><input type="text" class="text" name="nombre"/></td> 
			<td width="25%">Apellidos: </td> 
			<td width="25%"> <input type="text" class="text" name="apellidos"/></td>
		</tr>
		<tr>
			<td colspan="4"><input type="submit" name="accion" value="altaExterno"></td>
		</tr> 
	</table>
</form>

<table>
	<tr>
		<td colspan="4"><input type="button" value="Imprimir" onclick='window.print(); return false;'></td>
	</tr> 
</table>
<?php
	require_once("../structure/footer.php");
?>