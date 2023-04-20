<?php
  session_start();
  if (!isset($_SESSION['utilisateur']['NomUtilisateur'])) {
    $_SESSION['utilisateur']['NomUtilisateur'] = '';
  }
  if (!isset($_SESSION['utilisateur']['PrenomUtilisateur'])) {
    $_SESSION['utilisateur']['PrenomUtilisateur'] = '';
  }
    if (!isset($_SESSION['utilisateur']['StatutUtilisateur'])) {
        $_SESSION['utilisateur']['StatutUtilisateur'] = '';
    }


    $_SESSION['notification'] = "<div class='notificationAnnuler'><i class='bx bxs-check-circle icon'></i>Votre tâche n'a pas été ajouté !<i class='bx bx-x delete-icon'></i></div>";

    $url="../PAGES/ADMIN_Select_Equipe.php?utilisateur=" . $_SESSION['utilisateur']['IdUtilisateur'];
    header("Location: $url");

?>