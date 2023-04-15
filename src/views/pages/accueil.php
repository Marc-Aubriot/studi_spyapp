<?php
  ob_start();
?>

<a href="<?=URLDUSITE.'public/mission'?>" class="spyapp">SPY APP</a>

<?php 
    $nav = false;
    $title = false;
    $footer = false;
    $content = ob_get_clean();
    include ROOT.'/src/views/defaultpage.php'
?>