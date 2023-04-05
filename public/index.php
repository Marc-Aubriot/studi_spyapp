<?php 

require __DIR__ . '/../config.php';
require ROOT . '/src/controllers/Controller.php';

if (DEBUG) { define('ENTRYPOINT', true); }

$request = $_SERVER['REQUEST_URI'];

// public cest le répertoire d'entrée, à modifier en fonction de l'hébergeur avec htaccess
switch ($request) {

    case '/public' :
        require ROOT . '/src/controllers/IndexController.php';
        $controller = new IndexController();
        $controller->index();
        break;

    case '/public/about' :
        //require ROOT . '/src/views/about.php';
        break;

    default:
        http_response_code(404);
        require ROOT . '/src/views/404.php';
        break;
}

?>