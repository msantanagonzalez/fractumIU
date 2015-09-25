<?php
    include_once '../../Controller/common.php';
	$userType="jefe";
	require_once $_SESSION['cribPath'].'View/structure/header.php';
?>
<script type="text/javascript" src="../../Resources/js/Validaciones.js"></script>
<h1 id="headerJefe"><a><i><?php echo $lang['MAQUINAS_BIG']; ?></i></a></h1>
<form name='FromAltaMaquina' onsubmit="return altaMaquina()" action='../../Controller/maquinasController.php' method='POST' enctype="multipart/form-data">
	<table class="default">
		<tr>
			<td width="25%"><?php echo $lang['ID_MAQUINA']; ?> </td>
			<td width="25%"><input id="idMaq" type="text" class="text"  name="idMaq" value=''/></td>
			<td width="25%"><?php echo $lang['NUMERO_DE_SERIE']; ?> </td>
			<td width="25%"> <input id="numSerie" type="text" class="text" name="nSerie" value=''/></td>
		</tr>
		<tr>
			<td width="25%"><?php echo $lang['NOMBRE']; ?></td>
			<td width="25%"><input id="nomMaq" type="text" class="text"  name="nomMaq" value=''/></td>
			<td width="25%"><?php echo $lang['COSTE']; ?></td>
			<td width="25%"><input id="coste" type="text" class="text"  name="costeMaq" value=''/></td>
		</tr>
		<tr>
			<td width="25%"><br><?php echo $lang['DESCRIPCION']; ?></td>
			<td colspan='3' width="75%">
				<textarea id="des" style="resize:none; text-align:left;" style="t" rows="4" name="descripMaq" > </textarea>
			</td>
		</tr>
	<tr>
			<td><?php echo $lang['DOCUMENTACION']; ?></td>
        	<td><img src="../../Resources/images/PDF.png"></td>
        	<td colspan="2"><input type="file" name="docMaquina" id="docMaquina"></td>
		</tr>
		<tr>
			<td colspan="4"><input type="submit" name="accion" value="Alta"></td>
		</tr>
	</table>
</form>

<?php
	require_once $_SESSION['cribPath'].'View/structure/footer.php';
?>
