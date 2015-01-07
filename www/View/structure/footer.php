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
</html>