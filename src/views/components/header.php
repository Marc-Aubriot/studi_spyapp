<header class="container d-flex">

    <nav class="col-12 row">

        <div class="row">
            <div class="col-2 mx-auto">
                <h1>SPYAPP</h1>
            </div>
        </div>
        
        <div class="row">

            <div class="col-10">

            </div>

            <?php if(!$_SESSION["user_admin"]) {
                echo '<div class="col-1">';
                    echo '<a href="'.URLDUSITE.'public/connexion">connexion</a>';
                echo '</div>';
            }
            ?>

            <?php if($_SESSION["user_admin"]) {
                echo '<div class="col-1">';
                    echo '<a href="'.URLDUSITE.'public/deconnexion">déconnexion</a>';
                echo '</div>';
            }
            ?>

            <?php if(!$_SESSION["user_admin"]) {
                echo '<div class="col-1">';
                    echo '<a href="'.URLDUSITE.'public/mission">retour</a>';
                echo '</div>';
            }
            ?>

            <?php if($_SESSION["user_admin"]) {
                echo '<div class="col-1">';
                    echo '<a href="'.URLDUSITE.'public/backoffice/'.$_SESSION["user_token"].'">retour</a>';
                echo '</div>';
            }
            ?>

        </div>
        
    </nav>

</header>
