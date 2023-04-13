<?php

session_start();
if (!isset($_SESSION['utilisateur']['IdUtilisateur'])) {
    $_SESSION['utilisateur']['IdUtilisateur'] = '';
}

    $id = $_POST["id"];

    try {
        $pdo = new PDO("sqlite:../DATABASE/bdd.sqlite");
        $req = $pdo->prepare("DELETE FROM Tache WHERE IDTache=?");
        $req->execute(array($id));
    } catch (PDOException $e) {
        die($e);
    } 
    $url = "../PAGES/ADMIN_Select_Equipe.php?utilisateur=" . $_SESSION['utilisateur']['IdUtilisateur'];
    header("Location: $url");
    exit;
?>