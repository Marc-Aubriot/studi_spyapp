<?php
require __DIR__ . '/../../config.php';
include_once ROOT.'/src/models/Agent.php';

// get the q parameter from URL
$q = $_REQUEST["q"];
$q = explode(',', $q);

$agent = Agent::getAgentById($q[1]);
$spécialités = explode(',', $q[0]);
$agent_is_valid = false;

if ($agent) {
    foreach($spécialités as $spé) {
        if ($spé === $agent->getSpecialite()) { 
            return true;
        } 
    }
}

return false;
?>