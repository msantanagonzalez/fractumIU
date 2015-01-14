<?php 
/**
* Clase maquina
*/


class Maquina {

	private $idMaquina;
	private $numeroSerie;
	private $descripcionMaquina;
	private $nombreMaquina;
	private $costeMaquina;
	
	
/**
	*	Constructor de maquina.
	*/

	function __construct($idMaquina = NULL, $numeroSerie = NULL, $descripcionMaquina = NULL, $nombreMaquina = NULL, $costeMaquina = NULL){
		$this->idMaquina     	   = $idMaquina;
		$this->numeroSerie    	   = $numeroSerie;
		$this->descripcionMaquina  = $descripcionMaquina;
		$this->nombreMaquina       = $nombreMaquina;
		$this->costeMaquina  	   = $costeMaquina;
	
	}

	/**
	 * Inicio de las funciones SQL
	 */
	
	public function alta(){
	
			mysql_query("INSERT INTO MAQUINA(idMaq, nSerie, descripMaq, nomMaq, costeMaq) 
						VALUES ('$this->idMaquina','$this->numeroSerie','$this->descripcionMaquina','$this->nombreMaquina',
						'$this->costeMaquina')") or die(mysql_error());
		
		
	}
	
	public function consultaMaquina($maquina){
	
			$sql = mysql_query( "SELECT * FROM MAQUINA WHERE idMaq = '$maquina'") or die(mysql_error());

			return $sql;
		
		}
	
	
	public function modificacion($idMaquina){
				
				mysql_query("UPDATE MAQUINA SET nomMaq = '$this->nombreMaquina'
					WHERE idMaq = '$idMaquina'") or die(mysql_error());
	}
	
	
	public function lista(){
	
			$sql = mysql_query("SELECT * FROM MAQUINA");

			return $sql;
	}
	public function listaMaquinasOpE(){
	

	$sql = mysql_query("SELECT M.* FROM REALIZA R LEFT JOIN SERVICIO S ON R.idServ = S.idServ 
		LEFT JOIN MAQUINA M ON S.idMaq = M.idMaq
		WHERE R.dniUsu =  '".$_SESSION['dni']."'");
	
	return $sql;
	
	}
	
	public function borrar(){
		$borrarMaquina = "DELETE FROM MAQUINA WHERE idMaq = '$this->idMaquina'";
		$resultado = mysql_query($borrarMaquina) or die(mysql_error());
		return $resultado;
	
	}

	
}
		
?>