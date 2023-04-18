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
} elseif (isset($_GET["schoolId"]) && $uri === "/updateEcole?schoolId=" . $_GET["schoolId"]) {
    if (isset($_POST['btnEnvoi'])) {
        updateSchool($dbh);
        deleteOptionSchool($dbh);
        for ($i = 0; $i < count($_POST["options"]); $i++) {
            $optionScolaireId = $_POST["options"][$i];
            ajouterOptionsEcole($dbh, $_GET["schoolId"], $optionScolaireId);
        }
        header("location:/mesEcoles");
    }
    $school = selectOneSchool($dbh);
    $optionsSchool = selectOptionsSchool($dbh);
    $options = selectAllOptions($dbh);
    require_once "Templates/Schools/editOrCreateSchool.php";
}


function phoneNumberFormatted($phoneNumber)
{
    $phoneNumberFormatted = str_replace("/", "", $phoneNumber);
    $phoneNumberFormatted = str_replace(".", "", $phoneNumberFormatted);
    $phoneNumberFormatted = str_replace(" ", "", $phoneNumberFormatted);
    $part1 = substr($phoneNumberFormatted, -6, -4);
    $part2 = substr($phoneNumberFormatted, -4, -2);
    $part3 = substr($phoneNumberFormatted, -2);
    $part4 = substr($phoneNumberFormatted, 0, -6);
    $phoneNumberFormatted = $part4 . "/" . $part1 . "." . $part2 . "." . $part3;
    return $phoneNumberFormatted;
}
