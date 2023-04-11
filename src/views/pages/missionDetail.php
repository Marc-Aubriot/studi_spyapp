<?php 
    ob_start(); 
?>

<ul>
    <li>Nom de code - <?= $mission->getNomDeCode() ?></li>
    <br>
    <li>Titre - <?= $mission->getTitre() ?></li>
    <br>
    <li>Description - <?= $mission->getDescriptionDeMission() ?></li>
    <br>
    <li>Pays - <?= $mission->getPays() ?></li>
    <br>
    <li>Agents - <?= $mission->getAgents() ?></li>
    <br>
    <li>Contacts - <?= $mission->getContacts() ?></li>
    <br>
    <li>Cibles - <?= $mission->getCibles() ?></li>
    <br>
    <li>Type de mission - <?= $mission->getTypeDeMission() ?></li>
    <br>
    <li>Statut - <?= $mission->getStatut() ?></li>
    <br>
    <li>Planques - <?= $mission->getPlanques() ?></li>
    <br>
    <li>Spécialités - <?= $mission->getSpecialites() ?></li>
    <br>
    <li>Date début de mission - <?= $mission->getDateDebut() ?></li>
    <br>
    <li>Date fin de mission - <?= $mission->getDateFin() ?></li>
</ul>

<?php 
    $content = ob_get_clean();
    include ROOT.'/src/views/defaultpage.php'
?>