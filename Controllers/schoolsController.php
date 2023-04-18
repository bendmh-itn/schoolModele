<?php

require_once "Model/schoolModel.php";
require_once "Model/optionModel.php";

$uri = $_SERVER["REQUEST_URI"];

if ($uri === "/index.php" || $uri === "/") {
    $schools = selectAllSchools($dbh);
    require_once "Templates/Schools/pageAccueil.php";
} elseif ($uri === "/createSchool") {
    if (isset($_POST['btnEnvoi'])) {
        createSchool($dbh);
        $schoolId = $dbh->lastInsertId();
        for ($i = 0; $i < count($_POST["options"]); $i++) {
            $optionScolaireId = $_POST["options"][$i];
            ajouterOptionsEcole($dbh, $schoolId, $optionScolaireId);
        }
        header("location:/mesEcoles");
    }
    $options = selectAllOptions($dbh);
    require_once "Templates/Schools/editOrCreateSchool.php";
} elseif ($uri === "/mesEcoles") {
    $schools = selectMySchools($dbh);
    require_once "Templates/Schools/pageAccueil.php";
} elseif (isset($_GET["schoolId"]) && $uri === "/voirEcole?schoolId=" . $_GET["schoolId"]) {
    $school = selectOneSchool($dbh);
    $options = selectOptionsSchool($dbh);
    require_once "Templates/Schools/voirEcole.php";
} elseif (isset($_GET["schoolId"]) && $uri === "/deleteEcole?schoolId=" . $_GET["schoolId"]) {
    deleteOptionSchool($dbh);
    deleteOneSchool($dbh);
    header("location:/mesEcoles");
}
