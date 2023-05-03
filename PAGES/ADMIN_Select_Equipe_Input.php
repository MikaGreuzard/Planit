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

    
?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="../CSS/ADMIN_Select_Equipe_Input.css">
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
       <a href="../PAGES/ADMIN_Projet.php">
         <i class='bx bx-spreadsheet' ></i>
         <span class="links_name">Projets</span>
       </a>
       <span class="tooltip">Projets</span>
     </li>
     <!--<li>
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
       <span class="tooltip">Réglages</span> -->
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


  <section class="home-section">
  <body>
    <section class="container">
    <header>Ajouter une tâche à <?php echo $_SESSION['utilisateur']['PrenomUtilisateur'] . ' ' . $_SESSION['utilisateur']['NomUtilisateur'];?></header>
      <form action="../PHP/ADMIN_Select_Equipe_Input_Config.php" method="post" class="form">
        <div class="input-box">
          <label>Nom & Prénom</label>
          <input type="text" placeholder="Enter full name" value="<?php echo $_SESSION['utilisateur']['PrenomUtilisateur']. ' ' . $_SESSION['utilisateur']['NomUtilisateur']; ?>" readonly required />
        </div>

        <div class="input-box">
          <label>Nom de la tâche</label>
          <input name="NomTache" type="text" placeholder="Nom de la tâche" required />
        </div>

        <div class="input-box">
          <label>Description de la tâche</label>
          <input name="DescriptionTache" type="text" placeholder="Description de la tâche" required />
        </div>

        <div class="gender-box">
          <h3>Priorité</h3>
          <div class="gender-option">
            <div class="gender">
              <input name="PrioriteTache" type="radio" id="check-male" value="1"  checked />
              <label for="check-male">1</label>
            </div>
            <div class="gender">
              <input name="PrioriteTache" type="radio" id="check-female" value="1"  />
              <label for="check-female">2</label>
            </div>
            <div class="gender">
              <input name="PrioriteTache" type="radio" id="check-other" value="1"  />
              <label for="check-other">3</label>
            </div>
          </div>
        </div>
        <div class="input-box">
        <label>Projet</label>
        <select name="Projet" placeholder="Sélection d'un projet" class="texte-input-Projet">
          <?php
            try {
              $pdo = new PDO("sqlite:../DATABASE/bdd.sqlite");

              $Projets = $pdo->query("SELECT IdProjet, NomProjet FROM Projet");

              print "<option hidden selected disabled>Sélection d'un projet (Facultatif)</option>";
              foreach($Projets as $Projet) {
                print "<option value='".$Projet['IdProjet']."'>".$Projet['NomProjet']."</option>";
              }
            } catch (PDOException $e) {
              die($e);
            }
          ?>
        </select>
        <div class="input-box">
            <label>Date de début</label>
            <input name="DateDebutTache" type="date" placeholder="Enter birth date" required />
        </div>
        <div class="input-box">
            <label>Date d'échéance</label>
            <input name="DateMaxTache" type="date" placeholder="Enter birth date" required />
        </div>
        <button class='AjouterBtn'>Ajouter</button>
        <button type="button" class="AnnulerBtn" onclick="window.location.href='../PHP/Notif_Annuler.php';">Annuler</button>
      </form>
    </section>
  </body>
    <!--<script src="script.js"></script>-->
    </div>
      <div class='text2'>
        Vous êtes connecté en tant que <span class='ConnectAs'><?php echo $_SESSION['PrenomUtilisateur'] . ' ' . $_SESSION['NomUtilisateur']; ?></span>
    </div>
  </section>  
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
