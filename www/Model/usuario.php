                                                                                                                                                                           <?php
include '../Controller/bdController.php';

class user{

private $dni;
private $nombre;
private $apellidos;
private $pass;
public $tipoUsu;

function __construct($dni, $nombre, $pass, $tipoUsu){
	$this->dni=$dni;
	$this->nombre=$nombre;
	$this->apellidos=$apellidos;
	$this->pass=$pass;
	$this->typeUser=$typeUser;
}

function altaUsuario(){
	$this->ConectDB();
	$sql = "SELECT tipoUsu FROM USUARIO WHERE tipoUsu = '$this->tipoUsu'";
	$resultado = mysql_query($sql) or die(mysql_error());

	switch ($resultado) {
		case 'J':
			$sql1="INSERT INTO USUARIO(dni, nombre, apellidos, pass, tipoUsu) VALUES ('this->$dni','this->$nombre','this->$apellidos','this->$pass','this->$tipoUsu')";
			$resultado1 = mysql_query($sql1) or die(mysql_error());
			$sql1="INSERT INTO JEFE(dniJefe, telefJefe, mailJefe) VALUES ('this->$dniJefe','this->$telefJefe','this->$mailJefe')";
			$resultado1 = mysql_query($sql1) or die(mysql_error());
			break;
		case 'E':
			$sql1="INSERT INTO USUARIO(dni, nombre, apellidos, pass, tipoUsu) VALUES ('this->$dni','this->$nombre','this->$apellidos','this->$pass','this->$tipoUsu')";
			$resultado1 = mysql_query($sql1) or die(mysql_error());
			$sql1="INSERT INTO OPEXTERNO(dniOpeExt, cifEmpr) VALUES ('this->$dniOpeExt','this->$cifEmpr')";
			$resultado1 = mysql_query($sql1) or die(mysql_error());
			break;
		case 'I':
			$sql1="INSERT INTO USUARIO(dni, nombre, apellidos, pass, tipoUsu) VALUES ('this->$dni','this->$nombre','this->$apellidos','this->$pass','this->$tipoUsu')";
			$resultado1 = mysql_query($sql1) or die(mysql_error());
			$sql1="INSERT INTO OPINTERNO(dniOpeInt, telefOpeInt, mailOpeInt) VALUES ('this->$dniOpeInt','this->$telefOpeInt','this->$mailOpeInt')";
			$resultado1 = mysql_query($sql1) or die(mysql_error());
			break;
	}

}

function login(){
	$this->ConectDB();
	$sql = "SELECT tipoUsu FROM USUARIO WHERE dni = '$this->dni'";
	$result = mysql_query($sql) or die(mysql_error());
	if ($result){
		return false;
	} else {
		return $result;
	}
}

function bajaUsuario(){
	$this->ConectDB();
	$sql = "SELECT tipoUsu FROM usuario WHERE tipoUsu = '$this->tipoUsu'";
	$resultado = mysql_query($sql) or die(mysql_error());

	switch ($resultado) {
		case 'J':
			$sql1="DELETE FROM JEFE WHERE dniJefe = 'this->$dniJefe'";
			$resultado1 = mysql_query($sql1) or die(mysql_error());
			$sql1="DELETE FROM USUARIO WHERE dni = 'this->$dni'";
			$resultado1 = mysql_query($sql1) or die(mysql_error());				
			break;
		case 'E':
			$sql1="DELETE FROM OPEXTERNO WHERE dniOpeExt = 'this->$dniOpeExt'";
			$resultado1 = mysql_query($sql1) or die(mysql_error());
			$sql1="DELETE FROM USUARIO WHERE dni = 'this->$dni'";
			$resultado1 = mysql_query($sql1) or die(mysql_error());
			break;
		case 'I':
			$sql1="DELETE FROM OPINTERNO WHERE dniOpeInt = 'this->$dniOpeInt'";
			$resultado1 = mysql_query($sql1) or die(mysql_error());
			$sql1="DELETE FROM USUARIO WHERE dni = 'this->$dni'";
			$resultado1 = mysql_query($sql1) or die(mysql_error());
			break;
	}
}

function actualizar($email) {
	$this->ConectDB();
	$sql="UPDATE usuarios set nombreUs='$this->name' , email='$this->email' , contraseña= '$this->pass' WHERE email='$email'";
	echo $sql;	
	$this->consult($sql);
	header("Location:index.php");
}

function modificarUsuario(){
	$this->ConectDB();
	
	$sql="UPDATE usuarios set nombreUs='".$this->name."',email='".$this->email."', contraseña='".$this->pass."', esAdmin=".$this->typeUser." where email='".$id."'";
	//echo $sql;
	$this->consult($sql);
	header("location: administrador.php");
}

}

?>