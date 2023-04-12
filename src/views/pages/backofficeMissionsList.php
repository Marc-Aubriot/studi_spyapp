<?php
  ob_start();
?>

<h2 class="blink_me"><?= $message ?></h2>

<table>

    <thead>
        <tr>
            <th>Toutes les MISSIONS</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>Nom de code</td>
            <td>Titre</td>
            <td>Description</td>
            <td>Pays</td>
            <td>Agents</td>
            <td>Contacts</td>
            <td>Cibles</td>
            <td>Type de mission</td>
            <td>Statut</td>
            <td>Planques</td>
            <td>Spécialités</td>
            <td>Date de début</td>
            <td>Date de fin</td>
        </tr>
    
        <?php foreach($missions as $mission): ?>

            <tr>
                <form method="post" action="<?= URLDUSITE.'public/backoffice/'.$token.'/missions/formhandler/update/' ?>">
                <td>
                    <input type="text" name="code" value="<?= $mission['nom_de_code'] ?>"></input> 
                </td>
                <td> 
                    <input type="text" name="title" value="<?= $mission['titre'] ?>"></input> 
                </td>
                <td> 
                    <input type="text" name="desc" value="<?= $mission['description_de_mission'] ?>"></input>
                </td>
                <td> 
                    <input type="text" name="pays"value="<?= $mission['pays'] ?>"></input> 
                </td>
                <td> 
                    <input type="text" name="agents" value="<?= $mission['agents'] ?>"></input> 
                </td>
                <td> 
                    <input type="text" name="contacts" value="<?= $mission['contacts'] ?>"></input> 
                </td>
                <td> 
                    <input type="text" name="cibles" value="<?= $mission['cibles'] ?>"></input> 
                </td>
                <td> 
                    <input type="text" name="type" value="<?= $mission['type_de_mission'] ?>"></input> 
                </td>
                <td> 
                    <input type="text" name="statut" value="<?= $mission['statut'] ?>"></input> 
                </td>
                <td> 
                    <input type="text" name="planques" value="<?= $mission['planques'] ?>"></input> 
                </td>
                <td> 
                    <input type="text" name="spé" value="<?= $mission['spécialités'] ?>"></input> 
                </td>
                <td> 
                    <input type="text" name="debut" value="<?= $mission['date_début'] ?>"></input> 
                </td>
                <td> 
                    <input type="text" name="fin" value="<?= $mission['date_fin'] ?>"></input> 
                </td>
                <td>
                    <input type="submit" value="Modifier" name="action"></input> 
                    <input type="hidden" value="<?= $mission['nom_de_code'] ?>" name="id"></input> 
                </td>
                </form>

                <td>
                    <form method="post" action="<?= URLDUSITE.'public/backoffice/'.$token.'/missions/formhandler/delete/' ?>">
                        <input type="submit" value="Supprimer" name="action"></input>
                        <input type="hidden" value="<?= $mission['nom_de_code'] ?>" name="id"></input> 
                    </form>
                </td>
                
            </tr>

        <?php endforeach ?>

    </tbody>

    <tfoot>
        <tr>
            <td>AJOUTER UNE MISSION</td>
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