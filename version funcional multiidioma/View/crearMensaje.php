<?php
/*
Se utiliza la variable de sesion 'notificaciones',la cual contiene un array con dos
variables $mensaje que contiene un mensaje y $alerta que define la clase del div
*/
	if(isset($_SESSION['notificaciones'])){
		foreach($_SESSION['notificaciones'] as $mensaje){
	?>	
			<div class="alert <?php echo "alert-".$mensaje['alerta'];?>" role="alert">
				<?php echo $mensaje['mensaje']; ?>
			</div>
	<?php		
		}
		unset($_SESSION['notificaciones']);
	}
?>