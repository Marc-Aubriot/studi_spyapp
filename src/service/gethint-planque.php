<?php
require __DIR__ . '/../../config.php';
include_once ROOT.'/src/models/Agent.php';
include_once ROOT.'/src/controllers/Controller.php';

$controller = new Controller();
$listplanque = $controller->getList('planque');
$a = null;
foreach($listplanque as $planque){
  $a[] = $planque['code_identification']."=>pays: ".$planque['pays'].".";
}

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= "<br> $name";
      }
    }
  }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>