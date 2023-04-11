<?php
  ob_start();
?>

<h1>ACCUEIL PAGE </h1>
<a href="<?=URLDUSITE.'public/mission'?>">CLICK ME MISSION </a>

<?php 
    $nav = false;
    $title = false;
    $footer = false;
    $content = ob_get_clean();
    include ROOT.'/src/views/defaultpage.php'
?>