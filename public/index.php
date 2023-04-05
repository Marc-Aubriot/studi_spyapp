<?php 

// load les fichiers importants
require __DIR__ . '/../config.php';
require ROOT . '/src/controllers/Controller.php';

// constante pour le mode débug
if (DEBUG) { define('ENTRYPOINT', true); }

// prend l'uri
$request = $_SERVER['REQUEST_URI'];

// explose l'uri en segment
$slug = explode("/", $request);

// récupère le dernier segment
$slug = $slug[count($slug)-1];

// public cest le répertoire d'entrée, à modifier en fonction de l'hébergeur avec htaccess
switch ($request) {

    case '/public' :
        require ROOT . '/src/controllers/IndexController.php';
        $controller = new IndexController();
        $controller->index();
        break;

    case '/public/mission/'.$slug :
        require ROOT . '/src/controllers/MissionController.php';
        $controller = new MissionController();
        $controller->index($slug);
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