<?php

session_start();
if (!isset($_SESSION['utilisateur']['IdUtilisateur'])) {
    $_SESSION['utilisateur']['IdUtilisateur'] = '';
}

    $id = $_POST["id"];

    try {
        $pdo = new PDO("sqlite:../DATABASE/bdd.sqlite");
        $req = $pdo->prepare("DELETE FROM Projet WHERE IdProjet=?");
        $req->execute(array($id));
    } catch (PDOException $e) {
        die($e);
    } 
    $url = "../PAGES/ADMIN_Projet.php";
    header("Location: $url");
    exit;
?>