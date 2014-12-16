<?php
	$userType="interno";
	require_once("../../structure/header.php");
?>

<h1 id="headerInterno"><a>- PERFIL $Op.Interno -</a></h1> <br>
<form name='FormPerfil' id='FormPerfil' method='post' onsubmit=''>
	<div style='height:350px;width:auto;overflow-y: scroll;'>
		<table class='default'>
			<tr>
		     	<td>Nombre:</td>
		       	<td><input type='text' disabled class='text' value=''/ name='nombre'></td>
		       	<td>Apellidos:</td>
		      	<td><input type='text' disabled class='text' value=''/ name='apellidos'></td>
		 	</tr>
			<tr> 
				<td>#ID USUARIO:</td> 
				<td><input type='text' disabled class='text' value='' name='idUsuario'></td>
		       	<td>Password:</td>
		      	<td><input type='password' disabled class='text' value='abcde' / name='password'></td>
		  	</tr>
		   	
			<tr>
				<td>Telefono</td>
				<td><input type='text' disabled class='text' value='6746xxxxx' / name='telefono'></td>
				<td>Correo:</td>
		       	<td><input type='text' disabled class='text' value='usuario1@server.com'/ name='correo'></td>
			</tr>
		</table>
	</div>
	<table class='alternative'>
	  	<tr>
	     	<td> </td>
	       	<td colspan='4'><a href=''><input type='button' value='MODIFICAR'></a></td>
	  	</tr>
	</table>
</form>

<?php
	require_once("../../structure/footer.php");
?>