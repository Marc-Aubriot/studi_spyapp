<?php
  ob_start();
?>

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
                <td>Pays (iso-3 ex: 'FRA')</td>
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
        
            <?php $iteration = 0; ?>
            <?php foreach($missions as $mission): ?>

                <tr id="tr-mission-<?= $mission['nom_de_code'] ?>">
                    
                    <td>
                        <input type="text" name="code" value="<?= $mission['nom_de_code'] ?>" id="<?= 'input-0-'.$iteration ?>"></input> 
                    </td>
                    <td> 
                        <input type="text" name="title" value="<?= $mission['titre'] ?>" id="<?= 'input-1-'.$iteration ?>"></input> 
                    </td>
                    <td> 
                        <input type="text" name="desc" value="<?= $mission['description_de_mission'] ?>" id="<?= 'input-2-'.$iteration ?>"></input>
                    </td>
                    <td> 
                        <input type="text" name="pays"value="<?= $mission['pays'] ?>" id="<?= 'input-3-'.$iteration ?>" onkeyup="showHint(this.value,'pays')"></input> 
                    </td>
                    <td> 
                        <input type="text" name="agents" value="<?= $mission['agents'] ?>" id="<?= 'input-4-'.$iteration ?>" onkeyup="showHint(this.value,'agent')"></input> 
                    </td>
                    <td> 
                        <input type="text" name="contacts" value="<?= $mission['contacts'] ?>" id="<?= 'input-5-'.$iteration ?>" onkeyup="showHint(this.value,'contact')"></input> 
                    </td>
                    <td> 
                        <input type="text" name="cibles" value="<?= $mission['cibles'] ?>" id="<?= 'input-6-'.$iteration ?>" onkeyup="showHint(this.value,'cible')"></input> 
                    </td>
                    <td> 
                        <input type="text" name="type" value="<?= $mission['type_de_mission'] ?>" id="<?= 'input-7-'.$iteration ?>"></input> 
                    </td>
                    <td> 
                        <input type="text" name="statut" value="<?= $mission['statut'] ?>" id="<?= 'input-8-'.$iteration ?>"></input> 
                    </td>
                    <td> 
                        <input type="text" name="planques" value="<?= $mission['planques'] ?>" id="<?= 'input-9-'.$iteration ?>" onkeyup="showHint(this.value,'planque')"></input> 
                    </td>
                    <td> 
                        <input type="text" name="spé" value="<?= $mission['spécialités'] ?>"  id="<?= 'input-10-'.$iteration ?>"></input> 
                    </td>
                    <td> 
                        <input type="text" name="debut" value="<?= $mission['date_début'] ?>" id="<?= 'input-11-'.$iteration ?>"></input> 
                    </td>
                    <td> 
                        <input type="text" name="fin" value="<?= $mission['date_fin'] ?>" id="<?= 'input-12-'.$iteration ?>"></input> 
                    </td>
                    <td>
                        <input type="text" name="fin" value="<?= $mission['nom_de_code'] ?>" id="<?= 'input-13-'.$iteration ?>" hidden></input> 
                        <button onclick="updateMission('<?= $iteration ?>')">Modifier</button>
                    </td>
                    

                    <td>
                        <button onclick="delMission('<?= $mission['nom_de_code'] ?>')">Supprimer</button>
                    </td>
                    
                </tr>

                <?php $iteration++; ?>
            <?php endforeach ?>

        </tbody>

        <tfoot id="trtest">

            <tr>
                <td colspan="2">
                    <button onclick="newMission()">Créer une mission, step by step</button>
                </td>
            </tr>
        </tfoot>

    </table>


</div>

<h2 class="blink_me mt-2" id="blink"><span id="txtHint"></span><?= $message ?></h2>

<div id="logs" class="mt-5 container">

</div>

<?php 
    $nav = true;
    $title = false;
    $footer = false;
    $content = ob_get_clean();
    include ROOT.'/src/views/defaultpage.php'
?>