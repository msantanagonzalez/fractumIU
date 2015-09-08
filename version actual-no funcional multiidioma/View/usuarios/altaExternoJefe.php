<?php
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerJefe"><a><i><?php echo $lang['ALTA_OPERARIO_EXTERNO_BIG']; ?></i></a></h1>
<form  onsubmit="return altaOperarioExterno()" method="POST" action="../../Controller/usuariosController.php">
	<table class="default">
		<tr> 
			<td width="25%"><?php echo $lang['DNI_OPERARIO_EXTERNO']; ?> </td> 
			<td width="25%"><input id="dni" type="text" class="text" name="dni"/></td> 
			<td width="25%"><?php echo $lang['EMPRESA']; ?> </td>
			<td width="25%">
			<select title="Seleccione una empresa" required name="cif">
			  <option value="">----</option>
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
			<td width="25%"><?php echo $lang['NOMBRE']; ?> </td> 
			<td width="25%"><input id="nombre" type="text" class="text" name="nombre"/></td> 
			<td width="25%"><?php echo $lang['APELLIDOS']; ?> </td> 
			<td width="25%"> <input id="apellidos" type="text" class="text" name="apellidos"/></td>
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
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>