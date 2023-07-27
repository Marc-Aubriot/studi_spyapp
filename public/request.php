<?php
require __DIR__ . '/../config.php';

$action = $_REQUEST["action"];
$q = $_REQUEST["q"];


include_once(ROOT.'/src/service/'.$action.'.php');




?>