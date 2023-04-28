<?php
    session_start();
    if (!isset($_SESSION['utilisateur']['IdUtilisateur'])) {
        $_SESSION['utilisateur']['IdUtilisateur'] = '';
    }

    $NomTache = $_POST["NomTache"];
    $DescriptionTache = $_POST["DescriptionTache"];
    $PrioriteTache = isset($_POST["PrioriteTache"]) ? $_POST["PrioriteTache"] : 0;
    $DateDebutTache = $_POST["DateDebutTache"];
    $DateDebutTache = date("d/m/Y", strtotime($DateDebutTache));
    $DateMaxTache = $_POST["DateMaxTache"];
    $DateMaxTache = date("d/m/Y", strtotime($DateMaxTache));
    $Projet = $_POST["Projet"];
    $StatutTache = "En cours";
    $IdUtilisateur = $_SESSION['utilisateur']['IdUtilisateur'];
    $_SESSION['notification'] = "<i class='bx bxs-check-circle icon'></i>Votre tâche a bien été ajoutée !<i class='bx bx-x delete-icon'></i>";

    try {
        $pdo = new PDO("sqlite:../DATABASE/bdd.sqlite");
        $req = $pdo->prepare("INSERT INTO Tache ('NomTache', 'DescriptionTache', 'PrioriteTache', 'DateDebutTache', 'DateMaxTache', 'StatutTache', 'IdUtilisateur', 'IdProjet') VALUES (?, ?, COALESCE(?, 0), ?, ?, ?, ?, ?)");
        $req->execute(array($NomTache, $DescriptionTache, $PrioriteTache, $DateDebutTache, $DateMaxTache, $StatutTache, $IdUtilisateur, $Projet));
    } catch (PDOException $e) {
        die($e);
    }

    $url="../PAGES/ADMIN_Select_Equipe.php?utilisateur=" . $_SESSION['utilisateur']['IdUtilisateur'];
    header("Location: $url");
    exit;
?>