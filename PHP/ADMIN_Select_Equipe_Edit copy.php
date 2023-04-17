<?php
  session_start();
  if (!isset($_SESSION['utilisateur']['NomUtilisateur'])) {
    $_SESSION['utilisateur']['NomUtilisateur'] = '';
  }

?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="../CSS/ADMIN_Select_Equipe_Edit.css">
    <title>Plan'it</title> <!-- Titre de la page -->
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
  <div class="logo-details">
    <i class='bx bxs-parking icon'></i>
        <div class="logo_name">Plan'it</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Rechercher...">
         <span class="tooltip">Rechercher</span>
      </li>
      <li>
        <a href="../PAGES/ADMIN_Index.php">
          <i class='bx bx-home-alt Accueil'></i>
          <span class="links_name Accueil">Accueil</span>
        </a>
         <span class="tooltip Accueil">Accueil</span>
      </li>
      <li>
       <a href="../PAGES/ADMIN_Equipe.php" class='Equipe'>
         <i class='bx bx-user Equipe' ></i>
         <span class="links_name Equipe">Equipe</span>
       </a>
       <span class="tooltip Equipe">Equipe</span>
     </li>
     <li>
       <a href="../PAGES/ADMIN_Tache.php" class='Tache'>
         <i class='bx bx-task Tache'></i>
         <span class="links_name Tache">Tâches</span>
       </a>
       <span class="tooltip Tache">Tâches</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Analyses</span>
       </a>
       <span class="tooltip">Analyses</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Archives</span>
       </a>
       <span class="tooltip">Archives</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-folder-plus'></i>
         <span class="links_name">Boite à idée</span>
       </a>
       <span class="tooltip">Boite à idée</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-question-mark'></i>
         <span class="links_name">Informations</span>
       </a>
       <span class="tooltip">Informations</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Réglages</span>
       </a>
       <span class="tooltip">Réglages</span>
     </li>
     <li class="profile no-animation">
        <div class="profile-details">
          <!--<img src="profile.jpg" alt="profileImg">-->
          <div class="name_job">
          <div class="name"><?php echo isset($_SESSION['PrenomUtilisateur']) && isset($_SESSION['NomUtilisateur']) ? $_SESSION['PrenomUtilisateur'] . ' ' . $_SESSION['NomUtilisateur'] : ''; ?></div>
          <div class="job"><?php echo isset($_SESSION['StatutUtilisateur']) ? $_SESSION['StatutUtilisateur'] : ''; ?></div>
          </div>
        </div>
        <a href="../PAGES/Login.php" class='TEST'>
          <i class='bx bx-log-out' id="log_out"></i>
        </a>
      </li>
    </ul>
  </div>
  </div>

  <section class="container">
  <?php
    // Connexion à la base de données SQLite
    $pdo = new PDO("sqlite:../DATABASE/bdd.sqlite");

    if (isset($_GET["ID"])) {
        $ID = $_GET["ID"];
        // Récupération des informations liées à l'ID
        $query = "SELECT * FROM Tache WHERE IdTache = $ID";
        $result = $pdo->query($query);
        $row = $result->fetch();
        
        echo '<header>Modification de la tâche de ' . $_SESSION['utilisateur']['PrenomUtilisateur'] . ' ' . $_SESSION['utilisateur']['NomUtilisateur'] . '</header>';

        echo "<form method='post' class='FormulaireEdit'>";

        echo "<input type='hidden' name='ID' value='$ID'>";
        
        echo "<label for='NomTache' class='TitreLabel'>NomTache : </label>";
        echo "<input type='text' id='NomTache' name='NomTache' class='text-input-NomTache' value='".$row["NomTache"]."'><br>";

        echo "<label for='DescriptionTache' class='TitreLabel'>DescriptionTache : </label>";
        echo "<input type='text' id='DescriptionTache' name='DescriptionTache' class='text-input-DescriptionTache' value='".$row["DescriptionTache"]."'><br>";

        echo "<label for='PrioriteTache' class='TitreLabel'>PrioriteTache : </label>";
        echo "<input type='text' id='PrioriteTache' name='PrioriteTache' class='text-input-PrioriteTache' value='".$row["PrioriteTache"]."'><br>";

        echo "<label for='DateDebutTache' class='TitreLabel'>DateDebutTache : </label>";
        echo "<input type='text' id='DateDebutTache' name='DateDebutTache' class='text-input-DateDebutTache' value='".$row["DateDebutTache"]."'><br>";

        echo "<label for='DateMaxTache' class='TitreLabel'>DateMaxTache : </label>";
        echo "<input type='text' id='DateMaxTache' name='DateMaxTache' class='text-input-DateMaxTache' value='".$row["DateMaxTache"]."'><br>";

        echo "<label for='StatutTache' class='TitreLabel'>StatutTache : </label>";
        echo "<input type='text' id='StatutTache' name='StatutTache' class='text-input-StatutTache' value='".$row["StatutTache"]."'><br>";

        echo "<div class='conteneur-boutons'>";
        echo "<input type='submit' name='valider2' class='BoutonValider' value='Valider'>";
        echo "<input type='button' name='annuler' class='BoutonAnnuler' value='Annuler' onclick='window.location.href=\"../PAGES/ADMIN_Select_Equipe.php?utilisateur=" . $_SESSION['utilisateur']['IdUtilisateur'] . "\";'>";
        echo "</div>";
        echo "</form>";


    } else {
        // Gérer l'absence d'ID
    }

    // Traitement de la mise à jour des informations si le formulaire a été soumis
    if (isset($_POST["valider2"])) {
        $ID = $_POST["ID"];
        $NomTache = $_POST["NomTache"];
        $DescriptionTache = $_POST["DescriptionTache"];
        $PrioriteTache = $_POST["PrioriteTache"];
        $DateDebutTache = $_POST["DateDebutTache"];
        $DateMaxTache = $_POST["DateMaxTache"];
        $StatutTache = $_POST["StatutTache"];

        // Mise à jour des informations dans la base de données
        // Mise à jour de la ligne correspondant à l'ID avec les nouvelles informations
        $query ="UPDATE Tache SET NomTache = '$NomTache', DescriptionTache = '$DescriptionTache', PrioriteTache = '$PrioriteTache', DateDebutTache = '$DateDebutTache', DateMaxTache = '$DateMaxTache', StatutTache = '$StatutTache' WHERE IdTache = $ID";
        $result = $pdo->query($query);

        // Redirection vers la page Demandes.php
        header("Location: ../PAGES/ADMIN_Select_Equipe.php?utilisateur=" . $_SESSION['utilisateur']['IdUtilisateur'] . "");
    }
?>
    </div>  
  </section>

  <div class='text2'>
        Vous êtes connecté en tant que <span class='ConnectAs'><?php echo $_SESSION['PrenomUtilisateur'] . ' ' . $_SESSION['NomUtilisateur']; ?></span>
  </div>

  <script>
      let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }

  </script>

</body>
</html>
