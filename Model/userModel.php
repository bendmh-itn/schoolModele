<?php

function createUser($dbh)
{
    try {
        $query = 'insert into utilisateurs(nomUser, prenomUser, loginUser, passWordUser, role) values (:nomUser, :prenomUser, :loginUser, :passWordUser, :role)';
        $ajouteUser = $dbh->prepare($query);
        $ajouteUser->execute([
            'nomUser' => $_POST["nom"],
            'prenomUser' => $_POST["prenom"],
            'loginUser' => $_POST["login"],
            'passWordUser' => $_POST["mot_de_passe"],
            'role' => 'user'
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function connectUser($dbh)
{
    try {
        $query = 'select * from utilisateurs where loginUser = :loginUser and passWordUser = :passWordUser';
        $connectUser = $dbh->prepare($query);
        $connectUser->execute([
            'loginUser' => $_POST["login"],
            'passWordUser' => $_POST["mot_de_passe"]
        ]);
        $user = $connectUser->fetch();
        $_SESSION["user"] = $user;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function updateUser($dbh)
{
    try {
        $query = 'update utilisateurs set nomUser = :nomUser, prenomUser = :prenomUser, passWordUser = :passWordUser';
        $ajouteUser = $dbh->prepare($query);
        $ajouteUser->execute([
            'nomUser' => $_POST["nom"],
            'prenomUser' => $_POST["prenom"],
            'passWordUser' => $_POST["mot_de_passe"]
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function deleteUser($dbh)
{
    try {
        $query = 'delete from utilisateurs where id = :id';
        $ajouteUser = $dbh->prepare($query);
        $ajouteUser->execute([
            'id' => $_SESSION["user"]->id
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function updateSession($dbh)
{
    try {
        $query = 'select * from utilisateurs where id = :id';
        $selectUser = $dbh->prepare($query);
        $selectUser->execute([
            'id' => $_SESSION["user"]->id
        ]);
        $user = $selectUser->fetch();
        $_SESSION["user"] = $user;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
