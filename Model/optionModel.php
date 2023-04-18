<?php

function selectAllOptions($dbh)
{
    try {
        $query = 'select * from optionscolaire';
        $optionScolaire = $dbh->prepare($query);
        $optionScolaire->execute();
        $optionsScolaire = $optionScolaire->fetchAll();
        return $optionsScolaire;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}


function ajouterOptionsEcole($dbh, $schoolId, $optionScolaireId)
{
    try {
        $query = 'insert into option_ecole (schoolId, optionScolaireId) values (:schoolId, :optionScolaireId)';
        $optionScolaire = $dbh->prepare($query);
        $optionScolaire->execute([
            'schoolId' => $schoolId,
            'optionScolaireId' => $optionScolaireId
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}


function deleteOptionSchool($dbh)
{
    try {
        $query = 'delete from option_ecole where schoolId = :schoolId';
        $deleteAllSchoolsFromId = $dbh->prepare($query);
        $deleteAllSchoolsFromId->execute([
            'schoolId' => $_GET["schoolId"]
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}