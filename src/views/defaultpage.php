<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP + CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= URLDUSITE ?>/src/styles/style.css" type="text/css">

    <title>SPYAPP</title>
</head>

<body class="container">

    <?php 
        if ($nav) { include_once(ROOT.'/src/views/components/header.php'); }
        if ($_SESSION["user_admin"]) {  include_once(ROOT.'/src/views/components/backofficeheader.php'); }
        if ($title)  { 
            echo '<div class="col-12 msgAccueil">';
            echo '<h2>Bienvenue camarade</h2>';
            echo '  </div>';
        }
        echo $content;
        if ($footer)  { include_once(ROOT.'/src/views/components/footer.php'); }
    ?>

    <!-- JAVASCRIPT -->
    <script src="../src/scripts/main.js"></script>
</body>

</html>