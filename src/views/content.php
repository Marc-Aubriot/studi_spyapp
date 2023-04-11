<section>
    
    <?php if ( $content === 'pageMissionListe' ) { // PAGE D'ACCUEIL : LISTE DES MISSIONS
        include_once ROOT.'/src/views/missionList.php';

    } else if ( $content === 'pageMissionDetail' ) { // PAGE D'ACCUEIL : DETAIL DES MISSIONS
        include_once ROOT.'/src/views/missionDetail.php';

    } else if ( $content === 'pageConnexion' ) { // PAGE DE CONNEXION : FORMULAIRE
        include_once ROOT.'/src/views/connexion.php';

    } else if ( $content === 'pageCheckPass' ) { // PAGE DE CONNEXION : CHECK DATAS & REDIRECT TO BACKOFFICE
        include_once ROOT.'/src/views/checkpass.php';

    } else if ( $content === 'pageBackoffice' ) { // PAGE BACK OFFICE
        include_once ROOT.'/src/views/backoffice.php';
        
    } else if ( $content === 'deconnexion' ) { // PAGE DECONNEXION : CLEAN DATAS & REDIRECT TO PAGE D'ACCUEIL
        include_once ROOT.'/src/views/deconnexion.php';
    }
    
    
    ?>
    
</section>
