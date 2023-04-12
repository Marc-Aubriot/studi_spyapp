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

    // FRONTOFFICE : MISSIONS LISTE
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
        
    // CONNEXION /DECONNEXION /CHECK CREDENTIALS 
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

    // BACKOFFICE
    case '/public/backoffice/'.$slug1 :
        require ROOT . '/src/controllers/BackofficeController.php';
        $controller = new BackofficeController();
        $controller->index($slug1);
    break;

    // BACKOFFICE : AGENTS LISTE
    case '/public/backoffice/'.$slug2.'/agents' :
        require ROOT . '/src/controllers/BackofficeAgentsListController.php';
        $controller = new BackofficeAgentsListController();
        $controller->index($slug2);
    break;

    case '/public/backoffice/'.$slug5.'/agents/formhandler/'.$slug2.'/'.$slug1 :
        require ROOT . '/src/controllers/BackofficeAgentsListController.php';
        $controller = new BackofficeAgentsListController();
        $controller->formhandler($slug5,$slug4,$slug2,$slug1);
    break;

    // BACKOFFICE : CONTACTS LISTE
    case '/public/backoffice/'.$slug2.'/contacts' :
        require ROOT . '/src/controllers/BackofficeContactsListController.php';
        $controller = new BackofficeContactsListController();
        $controller->index($slug2);
    break;

    case '/public/backoffice/'.$slug5.'/contacts/formhandler/'.$slug2.'/'.$slug1 :
        require ROOT . '/src/controllers/BackofficeContactsListController.php';
        $controller = new BackofficeContactsListController();
        $controller->formhandler($slug5,$slug4,$slug2,$slug1);
    break;

    // BACKOFFICE : CIBLES LISTE
    case '/public/backoffice/'.$slug2.'/cibles' :
        require ROOT . '/src/controllers/BackofficeCiblesListController.php';
        $controller = new BackofficeCiblesListController();
        $controller->index($slug2);
    break;

    case '/public/backoffice/'.$slug5.'/cibles/formhandler/'.$slug2.'/'.$slug1 :
        require ROOT . '/src/controllers/BackofficeCiblesListController.php';
        $controller = new BackofficeCiblesListController();
        $controller->formhandler($slug5,$slug4,$slug2,$slug1);
    break;

    // BACKOFFICE : PLANQUES LISTE
    case '/public/backoffice/'.$slug2.'/planques' :
        require ROOT . '/src/controllers/BackofficePlanquesListController.php';
        $controller = new BackofficePlanquesListController();
        $controller->index($slug2);
    break;

    case '/public/backoffice/'.$slug5.'/planques/formhandler/'.$slug2.'/'.$slug1 :
        require ROOT . '/src/controllers/BackofficePlanquesListController.php';
        $controller = new BackofficePlanquesListController();
        $controller->formhandler($slug5,$slug4,$slug2,$slug1);
    break;

    // BACKOFFICE : ADMIN LISTE
    case '/public/backoffice/'.$slug2.'/admins' :
        require ROOT . '/src/controllers/BackofficeAdminsListController.php';
        $controller = new BackofficeAdminsListController();
        $controller->index($slug2);
    break;

    case '/public/backoffice/'.$slug5.'/admins/formhandler/'.$slug2.'/'.$slug1 :
        require ROOT . '/src/controllers/BackofficeAdminsListController.php';
        $controller = new BackofficeAdminsListController();
        $controller->formhandler($slug5,$slug4,$slug2,$slug1);
    break;

    // BACKOFFICE : MISSIONS LISTE
    case '/public/backoffice/'.$slug2.'/missions' :
        require ROOT . '/src/controllers/BackofficeMissionsListController.php';
        $controller = new BackofficeMissionsListController();
        $controller->index($slug2);
    break;

    case '/public/backoffice/'.$slug5.'/missions/formhandler/'.$slug2.'/'.$slug1 :
        require ROOT . '/src/controllers/BackofficeMissionsListController.php';
        $controller = new BackofficeMissionsListController();
        $controller->formhandler($slug5,$slug4,$slug2,$slug1);
    break;

    // 404
    default:
        http_response_code(404);
        require ROOT . '/src/views/components/404.php';
    break;
}

?>