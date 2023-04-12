<?php
  ob_start();
?>

<h2 class="blink_me"><?= $message ?></h2>

<table>

    <thead>
        <tr>
            <th>Tous les CONTACTS</th>
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
    
        <?php foreach($contacts as $contact): ?>

            <tr>
                <form method="post" action="<?= URLDUSITE.'public/backoffice/'.$token.'/contacts/formhandler/update/' ?>">
                <td>
                    <input type="text" name="code" value="<?= $contact['code_identification'] ?>"></input> 
                </td>
                <td> 
                    <input type="text" name="nom" value="<?= $contact['nom'] ?>"></input> 
                </td>
                <td> 
                    <input type="text" name="prénom" value="<?= $contact['prénom'] ?>"></input>
                </td>
                <td> 
                    <input type="text" name="date"value="<?= $contact['date_de_naissance'] ?>"></input> 
                </td>
                <td> 
                    <input type="text" name="nat" value="<?= $contact['nationalité'] ?>"></input> 
                </td>
                <td>
                    <input type="submit" value="Modifier" name="action"></input> 
                    <input type="hidden" value="<?= $contact['code_identification'] ?>" name="id"></input> 
                </td>
                </form>

                <td>
                    <form method="post" action="<?= URLDUSITE.'public/backoffice/'.$token.'/contacts/formhandler/delete/' ?>">
                        <input type="submit" value="Supprimer" name="action"></input>
                        <input type="hidden" value="<?= $contact['code_identification'] ?>" name="id"></input> 
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
            <form method="post" action="<?= URLDUSITE.'public/backoffice/'.$token.'/contacts/formhandler/create/' ?>">
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