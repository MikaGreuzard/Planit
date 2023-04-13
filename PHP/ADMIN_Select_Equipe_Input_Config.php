<?php
  session_start();
    if (!isset($_SESSION['utilisateur']['IdUtilisateur'])) {
        $_SESSION['utilisateur']['IdUtilisateur'] = '';
    }

    $NomTache = $_POST["NomTache"];
    $DescriptionTache = $_POST["DescriptionTache"];
    $PrioriteTache = $_POST["PrioriteTache"];
    $DateDebutTache = $_POST["DateDebutTache"];
    $DateDebutTache = date("d/m/Y", strtotime($DateDebutTache));
    $DateMaxTache = $_POST["DateMaxTache"];
    $DateMaxTache = date("d/m/Y", strtotime($DateMaxTache));
    $StatutTache = "En cours";
    $IdUtilisateur = $_SESSION['utilisateur']['IdUtilisateur'];
    try {
        $pdo = new PDO("sqlite:../DATABASE/bdd.sqlite");
        $req = $pdo->prepare("INSERT INTO Tache ('NomTache', 'DescriptionTache', 'PrioriteTache', 'DateDebutTache', 'DateMaxTache', 'StatutTache', 'IdUtilisateur') VALUES (?, ?, ?, ?, ?, ?, ?)");
        $req->execute(array($NomTache, $DescriptionTache, $PrioriteTache, $DateDebutTache, $DateMaxTache, $StatutTache, $IdUtilisateur));
    } catch (PDOException $e) {
        die($e);
    }
    $url="../PAGES/ADMIN_Tache.php";
    header("Location: $url");
    exit;
?>