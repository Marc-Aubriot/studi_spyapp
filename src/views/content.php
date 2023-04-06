<section>
    
    <?php if ( $content === 'pageMissionListe' ) {
        include_once ROOT.'/src/views/missionList.php';
    } else if ( $content === 'pageMissionDetail' ) {
        include_once ROOT.'/src/views/missionDetail.php';
    } else if ( $content === 'pageConnexion' ) {
        include_once ROOT.'/src/views/connexion.php';
    } else if ( $content === 'pageBackoffice' ) {
        include_once ROOT.'/src/views/backoffice.php';
    }
    
    
    ?>
    
</section>
