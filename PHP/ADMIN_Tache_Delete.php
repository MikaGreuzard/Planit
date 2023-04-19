<?php
    $id = $_POST["id"];

    try {
        $pdo = new PDO("sqlite:../DATABASE/bdd.sqlite");
        $req = $pdo->prepare("DELETE FROM Tache WHERE IDTache=?");
        $req->execute(array($id));
    } catch (PDOException $e) {
        die($e);
    } 
    $url="../PAGES/ADMIN_Tache.php";
    header("Location: $url");
    exit;
?>