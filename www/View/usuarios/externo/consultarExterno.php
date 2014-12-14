<?php
	$userType="externo";
	require_once("../../structure/bodyHeader.php");
?>

<h1 id="headerExterno"><a>- PERFIL $Op.Externo -</a></h1> <br>  <!--SECCIÓN-->
<form name='' id='' method='post' onsubmit=''>
	<div style='height:350px;width:auto;overflow-y: scroll;'>
		<table class='default'>
			<tr> 
				<td>#ID USUARIO:</td> 
		 		<td><input type='text' disabled class='text' value='33614827P' name='idUsuario'></td>
		       	<td>Password:</td>
		      	<td><input type='text' disabled class='text' value='*******' / name='password'></td>
		  	</tr>
		   	<tr>
		     	<td>Nombre:</td>
		       	<td><input type='text' disabled class='text' value='Juan'/ name='nombre'></td>
		       	<td>Apellidos:</td>
		      	<td><input type='text' disabled class='text' value='Gonzalez'/ name='apellidos'></td>
		 	</tr>
			<tr>
				<td></td>
				<td>Empresa:</td>
		       	<td><input type='text' disabled class='text' value='Electricas Pepito'/ name='empresa'></td>
			</tr>
		</table>
	</div>
	<table class='alternative'>
  	<tr>
     	<td colspan='12'><a href=''><input type='button' value='MODIFICAR'></a></td>
  	</tr>
	</table>
</form>

<?php
	require_once("../../structure/bodyFooter.php");
?>