<?php

require_once "Model/userModel.php";
require_once "Model/schoolModel.php";

$uri = $_SERVER["REQUEST_URI"];

if ($uri === "/connexion") {
    if (isset($_POST['btnEnvoi'])) {
        connectUser($dbh);
        header("location:/");
    }
    require_once "Templates/Users/connexion.php";
} elseif ($uri === "/deconnexion") {
    session_destroy();
    header("location:/");
} elseif ($uri === "/profil") {
    require_once "Templates/Users/profil.php";
} elseif ($uri === "/updateProfil") {
    if (isset($_POST['btnEnvoi'])) {
        $messageError = verifEmptyData();
        if (!$messageError) {
            updateUser($dbh);
            updateSession($dbh);
            header("location:/profil");
        }
    }
    require_once "Templates/Users/inscriptionOrEditProfil.php";
} elseif ($uri === "/deleteProfil") {
    deleteAllSchoolsFromUser($dbh);
    deleteUser($dbh);
    header("location:/deconnexion");
} elseif ($uri === "/inscription") {
    if (isset($_POST['btnEnvoi'])) {
        $messageError = verifEmptyData();
        if (!$messageError) {
            createUser($dbh);
            header('location:/connexion');
        }
    }
    require_once "Templates/Users/inscriptionOrEditProfil.php";
}



function verifEmptyData()
{
    foreach ($_POST as $key => $value) {
        if (empty(str_replace(' ', '', $value))) {
            $messageError[$key] = "Votre " . $key . " est vide.";
        }
    }
    if (isset($messageError)) {
        return $messageError;
    } else {
        return false;
    }
}
