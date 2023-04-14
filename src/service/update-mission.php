<?php

require __DIR__ . '/../../config.php';
include_once ROOT.'/src/models/Mission.php';

$q = $_REQUEST["q"];
$q = explode(',', $q);

$mission = Mission::getMissionById($q[13]);
$mission->updateChamp('titre', $q[1]);
$mission->updateChamp('description_de_mission', $q[2]);
$mission->updateChamp('pays', $q[3]);
$mission->updateChamp('agents', $q[4]);
$mission->updateChamp('contacts', $q[5]);
$mission->updateChamp('cibles', $q[6]);
$mission->updateChamp('type_de_mission', $q[7]);
$mission->updateChamp('statut', $q[8]);
$mission->updateChamp('planques', $q[9]);
$mission->updateChamp('spécialités', $q[10]);
$mission->updateChamp('date_début', $q[11]);
$mission->updateChamp('date_fin', $q[12]);
$mission->updateChamp('nom_de_code', $q[0]);

//echo $mission->getNomDeCode();
echo $q[13];
?>