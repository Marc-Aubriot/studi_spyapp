<?php
session_start();
require __DIR__ . '/../../config.php';
include_once ROOT.'/src/models/Mission.php';

$q = $_REQUEST["q"];
$q = explode(',', $q);

$token = $_SESSION["user_token"];

$mission = new Mission($q[0], $q[1], $q[2], $q[3], $q[6], $q[8], $q[7], $q[4], $q[12], $q[9], $q[5], $q[10], $q[11]);
$mission->addMissionToDatabase();

$id = strval($mission->getNomDeCode());
echo '
<tr id="tr-mission-'.$mission->getNomDeCode().'">
    
        <td>
            <input type="text" name="code" value="'.$mission->getNomDeCode().'"></input> 
        </td>
        <td> 
            <input type="text" name="title" value="'.$mission->getTitre().'"></input> 
        </td>
        <td> 
            <input type="text" name="desc" value="'.$mission->getDescriptionDeMission().'"></input>
        </td>
        <td> 
            <input type="text" name="pays"value="'.$mission->getPays().'"></input> 
        </td>
        <td> 
            <input type="text" name="agents" value="'.$mission->getAgents().'"></input> 
        </td>
        <td> 
            <input type="text" name="contacts" value="'.$mission->getContacts().'"></input> 
        </td>
        <td> 
            <input type="text" name="cibles" value="'.$mission->getCibles().'"></input> 
        </td>
        <td> 
            <input type="text" name="type" value="'.$mission->getTypeDeMission().'"></input> 
        </td>
        <td> 
            <input type="text" name="statut" value="'.$mission->getStatut().'"></input> 
        </td>
        <td> 
            <input type="text" name="planques" value="'.$mission->getPlanques().'"></input> 
        </td>
        <td> 
            <input type="text" name="spé" value="'.$mission->getSpecialites().'"></input> 
        </td>
        <td> 
            <input type="text" name="debut" value="'.$mission->getDateDebut().'"></input> 
        </td>
        <td> 
            <input type="text" name="fin" value="'.$mission->getDateFin().'"></input> 
        </td>
        <td>
            <input type="submit" value="Modifier" name="action"></input> 
            <input type="hidden" value="'.$mission->getNomDeCode().'" name="id"></input> 
        </td>
    

        <td>
            <button onclick="delMission(this.id)" id="'.$id.'">Supprimer</button>
        </td>
          
</tr>';

?>