<?php
require __DIR__ . '/../../config.php';
include_once ROOT.'/src/models/Mission.php';

$q = $_REQUEST["q"];
$q = explode(',', $q);

$mission = new Mission($q[0], $q[1], $q[2], $q[3], $q[6], $q[8], $q[7], $q[4], $q[12], $q[9], $q[5], $q[10], $q[11]);

echo '
<table style="border:"1px solid white";">
    <tr>
        <td style="border:1px solid white;">Nom de code</td>
        <td style="border:1px solid white;">Titre</td>
        <td style="border:1px solid white;">Description</td>
        <td style="border:1px solid white;">Pays</td>
        <td style="border:1px solid white;">Agents</td>
        <td style="border:1px solid white;">Contacts</td>
        <td style="border:1px solid white;">Cibles</td>
        <td style="border:1px solid white;">Type de mission</td>
        <td style="border:1px solid white;">Statut</td>
        <td style="border:1px solid white;">Planques</td>
        <td style="border:1px solid white;">Spécialités</td>
        <td style="border:1px solid white;">Date de début</td>
        <td style="border:1px solid white;">Date de fin</td>
    </tr>

    <tr>

        <td style="border:1px solid white;">
            '.$mission->getNomDeCode().'
        </td>

        <td style="border:1px solid white;"> 
            '.$mission->getTitre().'
        </td>

        <td style="border:1px solid white;"> 
            '.$mission->getDescriptionDeMission().'
        </td>

        <td style="border:1px solid white;"> 
            '.$mission->getPays().'
        </td>

        <td style="border:1px solid white;"> 
            '.$mission->getAgents().'
        </td>

        <td style="border:1px solid white;"> 
            '.$mission->getContacts().'
        </td>

        <td style="border:1px solid white;"> 
            '.$mission->getCibles().'
        </td>

        <td style="border:1px solid white;"> 
            '.$mission->getTypeDeMission().'
        </td>

        <td style="border:1px solid white;"> 
            '.$mission->getStatut().'
        </td>

        <td style="border:1px solid white;"> 
            '.$mission->getPlanques().'
        </td>

        <td style="border:1px solid white;"> 
            '.$mission->getSpecialites().'
        </td>

        <td style="border:1px solid white;"> 
            '.$mission->getDateDebut().'
        </td>

        <td style="border:1px solid white;"> 
            '.$mission->getDateFin().'
        </td>
                        
    </tr>
</table>
';

?>