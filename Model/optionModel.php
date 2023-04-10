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
