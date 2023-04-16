<?php

require_once "Model/schoolModel.php";
require_once "Model/optionModel.php";

$uri = $_SERVER["REQUEST_URI"];

if ($uri === "/index.php" || $uri === "/") {
    $schools = selectAllSchools($dbh);
    require_once "Templates/Schools/pageAccueil.php";
} elseif ($uri === "/createSchool") {
    $options = selectAllOptions($dbh);
    require_once "Templates/Schools/editOrCreateSchool.php";
} elseif ($uri === "/mesEcoles") {
    $schools = selectMySchools($dbh);
    require_once "Templates/Schools/pageAccueil.php";
} elseif ($uri === "/voirEcole?schoolId=" . $_GET["schoolId"]) {
    $school = selectOneSchool($dbh);
    require_once "Templates/Schools/voirEcole.php";
}
