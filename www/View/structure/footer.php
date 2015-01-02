</div> <!--FIN INNER-->	
</div><!--FIN CONTENIDO-->
<?php
echo getcwd();
require_once('../../structure/nav.php');
switch ($userType){
	case "jefe":
		navJefe();
	break;
	case "interno":
		navInterno();
	break;	
	case "externo":
		navExterno();
	break;
}
?>
</div><!--FIN WRAPPER-->
</body>
</html>