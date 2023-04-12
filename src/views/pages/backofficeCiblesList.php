<?php
  ob_start();
?>

<h2 class="blink_me"><?= $message ?></h2>

<table>

    <thead>
        <tr>
            <th>Toutes les CIBLES</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>Code d'identification</td>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Date de naissance</td>
            <td>Code Nationalité</td>
        </tr>
    
        <?php foreach($cibles as $cible): ?>

            <tr>
                <form method="post" action="<?= URLDUSITE.'public/backoffice/'.$token.'/cibles/formhandler/update/' ?>">
                <td>
                    <input type="text" name="code" value="<?= $cible['code_identification'] ?>"></input> 
                </td>
                <td> 
                    <input type="text" name="nom" value="<?= $cible['nom'] ?>"></input> 
                </td>
                <td> 
                    <input type="text" name="prénom" value="<?= $cible['prénom'] ?>"></input>
                </td>
                <td> 
                    <input type="text" name="date"value="<?= $cible['date_de_naissance'] ?>"></input> 
                </td>
                <td> 
                    <input type="text" name="nat" value="<?= $cible['nationalité'] ?>"></input> 
                </td>
                <td>
                    <input type="submit" value="Modifier" name="action"></input> 
                    <input type="hidden" value="<?= $cible['code_identification'] ?>" name="id"></input> 
                </td>
                </form>

                <td>
                    <form method="post" action="<?= URLDUSITE.'public/backoffice/'.$token.'/cibles/formhandler/delete/' ?>">
                        <input type="submit" value="Supprimer" name="action"></input>
                        <input type="hidden" value="<?= $cible['code_identification'] ?>" name="id"></input> 
                    </form>
                </td>
                
            </tr>

        <?php endforeach ?>

    </tbody>

    <tfoot>
        <tr>
            <td>AJOUTER UN CONTACT</td>
        </tr>

        <tr>
            <form method="post" action="<?= URLDUSITE.'public/backoffice/'.$token.'/cibles/formhandler/create/' ?>">
            <td>
                <input type="text" name="code" placeholder="code"></input> 
            </td>
            <td> 
                <input type="text" name="nom" placeholder="nom"></input> 
            </td>
            <td> 
                <input type="text" name="prénom" placeholder="prénom"></input>
            </td>
            <td> 
                <input type="text" name="date"placeholder="year-month-day"></input> 
            </td>
            <td> 
                <input type="text" name="nat" placeholder="nationalité 'FRA'"></input> 
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