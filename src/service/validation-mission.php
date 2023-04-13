<?php
require __DIR__ . '/../../config.php';
include_once ROOT.'/src/models/Mission.php';

$q = $_REQUEST["q"];
$q = explode(',', $q);

$mission = new Mission($q[0], $q[1], $q[2], $q[3], $q[6], $q[8], $q[7], $q[4], $q[12], $q[9], $q[5], $q[10], $q[11]);
$mission->addMissionToDatabase();

echo $hint = 'La mission '.$q[0].' est enregistrée';

?>