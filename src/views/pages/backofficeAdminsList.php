<?php
  ob_start();
?>

<h2 class="blink_me"><?= $message ?></h2>

<table>

    <thead>
        <tr>
            <th>Tous les ADMINS</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>ID (UUID AUTO) (unmodifiable)</td>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Adresse Email</td>
            <td>Mot de passe (unmodifiable)</td>
            <td>Date de création (AUTO)</td>
        </tr>
    
        <?php foreach($admins as $admin): ?>

            <tr>
                <form method="post" action="<?= URLDUSITE.'public/backoffice/'.$token.'/admins/formhandler/update/' ?>">
                <td>
                    <input type="text" name="code" value="<?= $admin['ID'] ?>" readonly="readonly"></input> 
                </td>
                <td>
                    <input type="text" name="code" value="<?= $admin['nom'] ?>"></input> 
                </td>
                <td> 
                    <input type="text" name="adresse" value="<?= $admin['prénom'] ?>"></input> 
                </td>
                <td> 
                    <input type="text" name="pays" value="<?= $admin['adresse_email'] ?>"></input>
                </td>
                <td> 
                    <input type="text" name="type"value="<?= $admin['mot_de_passe'] ?>" readonly="readonly"></input> 
                </td>
                <td> 
                    <input type="text" name="type"value="<?= $admin['date_création'] ?>"></input> 
                </td>
                <td>
                    <input type="submit" value="Modifier" name="action"></input> 
                    <input type="hidden" value="<?= $admin['ID'] ?>" name="id"></input> 
                </td>
                </form>

                <td>
                    <form method="post" action="<?= URLDUSITE.'public/backoffice/'.$token.'/admins/formhandler/delete/' ?>">
                        <input type="submit" value="Supprimer" name="action"></input>
                        <input type="hidden" value="<?= $admin['ID'] ?>" name="id"></input> 
                    </form>
                </td>
                
            </tr>

        <?php endforeach ?>

    </tbody>

    <tfoot>
        <tr>
            <td>AJOUTER UN ADMIN</td>
        </tr>

        <tr>
            <form method="post" action="<?= URLDUSITE.'public/backoffice/'.$token.'/admins/formhandler/create/' ?>">
            <td>
                <input type="text" name="nom" placeholder="nom"></input> 
            </td>
            <td> 
                <input type="text" name="prénom" placeholder="prénom"></input> 
            </td>
            <td> 
                <input type="text" name="adresse" placeholder="adresse email"></input>
            </td>
            <td> 
                <input type="text" name="pass"placeholder="mot de passe"></input> 
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