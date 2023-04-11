<?php 
    ob_start(); 
?>

<ul>

    <?php foreach($missions as $mission): ?>

        <li>
            Nom de code -> <?= $mission['nom_de_code'] ?>
            <br>
            Description -> <?= $mission['description_de_mission'] ?> 
            <a href="public/mission/<?= $mission['nom_de_code']?>">VOIR DETAIL</a>
        </li>
        <br>
            
    <?php endforeach ?>

</ul>

<?php 
    $content = ob_get_clean();
    include ROOT.'/src/views/defaultpage.php'
?>