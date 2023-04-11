<?php
session_start();

// ========== SESSION START ========== //
if(isset($_POST['Identifiant']) && isset($_POST['MotDePasse'])) {
    // ===== Attribution de colonnes à des variables ===== //
    $Identifiant = $_POST['Identifiant'];
    $MotDePasse = $_POST['MotDePasse'];

    // ===== Connexion à la base de données ===== //
    try {
        $dbh = new PDO("sqlite:../DATABASE/bdd.sqlite");
        // ===== Vérification de l'existence de l'utilisateur ===== //
        $stmt = $dbh->prepare("SELECT COUNT(*) FROM Utilisateur WHERE EmailUtilisateur=? and MotDePasseUtilisateur=?");
        // ===== Attribution des variables aux colonnes ===== // 
        $stmt->execute(array($Identifiant, $MotDePasse));
        $nbUsers = $stmt->fetchColumn();
        if ($nbUsers == 0) {
            // ===== Redirection vers la page de connexion ===== //
            header('Location: ../PAGES/Login_Error.php');
        }
        else {
            // ===== Récupération des informations de l'utilisateur ===== //
            $stmt = $dbh->prepare("SELECT PrenomUtilisateur, AccesUtilisateur, NomUtilisateur, StatutUtilisateur, ServiceUtilisateur FROM Utilisateur WHERE EmailUtilisateur=? and MotDePasseUtilisateur=?");
            $stmt->execute(array($Identifiant, $MotDePasse));
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $PrenomUtilisateur = $result['PrenomUtilisateur'];
            $AccesUtilisateur = $result['AccesUtilisateur'];
            $NomUtilisateur = $result['NomUtilisateur'];
            $StatutUtilisateur = $result['StatutUtilisateur'];
            $ServiceUtilisateur = $result['ServiceUtilisateur'];

            // ===== Enregistrement du prénom dans la session et redirection vers la page d'accueil appropriée ===== //
            $_SESSION['PrenomUtilisateur'] = $PrenomUtilisateur;
            $_SESSION['NomUtilisateur'] = $NomUtilisateur;
            $_SESSION['StatutUtilisateur'] = $StatutUtilisateur;
            $_SESSION['AccesUtilisateur'] = $AccesUtilisateur;
            $_SESSION['ServiceUtilisateur'] = $ServiceUtilisateur;
            if ($AccesUtilisateur == "ADMIN") {
              header('Location: ../PAGES/ADMINè_Index.php');
            }
            else if ($AccesUtilisateur == "USER") {
              header('Location: ../PAGES/USER_Index.php');
            }
        }
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
