<?php 

session_start();

// load les fichiers importants
require __DIR__ . '/../config.php';
require ROOT . '/src/controllers/Controller.php';

// prend l'uri
$request = $_SERVER['REQUEST_URI'];

// explose l'uri en segment
$slug = explode("/", $request);

// récupère le dernier segment
$slug1 = $slug[count($slug)-1];
// récupère l'avant dernier segment
$slug2 = $slug[count($slug)-2];
// récupère l'avant avant dernier segment
$slug3 = $slug[count($slug)-3];
// récupère l'avant avant avant dernier segment
$slug4 = $slug[count($slug)-4];
// récupère l'avant avant avant dernier segment
$slug5 = $slug[count($slug)-5];

// public cest le répertoire d'entrée, à modifier en fonction de l'hébergeur avec htaccess
switch ($request) {

    case '/public' :
        require ROOT . '/src/controllers/AccueilController.php';
        $controller = new AccueilController();
        $controller->index();
        break;

    case '/public/' :
        require ROOT . '/src/controllers/AccueilController.php';
        $controller = new AccueilController();
        $controller->index();
        break;

    case '/public/mission' :
        require ROOT . '/src/controllers/MissionListController.php';
        $controller = new MissionListController();
        $controller->index();
        break;

    case '/public/mission/'.$slug1 :
        require ROOT . '/src/controllers/MissionDetailController.php';
        $controller = new MissionDetailController();
        $controller->index($slug1);
        break;
        
    case '/public/connexion' :
        require ROOT . '/src/controllers/ConnexionController.php';
        $controller = new ConnexionController();
        $controller->index();
        break;

    case '/public/deconnexion' :
        require ROOT . '/src/controllers/ConnexionController.php';
        $controller = new ConnexionController();
        $controller->deconnexion();
        break;

    case '/public/check' :
        require ROOT . '/src/controllers/ConnexionController.php';
        $controller = new ConnexionController();
        $controller->connexion();
        break;

    case '/public/backoffice/'.$slug1 :
        require ROOT . '/src/controllers/BackofficeController.php';
        $controller = new BackofficeController();
        $controller->index($slug1);
        break;

    case '/public/backoffice/'.$slug2.'/agents' :
        require ROOT . '/src/controllers/BackofficeAgentsListController.php';
        $controller = new BackofficeAgentsListController();
        $controller->index($slug2);
        break;

    case '/public/backoffice/'.$slug5.'/'.$slug4.'/formhandler/'.$slug2.'/'.$slug1 :
        require ROOT . '/src/controllers/FormHandlerController.php';
        $controller = new FormHandlerController();
        $controller->index($slug5,$slug4,$slug2,$slug1);
        break;


    default:
        http_response_code(404);
        require ROOT . '/src/views/components/404.php';
        break;
}

?>