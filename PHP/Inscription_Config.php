<?php
    $NomUtilisateur = $_POST["NomUtilisateur"];
    $PrenomUtilisateur = $_POST["PrenomUtilisateur"];
    $EmailUtilisateur = $_POST["EmailUtilisateur"];
    $MotDePasseUtilisateur = $_POST["MotDePasseUtilisateur"];
    $ServiceUtilisateur = $_POST["ServiceUtilisateur"];
    
    $AccesUtilisateur = "USER"; // Ajout de cette ligne pour initialiser la valeur de la colonne "StatutUtilisateur"

    try {
        $pdo = new PDO("sqlite:../DATABASE/bdd.sqlite");
        $req = $pdo->prepare("INSERT INTO Utilisateur ('NomUtilisateur', 'PrenomUtilisateur', 'EmailUtilisateur', 'MotDePasseUtilisateur', 'StatutUtilisateur', 'ServiceUtilisateur') VALUES (?, ?, ?, ?, ?, ?)");
        $req->execute(array($NomUtilisateur, $PrenomUtilisateur, $EmailUtilisateur, $MotDePasseUtilisateur, $StatutUtilisateur, $ServiceUtilisateur));
    } catch (PDOException $e) {
        die($e);
    }
    $url="../PAGES/Index.php";
    header("Location: $url");
    exit;
?>
