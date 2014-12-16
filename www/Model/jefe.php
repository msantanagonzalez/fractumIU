<?php 
/**
* Clase jefe que hereda de clase usuario.
*/

include_once('usuario.php');

class jefe extends usuario {
	private $telefJefe;
	private $mailJefe;

	protected $consultarUsuario  = "SELECT * FROM JEFE WHERE dniUsu = '$this->dniUsu'";
	protected $insertarUsuario   = "INSERT INTO JEFE(dniUsu, telefJefe ,mailJefe) VALUES ('$this->dniUsu','$this->telefJefe','$this->mailJefe')";
	protected $eliminarUsuario   = "DELETE FROM JEFE WHERE dniUsu = '$this->dniUsu'";
	protected $actualizarUsuario = "UPDATE JEFE SET dniUsu='$this->dniUsu', telefJefe='$this->telefJefe', mailJefe='$this->mailJefe' where dniUsu= '$this->dniUsu'";


	/**
	* Usa el mismo constructor que usuario, solamente le damos valor a esos atributos
	*/

	private function setTelefJefe($telef){
		$this->telefJefe = $telef;
	}

	private function setMailJefe($mail){
		$this->mailJefe = $mail;
	}







/**	
*	function __construct($telefJefe,$mailJefe)
*	{
*		$this->telefJefe =$telefJefe;
*		$this->mailJefe  =$mailJefe;
*	}
*	function altaUsuario(){
*		$this->ConectDB();
*		$sql = "SELECT * FROM JEFE WHERE dniUsu = '$this->dniUsu'";
*		$resultado = mysql_query($sql) or die(mysql_error());
*		if (!$resultado) {
*			$sql1= "INSERT A REALIZAR";
*			$resultado1 = mysql_query($sql1) or die(mysql_error());
*		} else {
*			return false;
*		}
*	}
*/
}


?>


