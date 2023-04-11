<?php
  ob_start();
?>

<h1> SUCCESS </h1>

<?php 
  $content = ob_get_clean();
  include ROOT.'/src/views/defaultpage.php'
?>