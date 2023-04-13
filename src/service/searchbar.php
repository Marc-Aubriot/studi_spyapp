<?php
require __DIR__ . '/../../config.php';
include_once ROOT.'/src/models/Mission.php';
include_once ROOT.'/src/controllers/Controller.php';

$controller = new Controller();
$listmission = $controller->getList('mission');
$a = null;
foreach($listmission as $mission){
  $a[] = $mission['nom_de_code'];
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
        $hint .= ", $name";
      }
    }
  }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>