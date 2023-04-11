<?php
  ob_start();
?>

<h1> SUCCESS <?= $message ?></h1>

<?php 
  $content = ob_get_clean();
  include ROOT.'/src/views/defaultpage.php'
?>