<?php
//file: controller/LanguageController.php

require_once("../Model/I18n.php");

/**
 * Clase LanguageController
 * 
 * Controller para administrar el idioma de la sesión .
 * Permite cambiar el idioma actual
 * Estableciendo que en la instancia singleton I18n
 *
 */
class LanguageController {
    const LANGUAGE_SETTING = "__language__";
    
    /**
     * Acción para cambiar el idioma actual
     */
    public function change() {
      if(!isset($_GET["lang"])) {
		throw new Exception("no se proporcionó parámetro lang");
      }
      if (session_status() == PHP_SESSION_NONE) {      
		session_start();
      }
      I18n::getInstance()->setLanguage($_GET["lang"]);
      //header("Location: ../View/usuarios/Login.php");
	  require_once("../View/usuarios/Login.php");
	  echo "estoy aquí";
      die();
    }
}
header("Location: ../View/usuarios/Login.php");