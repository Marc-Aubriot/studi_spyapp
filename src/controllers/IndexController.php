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