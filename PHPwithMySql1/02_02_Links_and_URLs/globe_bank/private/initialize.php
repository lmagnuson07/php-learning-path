<?php

  // Assign file paths to PHP constants
  // __FILE__ returns the current path to this file
  // dirname() returns the path to the parent directory
  define("PRIVATE_PATH", dirname(__FILE__));
  define("PROJECT_PATH", dirname(PRIVATE_PATH));
  define("PUBLIC_PATH", PROJECT_PATH . '/public');
  define("SHARED_PATH", PRIVATE_PATH . '/shared');

  // Assign the root URL to a PHP constant
  // * Do not need to include the domain
  // * Use same document root as webserver
  // * Can set a hardcoded value:
  // define("WWW_ROOT", '/~kevinskoglund/globe_bank/public');
  // define("WWW_ROOT", '');
  // * Can dynamically find everything in URL up to "/public"
//var_dump($_SERVER);
	// script name = '/PHP with MySql 1/Chapter_02/02_02_Links_and_URLs/globe_bank/private/initialize.php'
	// We add +7 so that the string position is after public/
  $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
	// Returns /PHP with MySql 1/Chapter_02/02_02_Links_and_URLs/globe_bank/private
  $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
  define("WWW_ROOT", $doc_root);

  require_once('functions.php');

?>
