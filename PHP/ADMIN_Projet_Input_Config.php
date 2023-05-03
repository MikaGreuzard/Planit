<?php
    session_start();
    if (!isset($_SESSION['utilisateur']['IdUtilisateur'])) {
        $_SESSION['utilisateur']['IdUtilisateur'] = '';
    }

    $NomProjet = $_POST["NomProjet"];
    $DescriptionProjet = $_POST["DescriptionProjet"];
    $DateDebutProjet = $_POST["DateDebutProjet"];
    $DateFinProjet = $_POST["DateFinProjet"];
    $ChefProjet = $_POST["ChefProjet"];

    try {
        $pdo = new PDO("sqlite:../DATABASE/bdd.sqlite");
        $req = $pdo->prepare("INSERT INTO Projet ('NomProjet', 'DescriptionProjet', 'DateDebutProjet', 'DateFinProjet', 'ChefProjet') VALUES (?, ?, ?, ?, ?)");
        $req->execute(array($NomProjet, $DescriptionProjet, $DateDebutProjet, $DateFinProjet, $ChefProjet));
    } catch (PDOException $e) {
        die($e);
    }

    $url="../PAGES/ADMIN_Projet.php";
    header("Location: $url");
    exit;
?>