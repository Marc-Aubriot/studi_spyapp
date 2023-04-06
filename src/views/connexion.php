<?php
// define variables and set to empty values
$emailErr = "";
$passwordErr = "";
$email = "";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = test_input($_POST["email"]);
    echo $email;
  //$password = test_input($_POST["password"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form method="get" action="<?=ROOT.'/src/controllers/ConnexionController.php'?>" class="container col-10">

    <div class="row">
        <label class="form-text">Email</label>
        <input class="form-text" type="email" placeholder="Adresse Email" required>
        <span class="error">* <?php echo $emailErr;?></span>
    </div>
    
    <div class="row">
        <label class="form-text">Password</label>
        <input class="form-text" type="password" placeholder="Mot de passe" required>
    </div>
    
    <div class="row">
        <input type="submit" value="Submit" name="submit">
    </div>

</form>