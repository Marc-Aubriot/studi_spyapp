<?php
include_once ROOT . '/src/models/Admin.php';
include_once ROOT . '/src/models/Mission.php';
include_once ROOT . '/src/models/Agent.php';
include_once ROOT . '/src/models/Contact.php';
include_once ROOT . '/src/models/Cible.php';
include_once ROOT . '/src/models/Planque.php';

if (DEBUG) { 
    echo '<br>'; 
    echo "config.php: DebugController.php activé"; 
    echo '<br>'; 
}

// public/index.php
if (ENTRYPOINT) { 
    echo '<br>';
    echo 'public/index.php fonctionne';
    echo '<br>';
}

//  controllers/IndexController.php
if (INDEXCONTROLLER) { 
    echo '<br>';
    echo 'controllers/IndexController.php fonctionne';
    echo '<br>';
}

// views/index.php
if (INDEXVIEW) { 
    echo '<br>';
    echo 'views/index.php fonctionne';
    echo '<br>';
}

// intilisation la connection PDO à la DB
try {
    $conn = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME, DB_USERNAME, DB_PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo '<br>';
    echo "Connexion à la database réussie";
    echo '<br>';

    $conn = null;
} catch(PDOException $e) {
    echo '<br>';
    echo "DebugController.php: Connexion à la database échouée : " . $e->getMessage();
    echo '<br>';

    $conn = null;
}

// initialise Admin.php
$admin = Admin::getAdminById('1504ae72-d17e-11ed-a515-f02f74b39858');
if ($admin) {
    echo '<br>';
    echo 'models/Admin.php fonctionne';
    echo '<br>';
} else {
    echo '<br>';
    echo "L'administrateur n'a pas été trouvé.";
    echo '<br>';
}

// initialise Agent.php
$agent = Agent::getAgentById('007');
if ($agent) {
    echo '<br>';
    echo 'models/Agent.php fonctionne';
    echo '<br>';
} else {
    echo '<br>';
    echo "L'agent n'a pas été trouvé.";
    echo '<br>';
}

// initialise Mission.php
$mission = Mission::getMissionById('Bulldog');
if ($mission) {
    echo '<br>';
    echo 'models/Mission.php fonctionne';
    echo '<br>';
} else {
    echo '<br>';
    echo "La mission n'a pas été trouvé.";
    echo '<br>';
}

// initialise Contact.php
$contact = Contact::getContactById('Alpha');
if ($contact) {
    echo '<br>';
    echo 'models/Contact.php fonctionne';
    echo '<br>';
} else {
    echo '<br>';
    echo "Le contact n'a pas été trouvé.";
    echo '<br>';
}

// initialise Cible.php
$cible = Cible::getCibleById('Cobb');
if ($cible) {
    echo '<br>';
    echo 'models/Cible.php fonctionne';
    echo '<br>';
} else {
    echo '<br>';
    echo "La cible n'a pas été trouvée.";
    echo '<br>';
}

// initialise Planque.php
$planque = Planque::getPlanqueById('Bear');
if ($planque) {
    echo '<br>';
    echo 'models/Planque.php fonctionne';
    echo '<br>';
} else {
    echo '<br>';
    echo "La planque n'a pas été trouvée.";
    echo '<br>';
}
?>