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
