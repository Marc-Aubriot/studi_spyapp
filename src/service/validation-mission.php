<?php
session_start();
require __DIR__ . '/../../config.php';
include_once ROOT.'/src/models/Mission.php';
include_once ROOT.'/src/service/randomstring.php';

$q = $_REQUEST["q"];
$q = explode(',', $q);

$token = $_SESSION["user_token"];

$mission = new Mission($q[0], $q[1], $q[2], $q[3], $q[6], $q[8], $q[7], $q[4], $q[12], $q[9], $q[5], $q[10], $q[11]);
$mission->addMissionToDatabase();

$id = strval($mission->getNomDeCode());
$uuid = generateRandomString(6);


echo '
<tr id="tr-mission-'.$mission->getNomDeCode().'">
    
        <td>
            <input type="text" name="code" value="'.$mission->getNomDeCode().'"  id="input-0-'.$uuid.'"></input> 
        </td>
        <td> 
            <input type="text" name="title" value="'.$mission->getTitre().'"  id="input-1-'.$uuid.'"></input> 
        </td>
        <td> 
            <input type="text" name="desc" value="'.$mission->getDescriptionDeMission().'"  id="input-2-'.$uuid.'"></input>
        </td>
        <td> 
            <input type="text" name="pays"value="'.$mission->getPays().'"  id="input-3-'.$uuid.'" onkeyup="showHint(this.value,"pays")"></input> 
        </td>
        <td> 
            <input type="text" name="agents" value="'.$mission->getAgents().'"  id="input-4-'.$uuid.'" onkeyup="showHint(this.value,"agent")"></input> 
        </td>
        <td> 
            <input type="text" name="contacts" value="'.$mission->getContacts().'"  id="input-5-'.$uuid.'" onkeyup="showHint(this.value,"contact")"></input> 
        </td>
        <td> 
            <input type="text" name="cibles" value="'.$mission->getCibles().'"  id="input-6-'.$uuid.'" onkeyup="showHint(this.value,"cible")"></input> 
        </td>
        <td> 
            <input type="text" name="type" value="'.$mission->getTypeDeMission().'"  id="input-7-'.$uuid.'"></input> 
        </td>
        <td> 
            <input type="text" name="statut" value="'.$mission->getStatut().'"  id="input-8-'.$uuid.'"></input> 
        </td>
        <td> 
            <input type="text" name="planques" value="'.$mission->getPlanques().'"  id="input-9-'.$uuid.'" onkeyup="showHint(this.value,"planque")"></input> 
        </td>
        <td> 
            <input type="text" name="spé" value="'.$mission->getSpecialites().'"  id="input-10-'.$uuid.'"></input> 
        </td>
        <td> 
            <input type="text" name="debut" value="'.$mission->getDateDebut().'"  id="input-11-'.$uuid.'"></input> 
        </td>
        <td> 
            <input type="text" name="fin" value="'.$mission->getDateFin().'"  id="input-12-'.$uuid.'"></input> 
        </td>
        <td>
            <input type="text" name="fin" value="'.$mission->getNomDeCode().'" id="input-13-'.$uuid.'" hidden></input> 
            <button onclick="updateMission(this.id)" id="'. $uuid.'">Modifier</button>
        </td>
    

        <td>
            <button onclick="delMission(this.id)" id="'.$id.'">Supprimer</button>
        </td>
          
</tr>';

?>