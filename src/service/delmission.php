<?php

require __DIR__ . '/../../config.php';
include_once ROOT.'/src/models/Mission.php';

$q = $_REQUEST["q"];
//$q = explode(',', $q);

$mission = Mission::getMissionById($q);
$mission->delete();

?>