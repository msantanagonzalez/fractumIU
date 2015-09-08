</div> <!--FIN INNER-->	
</div><!--FIN CONTENIDO-->
<?php
require_once('nav.php');
switch ($_SESSION['tipo']){
	case "J":
		navJefe();
	break;
	case "I":
		navInterno();
	break;	
	case "E":
		navExterno();
	break;
}
?>
</div><!--FIN WRAPPER-->
</body>
<form>
<!-- POSIBLE MEJORA
<select onchange=”window.location.href= this.form.URL.options[this.form.URL.selectedIndex].value” name=”URL”>
<option>Select language</option>
<option value=”nav.php?lang=es”>Español</option>
<option value=”nav.php?lang=ga”>Gallego</option>
-->
</select>
</form>
</html>