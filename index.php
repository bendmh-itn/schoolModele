<?php
session_start();
require_once "Config/connectDatabase.php";
/*$query = "Select * from utilisateurs";
$sth = $dbh->prepare($query);
$sth->execute();

/* Récupération de toutes les lignes d'un jeu de résultats 
print("Récupération de toutes les lignes d'un jeu de résultats :\n");
$result = $sth->fetchAll();
print_r($result);*/
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benoit de Mahieu</title>
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/flex.css">
</head>

<body>
    <header>
        <a href="/">Accueil</a>
        <?php if (isset($_SESSION["user"])) : ?>
            <a href="mesEcoles">Mes écoles</a>
            <a href="profil">Profil</a>
            <a href="deconnexion">Déconnexion</a>
        <?php else : ?>
            <a href="connexion">Connexion</a>
            <a href="inscription">Inscription</a>
        <?php endif ?>

    </header>
    <main>
        <?php
        require_once "Controllers/schoolsController.php";
        require_once "Controllers/usersController.php";
        ?>
    </main>
</body>

</html>