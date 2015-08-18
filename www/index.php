<?php
//----------|Get the path|----------//
$path = dirname(__FILE__); //Gets the full path
$smallPath = mb_substr($path,0,28); //gets the server path
define('cribPath',$smallPath.'/');
//---------------------------------//
$acceso = "ON";
require_once cribPath.'Controller/generalController.php';
?>
