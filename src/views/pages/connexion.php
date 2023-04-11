<?php 
    ob_start(); 
?>

<form method="post" action="<?= URLDUSITE.'public/check' ?>" class="container col-10">

    <div class="row">
        <label class="form-text">Email</label>
        <input class="form-text col-5" type="email" placeholder="Adresse Email" name="email" required>
    </div>
    
    <div class="row mt-2">
        <label class="form-text">Password</label>
        <input class="form-text col-5" type="password" placeholder="Mot de passe" name="password" required>
    </div>
    
    <div class="row mt-5">
        <input class="col-2" type="submit" value="Submit" name="submit">
    </div>

    <?php if ($message) {
        echo '<div class="pt-2">';
            echo '<p class="errorMessage">ERROR : '.$message. '</p>';
        echo '</div>';
    }
    ?>

</form>

<?php 
    $content = ob_get_clean();
    include ROOT.'/src/views/defaultpage.php'
?>