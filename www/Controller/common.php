<?php
//session_start();
header('Cache-control: private'); // IE 6 FIX

if(isSet($_GET['lang'])){
	$lang = $_GET['lang'];

	// register the session and set the cookie
	$_SESSION['lang'] = $lang;

	setcookie("lang", $lang, time() + (3600 * 24 * 30));
}else if(isSet($_SESSION['lang'])){
	$lang = $_SESSION['lang'];
}else if(isSet($_COOKIE['lang'])){
	$lang = $_COOKIE['lang'];
}else{
	$lang = 'es';
}

switch ($lang) {
  case 'es':
  $lang_file = 'lang.es.php';
  break;

  case 'ga':
  $lang_file = 'lang.ga.php';
  break;


  default:
  $lang_file = 'lang.es.php';

}
include_once '../../Resources/languages/'.$lang_file;
?>