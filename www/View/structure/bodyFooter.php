		</div> <!--FIN INNER-->	
	</div><!--FIN CONTENIDO-->
</div><!--FIN WRAPPER-->
<?php
include_once('../../structure/nav.php');
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
</body>
</html>
