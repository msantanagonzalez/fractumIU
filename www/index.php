<?php
//Definimos el controlador por defecto "DEFAULT"
define("DEFAULT_CONTROLLER", "generalController");

function run() {
	if (!isset($_GET["controller"])) {
      $_GET["controller"] = DEFAULT_CONTROLLER; 
    }
	$controller = loadController($_GET["controller"]);
}

function loadController($controllerName) {  
require_once('Controller/'.$controllerName.'.php');
}

run();
?>
