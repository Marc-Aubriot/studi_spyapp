<section>
    
    <ul>

        <?php foreach($missions as $mission): ?>

            <li>
                Nom de code -> <?= $mission['nom_de_code'] ?>
                <br>
                Description -> <?= $mission['description_de_mission'] ?> 
            </li>
            <br>

        <?php endforeach ?>

    </ul>
    
</section>
