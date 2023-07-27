<?php 

session_start();

// load les fichiers importants
require __DIR__ . '/../config.php';
require ROOT . '/src/controllers/Controller.php';

// identification pour session locale (désactiver dans le dossier config DEBUG> false)
if (DEBUG) {
    require ROOT . '/src/models/Admin.php';
    $user = Admin::checkAdmin(DEBUG_ADMIN_MAIL, DEBUG_ADMIN_PASS);
    $_SESSION['user_admin'] = $user;
    $token = $_SESSION["user_token"] = Controller::guidv4();
}

// prend l'uri
$request = $_SERVER['REQUEST_URI'];

// explose l'uri en segment
$slugs = explode("/", $request);

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

    case '/public/mission/'.$slugs[count($slugs)-1] :
        require ROOT . '/src/controllers/MissionDetailController.php';
        $controller = new MissionDetailController();
        $controller->index($slugs[count($slugs)-1]);
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
    case '/public/backoffice/'.$slugs[count($slugs)-1] :
        require ROOT . '/src/controllers/BackofficeController.php';
        $controller = new BackofficeController();
        $controller->index($slugs[count($slugs)-1]);
    break;

    // BACKOFFICE : AGENTS LISTE
    case '/public/backoffice/'.$slugs[count($slugs)-2].'/agents' :
        require ROOT . '/src/controllers/BackofficeAgentsListController.php';
        $controller = new BackofficeAgentsListController();
        $controller->index($slugs[count($slugs)-2]);
    break;

    case '/public/backoffice/'.$slugs[count($slugs)-5].'/agents/formhandler/'.$slugs[count($slugs)-2].'/'.$slugs[count($slugs)-1] :
        require ROOT . '/src/controllers/BackofficeAgentsListController.php';
        $controller = new BackofficeAgentsListController();
        $controller->formhandler($slugs[count($slugs)-5],$slugs[count($slugs)-4],$slugs[count($slugs)-2],$slugs[count($slugs)-1]);
    break;

    // BACKOFFICE : CONTACTS LISTE
    case '/public/backoffice/'.$slugs[count($slugs)-2].'/contacts' :
        require ROOT . '/src/controllers/BackofficeContactsListController.php';
        $controller = new BackofficeContactsListController();
        $controller->index($slugs[count($slugs)-2]);
    break;

    case '/public/backoffice/'.$slugs[count($slugs)-5].'/contacts/formhandler/'.$slugs[count($slugs)-2].'/'.$slugs[count($slugs)-1] :
        require ROOT . '/src/controllers/BackofficeContactsListController.php';
        $controller = new BackofficeContactsListController();
        $controller->formhandler($slugs[count($slugs)-5],$slugs[count($slugs)-4],$slugs[count($slugs)-2],$slugs[count($slugs)-1]);
    break;

    // BACKOFFICE : CIBLES LISTE
    case '/public/backoffice/'.$slugs[count($slugs)-2].'/cibles' :
        require ROOT . '/src/controllers/BackofficeCiblesListController.php';
        $controller = new BackofficeCiblesListController();
        $controller->index($slugs[count($slugs)-2]);
    break;

    case '/public/backoffice/'.$slugs[count($slugs)-5].'/cibles/formhandler/'.$slugs[count($slugs)-2].'/'.$slugs[count($slugs)-1] :
        require ROOT . '/src/controllers/BackofficeCiblesListController.php';
        $controller = new BackofficeCiblesListController();
        $controller->formhandler($slugs[count($slugs)-5],$slugs[count($slugs)-4],$slugs[count($slugs)-2],$slugs[count($slugs)-1]);
    break;

    // BACKOFFICE : PLANQUES LISTE
    case '/public/backoffice/'.$slugs[count($slugs)-2].'/planques' :
        require ROOT . '/src/controllers/BackofficePlanquesListController.php';
        $controller = new BackofficePlanquesListController();
        $controller->index($slugs[count($slugs)-2]);
    break;

    case '/public/backoffice/'.$slugs[count($slugs)-5].'/planques/formhandler/'.$slugs[count($slugs)-2].'/'.$slugs[count($slugs)-1] :
        require ROOT . '/src/controllers/BackofficePlanquesListController.php';
        $controller = new BackofficePlanquesListController();
        $controller->formhandler($slugs[count($slugs)-5],$slugs[count($slugs)-4],$slugs[count($slugs)-2],$slugs[count($slugs)-1]);
    break;

    // BACKOFFICE : ADMIN LISTE
    case '/public/backoffice/'.$slugs[count($slugs)-2].'/admins' :
        require ROOT . '/src/controllers/BackofficeAdminsListController.php';
        $controller = new BackofficeAdminsListController();
        $controller->index($slugs[count($slugs)-2]);
    break;

    case '/public/backoffice/'.$slugs[count($slugs)-5].'/admins/formhandler/'.$slugs[count($slugs)-2].'/'.$slugs[count($slugs)-1] :
        require ROOT . '/src/controllers/BackofficeAdminsListController.php';
        $controller = new BackofficeAdminsListController();
        $controller->formhandler($slugs[count($slugs)-5],$slugs[count($slugs)-4],$slugs[count($slugs)-2],$slugs[count($slugs)-1]);
    break;

    // BACKOFFICE : MISSIONS LISTE
    case '/public/backoffice/'.$slugs[count($slugs)-2].'/missions' :
        require ROOT . '/src/controllers/BackofficeMissionsListController.php';
        $controller = new BackofficeMissionsListController();
        $controller->index($slugs[count($slugs)-2]);
    break;

    case '/public/backoffice/'.$slugs[count($slugs)-5].'/missions/formhandler/'.$slugs[count($slugs)-2].'/'.$slugs[count($slugs)-1] :
        require ROOT . '/src/controllers/BackofficeMissionsListController.php';
        $controller = new BackofficeMissionsListController();
        $controller->formhandler($slugs[count($slugs)-5],$slugs[count($slugs)-4],$slugs[count($slugs)-2],$slugs[count($slugs)-1]);
    break;

    // 404
    default:
        http_response_code(404);
        require ROOT . '/src/views/components/404.php';
    break;
}

?>