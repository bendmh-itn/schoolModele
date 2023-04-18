<?php

function selectAllSchools($dbh)
{
    try {
        $query = 'select * from school';
        $selectSchool = $dbh->prepare($query);
        $selectSchool->execute();
        $schools = $selectSchool->fetchAll();
        return $schools;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function selectMySchools($dbh)
{
    try {
        $query = 'select * from school where utilisateurId = :utilisateurId';
        $selectSchool = $dbh->prepare($query);
        $selectSchool->execute([
            'utilisateurId' => $_SESSION["user"]->id
        ]);
        $schools = $selectSchool->fetchAll();
        return $schools;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function selectOneSchool($dbh)
{
    try {
        $query = 'select * from school where schoolId = :schoolId';
        $selectSchool = $dbh->prepare($query);
        $selectSchool->execute([
            'schoolId' => $_GET["schoolId"]
        ]);
        $school = $selectSchool->fetch();
        return $school;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function selectOptionsSchool($dbh)
{
    try {
        $query = 'select * from optionscolaire where optionScolaireId in (select optionScolaireId from option_ecole where schoolId = :schoolId);';
        $selectOptions = $dbh->prepare($query);
        $selectOptions->execute([
            'schoolId' => $_GET["schoolId"]
        ]);
        $options = $selectOptions->fetchAll();
        return $options;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function createSchool($dbh)
{
    try {
        $query = 'insert into school (schoolNom, schoolAdresse, schoolVille, schoolCodePostal, schoolNumero, schoolImage, utilisateurId) values (:schoolNom, :schoolAdresse, :schoolVille, :schoolCodePostal, :schoolNumero, :schoolImage, :utilisateurId)';
        $deleteAllSchoolsFromId = $dbh->prepare($query);
        $deleteAllSchoolsFromId->execute([
            'schoolNom' => $_POST["nom"],
            'schoolAdresse' => $_POST["adresse"],
            'schoolVille' => $_POST["ville"],
            'schoolCodePostal' => $_POST["code_postal"],
            'schoolNumero' => $_POST["numero_telephone"],
            'schoolImage' => $_POST["image"],
            'utilisateurId' => $_SESSION["user"]->id
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function updateSchool($dbh)
{
    try {
        $query = 'update school set schoolNom = :schoolNom, schoolAdresse = :schoolAdresse, schoolVille = :schoolVille, schoolCodePostal = :schoolCodePostal, schoolNumero = :schoolNumero, schoolImage = :schoolImage where schoolId = :schoolId';
        $deleteAllSchoolsFromId = $dbh->prepare($query);
        $deleteAllSchoolsFromId->execute([
            'schoolNom' => $_POST["nom"],
            'schoolAdresse' => $_POST["adresse"],
            'schoolVille' => $_POST["ville"],
            'schoolCodePostal' => $_POST["code_postal"],
            'schoolNumero' => $_POST["numero_telephone"],
            'schoolImage' => $_POST["image"],
            'schoolId' => $_GET["schoolId"]
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function deleteOneSchool($dbh)
{
    try {
        $query = 'delete from school where schoolId = :schoolId';
        $deleteAllSchoolsFromId = $dbh->prepare($query);
        $deleteAllSchoolsFromId->execute([
            'schoolId' => $_GET["schoolId"]
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function deleteAllSchoolsFromUser($dbh)
{
    try {
        $query = 'delete from school where utilisateurId = :utilisateurId';
        $deleteAllSchoolsFromId = $dbh->prepare($query);
        $deleteAllSchoolsFromId->execute([
            'utilisateurId' => $_SESSION["user"]->id
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
