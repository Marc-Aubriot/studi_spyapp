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

</form>