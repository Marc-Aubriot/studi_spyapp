<?php
  ob_start();
?>

<h1> SUCCESS <?= $_SESSION["user_admin"] ?> <?= $_SESSION["user_token"] ?></h1>

<?php foreach($agents as $agent): ?>

<li>
    Nom de code -> <?= $agent['code_identification'] ?>
    <br>
    Description -> <?= $agent['nom'] ?> 
</li>
<br>
    
<?php endforeach ?>

<?php 
    $nav = true;
    $title = true;
    $footer = true;
    $content = ob_get_clean();
    include ROOT.'/src/views/defaultpage.php'
?>