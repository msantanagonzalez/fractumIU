<?php
//file: /Model/I18n.php

/**
 * Clase I18n
 *
 * Esta clase implementa una clase de ayuda para la Internacionalización (i18n ) .
 * Básicamente esta clase Singleton gestiona un conjunto de archivos de traducción
 * (Ubicado en /view/messages/language_[lang].php ) y proporciona una
 * Función de traducción : i18n (cadena)
 * También puede cambiar el idioma actual con la función SetLanguage .
 * El último idioma seleccionado se guarda en la sesión del usuario por lo que es el
 * Idioma recuperada cada vez que esta clase se crea una instancia .
 * Además de este archivo crea una función global , i18n () , como un acceso directo
 * A la función.
 * 
 */ 
class I18n {

  private $messages;
  
  const DEFAULT_LANGUAGE="es";
  const CURRENT_LANGUAGE_SESSION_VAR="__currentlang__";
  
  public function __construct(){    
    if (session_status() == PHP_SESSION_NONE) {      
	session_start();
    }
    
    if (isset($_SESSION[self::CURRENT_LANGUAGE_SESSION_VAR])) {
      $this->setLanguage(
	$_SESSION[self::CURRENT_LANGUAGE_SESSION_VAR]);
    } else{
      $this->setLanguage(self::DEFAULT_LANGUAGE);    
    }
  }
  
  /**
   * Establece el idioma (y lo mantiene en la sesión del usuario )
   *
   * param String $ idioma El idioma que se establece . Por ejemplo : "en"
   * return Void
   */
  public function setLanguage($language) {
 
    include(__DIR__."/../View/messages/messages_$language.php");
    $this->messages = $i18n_messages;
          
    $_SESSION[self::CURRENT_LANGUAGE_SESSION_VAR] = $language;
  }
  
/**
   * Busca la traducción de la lengua actual de una clave dada
   * param String $ key La clave para tranlate
   * return String La traducción de la clave dada
   */
  public function i18n($key) {
    if (isset($this->messages[$key])){
      return $this->messages[$key];
    }else{
      return $key;
    }
  }
  

  private static $i18n_singleton = null;
  /**
   * Obtiene la instancia singleton de esta clase
   *
   * return I18n Instancia única
   */
  public static function getInstance() {
    if (self::$i18n_singleton == NULL) {
      self::$i18n_singleton = new I18n();
    }
    return self::$i18n_singleton;
  }
}

/**
 * Acceso directo función i18n global para
 * El I18n link :: i18n ()
 *
 * param String $ key La clave para traducir
 * return String La traducción de la clave dada
 */
function i18n($key) {
  return I18n::getInstance()->i18n($key);
}