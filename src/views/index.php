<?php

include_once ROOT . '/src/models/Admin.php';
include_once ROOT . '/src/models/Mission.php';
include_once ROOT . '/src/models/Agent.php';
include_once ROOT . '/src/models/Contact.php';
include_once ROOT . '/src/models/Cible.php';
include_once ROOT . '/src/models/Planque.php';

$admin = Admin::getAdminById('1504ae72-d17e-11ed-a515-f02f74b39858');
if ($admin) {
    echo '<br>';
    echo 'index.php: ' . $admin->getId() . ' ' . $admin->getNom(). ' ' . $admin->getPrenom() . ' ' .$admin->getAdresseEmail() . ' ' .$admin->getDateCreation();
} else {
    echo '<br>';
    echo "L'administrateur n'a pas été trouvé.";
}

$agent = Agent::getAgentById('007');
if ($agent) {
    echo '<br>';
    echo 'index.php: ' . $agent->getCodeIdentification() . ' ' . $agent->getNom(). ' ' . $agent->getPrenom() . ' ' .$agent->getDateDeNaissance();
} else {
    echo '<br>';
    echo "L'agent n'a pas été trouvé.";
}

$mission = Mission::getMissionById('Bulldog');
if ($mission) {
    echo '<br>';
    echo 'index.php: ' . $mission->getNomDeCode() 
    . ' ' . $mission->getTitre() 
    . ' ' . $mission->getDescriptionDeMission() 
    . ' ' . $mission->getPays() 
    . ' ' . $mission->getAgents() 
    . ' ' . $mission->getContacts()
    . ' ' . $mission->getCibles()
    . ' ' . $mission->getTypeDeMission()
    . ' ' . $mission->getStatut()
    . ' ' . $mission->getPlanques()
    . ' ' . $mission->getSpecialites()
    . ' ' . $mission->getDateDebut()
    . ' ' . $mission->getDateFin();
} else {
    echo '<br>';
    echo "La mission n'a pas été trouvé.";
}

$contact = Contact::getContactById('Alpha');
if ($contact) {
    echo '<br>';
    echo 'index.php: ' . $contact->getCodeIdentification() . ' ' . $contact->getNom(). ' ' .$contact->getPrenom(). ' ' .$contact->getDateDeNaissance();
} else {
    echo '<br>';
    echo "Le contact n'a pas été trouvé.";
}

$cible = Cible::getCibleById('Cobb');
if ($cible) {
    echo '<br>';
    echo 'index.php: ' . $cible->getCodeIdentification() . ' ' . $cible->getNom(). ' ' .$cible->getPrenom(). ' ' .$cible->getDateDeNaissance();
} else {
    echo '<br>';
    echo "La cible n'a pas été trouvée.";
}

$planque = Planque::getPlanqueById('Bear');
if ($planque) {
    echo '<br>';
    echo 'index.php: ' . $planque->getCodeIdentification() . ' ' . $planque->getAdresse(). ' ' .$planque->getPays(). ' ' .$planque->getTypeDeMission();
} else {
    echo '<br>';
    echo "La planque n'a pas été trouvée.";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP + CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/styles/style.css">

    <title>SPYAPP</title>
</head>

<body>
    <h1>TEST lol AA lol test aTEST lololol  aaaa AA A</h1>

    <!-- JAVASCRIPT -->
    <script src="../src/scripts/main.js"></script>
</body>

</html>