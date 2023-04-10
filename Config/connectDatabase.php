<?php

try {
    $dbh = new PDO('mysql:host=localhost;dbname=school', "root", "root", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
} catch (PDOException $e) {
    die("Erreur ! : " . $e->getMessage());
}
