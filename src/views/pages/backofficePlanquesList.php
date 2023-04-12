<?php
  ob_start();
?>

<h2 class="blink_me"><?= $message ?></h2>

<table>

    <thead>
        <tr>
            <th>Toutes les PLANQUES</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>Code d'identification</td>
            <td>Adresse</td>
            <td>Pays</td>
            <td>Type de mission</td>
        </tr>
    
        <?php foreach($planques as $planque): ?>

            <tr>
                <form method="post" action="<?= URLDUSITE.'public/backoffice/'.$token.'/planques/formhandler/update/' ?>">
                <td>
                    <input type="text" name="code" value="<?= $planque['code_identification'] ?>"></input> 
                </td>
                <td> 
                    <input type="text" name="adresse" value="<?= $planque['adresse'] ?>"></input> 
                </td>
                <td> 
                    <input type="text" name="pays" value="<?= $planque['pays'] ?>"></input>
                </td>
                <td> 
                    <input type="text" name="type"value="<?= $planque['type_de_mission'] ?>"></input> 
                </td>
                <td>
                    <input type="submit" value="Modifier" name="action"></input> 
                    <input type="hidden" value="<?= $planque['code_identification'] ?>" name="id"></input> 
                </td>
                </form>

                <td>
                    <form method="post" action="<?= URLDUSITE.'public/backoffice/'.$token.'/planques/formhandler/delete/' ?>">
                        <input type="submit" value="Supprimer" name="action"></input>
                        <input type="hidden" value="<?= $planque['code_identification'] ?>" name="id"></input> 
                    </form>
                </td>
                
            </tr>

        <?php endforeach ?>

    </tbody>

    <tfoot>
        <tr>
            <td>AJOUTER UNE PLANQUE</td>
        </tr>

        <tr>
            <form method="post" action="<?= URLDUSITE.'public/backoffice/'.$token.'/planques/formhandler/create/' ?>">
            <td>
                <input type="text" name="code" placeholder="code"></input> 
            </td>
            <td> 
                <input type="text" name="adresse" placeholder="adresse"></input> 
            </td>
            <td> 
                <input type="text" name="pays" placeholder="pays 'FRA'"></input>
            </td>
            <td> 
                <input type="text" name="type"placeholder="type de mission"></input> 
            </td>
            <td>
                <input type="submit" value="Ajouter" name="action"></input> 
            </td>
            </form>   
        </tr>
    </tfoot>

</table>

<?php 
    $nav = true;
    $title = false;
    $footer = false;
    $content = ob_get_clean();
    include ROOT.'/src/views/defaultpage.php'
?>