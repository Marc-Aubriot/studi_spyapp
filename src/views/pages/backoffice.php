<?php
  ob_start();
?>

<?php include(ROOT.'/src/views/components/backofficeheader.php'); ?>

<?php 
    $nav = true;
    $title = false;
    $footer = false;
    $content = ob_get_clean();
    include ROOT.'/src/views/defaultpage.php'
?>