<?php 

// load les fichiers importants
require __DIR__ . '/../config.php';
require ROOT . '/src/controllers/Controller.php';

// prend l'uri
$request = $_SERVER['REQUEST_URI'];

// explose l'uri en segment
$slug = explode("/", $request);

// récupère le dernier segment
$slug = $slug[count($slug)-1];

// public cest le répertoire d'entrée, à modifier en fonction de l'hébergeur avec htaccess
switch ($request) {

    case '/public' :
        require ROOT . '/src/controllers/DefaultPageController.php';
        $controller = new DefaultPageController();
        $controller->index();
        break;

    case '/public/mission/'.$slug :
        require ROOT . '/src/controllers/MissionDetailController.php';
        $controller = new MissionDetailController();
        $controller->index($slug);
        break;
        
    case '/public/connexion' :
        require ROOT . '/src/controllers/ConnexionController.php';
        $controller = new ConnexionController();
        $controller->index();
        break;

    case '/public/deconnexion' :
        require ROOT . '/src/controllers/DeconnexionController.php';
        $controller = new DeconnexionController();
        $controller->index();
        break;

    case '/public/check' :
        require ROOT . '/src/controllers/CheckCredentialsController.php';
        $controller = new CheckCredentialsController();
        $controller->index();
        break;

    case '/public/backoffice' :
        require ROOT . '/src/controllers/BackofficeController.php';
        $controller = new BackofficeController();
        $controller->index();
        break;


    default:
        http_response_code(404);
        require ROOT . '/src/views/components/404.php';
        break;
}

?>