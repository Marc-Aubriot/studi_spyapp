<?php

include_once ROOT . '/src/models/Agent.php';

$agent = Agent::getAgentById('007');
if ($agent) {
    echo $agent->getNom();
    echo $agent->getPrenom();
    echo $agent->getDateDeNaissance();
    // etc.
} else {
    echo "L'agent n'a pas été trouvé.";
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP + CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/styles/style.css">

    <title>SPYAPP</title>
</head>

<body>
    <h1>TEST lol AA lol test aTEST lololol  aaaa AA A</h1>

    <!-- JAVASCRIPT -->
    <script src="../src/scripts/main.js"></script>
</body>

</html>