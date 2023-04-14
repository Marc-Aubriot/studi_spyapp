<?php
  ob_start();
?>

<h2 class="blink_me" id="blink"><span id="txtHint"></span><?= $message ?></h2>

<div class="tableContainer">
    <table class="mb-5 me-2">

        <thead>
            <tr>
                <th>Rechercher une mission</th>
            </tr>
            <tr>
                <th colspan="2">
                    <input type="text" placeholder="nom de code" onkeyup="searchBar(this.value)">
                </th>
            </tr>
        </thead>

        <tbody id="mission-table">
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

                <tr id="tr-mission-<?= $mission['nom_de_code'] ?>">
                    
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
                    

                    <td>
                        <button onclick="delMission('<?= $mission['nom_de_code'] ?>')">Supprimer</button>
                    </td>
                    
                </tr>

            <?php endforeach ?>

        </tbody>

        <tfoot id="trtest">
            <tr>
                <td>ajouter mission : quick bar</td>
            </tr>

            <tr>
                
                <td>
                    <input type="text" name="code" placeholder="nom de code"></input> 
                </td>
                <td> 
                    <input type="text" name="title" placeholder="titre"></input> 
                </td>
                <td> 
                    <input type="text" name="desc" placeholder="description"></input>
                </td>
                <td> 
                    <input type="text" name="pays"placeholder="pays 'FRA'"></input> 
                </td>
                <td> 
                    <input type="text" name="agents" placeholder="codes agents" onkeyup="showHint(this.value,'agent')"></input> 
                </td>
                <td> 
                    <input type="text" name="contacts" placeholder="codes contacts" onkeyup="showHint(this.value,'contact')"></input> 
                </td>
                <td> 
                    <input type="text" name="cibles" placeholder="codes cibles" onkeyup="showHint(this.value,'cible')"></input> 
                </td>
                <td> 
                    <input type="text" name="type" placeholder="infiltration..."></input> 
                </td>
                <td> 
                    <input type="text" name="statut" placeholder="en cours"></input> 
                </td>
                <td> 
                    <input type="text" name="planques" placeholder="code planques" onkeyup="showHint(this.value,'planque')"></input> 
                </td>
                <td> 
                    <input type="text" name="spé" placeholder="spécialités"></input> 
                </td>
                <td> 
                    <input type="text" name="debut" placeholder="début year-month-day"></input> 
                </td>
                <td> 
                    <input type="text" name="fin" placeholder="fin year-month-day"></input> 
                </td>
                <td>
                    <input type="submit" value="Ajouter" name="action"></input> 
                </td>
                 
            </tr>

            <tr>
                <td colspan="2">
                    <button onclick="newMission()">Créer une mission, step by step</button>
                </td>
            </tr>
        </tfoot>

    </table>


</div>

<div id="logs" class="mt-4 container">

</div>

<?php 
    $nav = true;
    $title = false;
    $footer = false;
    $content = ob_get_clean();
    include ROOT.'/src/views/defaultpage.php'
?>