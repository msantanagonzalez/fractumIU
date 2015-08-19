<?php

//----------|Get the path|----------//
//session_start();
$_SESSION['cribPath'] = dirname(__FILE__).'/'; //Gets the full path
//---------------------------------//
$acceso = "ON";
require_once $_SESSION['cribPath'].'Controller/generalController.php';
?>
