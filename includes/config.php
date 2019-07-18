<?php

define('ROOT_PATH', __DIR__);
define('APP_PATH', '/ABCine-master/');
define('IMG_PATH', APP_PATH.'IMG/');
define('CSS_PATH', APP_PATH.'css/');
define('JS_PATH', APP_PATH.'js/');
define('INSTALLED', true );
define('BD_HOST', 'localhost');
define('BD_NAME', 'prueba');
define('BD_USER', 'root');
define('BD_PASS', '');

if (! INSTALLED) {
  echo "The app it's not configured";
  exit();
}

ini_set('default_charset', 'UTF-8');
setLocale(LC_ALL, 'es_ES.UTF.8');

spl_autoload_register(function ($class) {

    // project-specific namespace prefix
    $prefix = 'es\\ucm\\fdi\\aw\\';
    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/';

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});


$app = \es\ucm\fdi\aw\App::getSingleton();
$app->init(array('host'=>BD_HOST, 'bd'=>BD_NAME, 'user'=>BD_USER, 'pass'=>BD_PASS), APP_PATH, ROOT_PATH);
 ?>
