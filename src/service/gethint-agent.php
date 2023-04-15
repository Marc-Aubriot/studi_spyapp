<?php
require __DIR__ . '/../../config.php';
include_once ROOT.'/src/models/Agent.php';
include_once ROOT.'/src/controllers/Controller.php';

$controller = new Controller();
$listagent = $controller->getList('agent');
$a = null;
foreach($listagent as $agent){
  $a[] = $agent['code_identification']."=> pays: ".$agent['nationalité'].". spécialité: ".$agent['spécialités'];
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