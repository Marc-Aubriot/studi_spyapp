<?php
require __DIR__ . '/../../config.php';
include_once ROOT.'/src/models/Agent.php';
include_once ROOT.'/src/models/Planque.php';
include_once ROOT.'/src/models/Mission.php';
include_once ROOT.'/src/models/Cible.php';
include_once ROOT.'/src/models/Contact.php';

// get the q parameter from URL
$q = $_REQUEST["q"];
$q = explode(',', $q);

// on vérifie que l'agent possède la spécialité requise
$agents = explode(',', $q[6]);
$spécialités = explode(',', $q[5]);
$agent_is_valid = true;

foreach($agents as $agent) {
    $agent = Agent::getAgentById($agent);

    if ($agent) {
        foreach($spécialités as $spé) {
            if ($spé !== $agent->getSpecialite()) { 
                $agent_is_valid = false;
                if (DEBUG) { echo 'AGENT INVALIDE '; };
            } 
        }
    } else {
        $agent_is_valid = false;
        if (DEBUG) { echo "AGENT N'EXISTE PAS "; };
    }
}

// on vérifie que la planque est dans le même pays que la mission
$planque = Planque::getPlanqueById($q[9]);
$pays = $q[3];
$planque_is_valid = true;

if ($planque) {
    if ($planque->getPays() !== $pays) {
        $planque_is_valid = false;
        if (DEBUG) { echo 'PLANQUE INVALIDE '; };
    }
} else {
    $planque_is_valid = false;
    if (DEBUG) { echo "PLANQUE N'EXISTE PAS "; };
}

// on vérifie que les contacts ont la nationalité du pays de la mission
$contacts = explode(',', $q[8]);
$contacts_are_valid = true;

foreach($contacts as $contact) {
    $contact = Contact::getContactById($contact);

    if ($contact) {
        if ($pays !== $contact->getNationalite()) {
            $contacts_are_valid = false;
            if (DEBUG) { echo 'CONTACTS INVALIDES '; };
        }
    } else {
        $contacts_are_valid = false;
        if (DEBUG) { echo "CONTACT N'EXISTE PAS "; };
    }
}

// on vérifie que les cibles n'ont pas la même nationalité que les agents
$cibles = explode(',', $q[7]);
$cibles_are_valid = true;

$agents = explode(',', $q[6]);

foreach($cibles as $cible) {
    $cible = Cible::getCibleById($cible);

    if ($cible) {
        foreach($agents as $ag) {
            $ag = Agent::getAgentById($ag);

            if ($ag) {
                if ($cible->getNationalite() === $ag->getNationalite()) {
                    $cibles_are_valid = false;
                    if (DEBUG) { echo 'CIBLES INVALIDES '; };
                }
            } else { 
                $agent_is_valid = false;
                if (DEBUG) { echo "AGENT N'EXISTE PAS "; };
            }
        }
    } else {
        $cibles_are_valid = false;
        if (DEBUG) { echo "CIBLE N'EXISTE PAS "; };
    }
    
}

if ($agent_is_valid === true && $planque_is_valid === true && $contacts_are_valid === true && $cibles_are_valid === true )
{
    if (DEBUG) { echo 'TOUT EST VALIDE '; };
    echo 'true';
} else {
    if (DEBUG) { echo 'AU MOINS UNE CONTRAINTE EST INVALIDE '; };
    echo 'false';
}

?>