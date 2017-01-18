<?php
// Library loader
ini_set('display_errors',1);

require_once 'Lib/Livro/Core/ClassLoader.php';
$al= new Livro\Core\ClassLoader;
$al->addNamespace('Livro', 'Lib/Livro');
$al->register();

// Application loader
require_once 'Lib/Livro/Core/AppLoader.php';
$al= new Livro\Core\AppLoader;
$al->addDirectory('App/Control');
$al->addDirectory('App/Model');
$al->register();



if ($_GET) {
    $class = $_GET['class'];
    if (class_exists($class)) {
        $pagina = new $class;
        $pagina->show();
        //var_dump($pagina);
    }
}

echo '<link rel="stylesheet" href="App/Templates/css/bootstrap.min.css">';