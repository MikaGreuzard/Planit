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



  if (isset($_SESSION['notification'])) {
    echo "<div id='notification' class='notification'>{$_SESSION['notification']} <i id='delete-notification' class='bx bx-x delete-icon'></i></div>";
    unset($_SESSION['notification']);
  }
?>
<script>
  var deleteBtn = document.getElementById('delete-notification');
  var notification = document.getElementById('notification');
  deleteBtn.addEventListener('click', function() {
    notification.classList.add('hide');
  });

  var deleteBtn = document.getElementById('delete-notification');
  var notification = document.getElementById('notificationAnnuler');
  deleteBtn.addEventListener('click', function() {
    notification.classList.add('hide');
  });
</script>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="../CSS/ADMIN_Tache.css">
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
     <!-- <li>
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
     </li> -->
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
    <main class="table">
        <section class="table__header">
        <?php
          # Vérification que la variable ID existe
          if (isset($_GET["utilisateur"])) {
            # Récupération de l'ID de l'utilisateur dans l'URL
            $idUtilisateur = $_GET["utilisateur"];

            # Connexion à la base de données SQLite
            $pdo = new PDO("sqlite:../DATABASE/bdd.sqlite");

            try {
              # Requête SQL pour récupérer les tâches de l'utilisateur
              $taches = $pdo->query("
                SELECT Tache.*, Utilisateur.NomUtilisateur, Utilisateur.PrenomUtilisateur
                FROM Tache
                INNER JOIN Utilisateur ON Tache.IdUtilisateur = Utilisateur.IdUtilisateur
                WHERE Utilisateur.IdUtilisateur = $idUtilisateur AND Utilisateur.AccesUtilisateur != 'ADMIN'
              ");

              # On récupère le nom et prénom de l'utilisateur
              $utilisateur = $taches->fetch();
              $nomUtilisateur = $utilisateur['NomUtilisateur'];
              $prenomUtilisateur = $utilisateur['PrenomUtilisateur'];
              $_SESSION['utilisateur']['NomUtilisateur'] = $nomUtilisateur;
              $_SESSION['utilisateur']['PrenomUtilisateur'] = $prenomUtilisateur;
              $_SESSION['utilisateur']['IdUtilisateur'] = $idUtilisateur;
              
              echo "<h1 class='TableTitre'>Tâches de $prenomUtilisateur $nomUtilisateur</h1>";
            } catch (PDOException $e) {
              die($e);
            }
          }
        ?>


            <div class="input-group">
                <input type="search" placeholder="Rechercher...">
                <i class='bx bx-search'></i>
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow"><i class='bx bx-up-arrow-alt' ></span></th>
                        <th> Nom <span class="icon-arrow"><i class='bx bx-up-arrow-alt' ></span></th>
                        <th> Description <span class="icon-arrow"><i class='bx bx-up-arrow-alt' ></span></th>
                        <th> Priorité <span class="icon-arrow"><i class='bx bx-up-arrow-alt' ></span></th>
                        <th> Date début <span class="icon-arrow"><i class='bx bx-up-arrow-alt' ></span></th>
                        <th> Date max <span class="icon-arrow"><i class='bx bx-up-arrow-alt' ></span></th>
                        <th> Statut <span class="icon-arrow"><i class='bx bx-up-arrow-alt' ></span></th>
                        <th> Personne <span class="icon-arrow"><i class='bx bx-up-arrow-alt' ></span></th>
                        <th> Modifier <span class="icon-arrow"><i class='bx bx-up-arrow-alt' ></span></th>
                        <th> Supprimer <span class="icon-arrow"><i class='bx bx-up-arrow-alt' ></span></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                  # Vérification que la variable ID existe
                  if (isset($_GET["utilisateur"])) {
                      # Récupération de l'ID de l'utilisateur dans l'URL
                      $ID = $_GET["utilisateur"];
                      # Connexion à la base de données SQLite
                      $pdo = new PDO("sqlite:../DATABASE/bdd.sqlite");

                      try {
                          # Requête SQL pour récupérer les tâches de l'utilisateur
                          $Taches = $pdo->query("SELECT Tache.*, Utilisateur.NomUtilisateur, Utilisateur.PrenomUtilisateur FROM Tache INNER JOIN Utilisateur ON Tache.IdUtilisateur = Utilisateur.IdUtilisateur WHERE Utilisateur.IdUtilisateur = $ID AND Utilisateur.AccesUtilisateur != 'ADMIN'");
                          
                          # On affiche les données de la base
                          foreach ($Taches as $Tache) {
                              # On affiche les données de la base
                              print "<tr><td>" . $Tache["IdTache"] . "</td> <td>" . $Tache["NomTache"] . "</td> <td>" . $Tache["DescriptionTache"] . "</td> <td>" . $Tache["PrioriteTache"] . "</td> <td>" . $Tache["DateDebutTache"] . "</td> <td>" . $Tache["DateMaxTache"] . "</td> <td>" . $Tache["StatutTache"] . "</td> <td>" . $Tache["PrenomUtilisateur"] . " " . $Tache["NomUtilisateur"] . "</td>                  <td> <a href='../PHP/ADMIN_Select_Equipe_Edit.php?ID=" . $Tache["IdTache"] . "' class='boutonModifier'><i class='bx bx-edit tablebtn'></i></i></a> </td>                   <td><form action='../PHP/ADMIN_Select_Equipe_Delete_Config.php' method='post'><input type='hidden' name='id' value=' " . $Tache["IdTache"] . "'><button type='submit' value='Supprimer' class='BoutonSupp'><i class='bx bx-x'></i></form></td>                 </tr>";
                          }
                      } catch (PDOException $e) {
                          die($e);
                      }
                  }
                  # ...
                ?>
                </tbody>
            </table>
        </section>
        <a href="../PAGES/ADMIN_Select_Equipe_Input.php" class='btntest'>Nouvelle tâche</a>
    </main>
    <script src='../JS/ADMIN_Tache.js'></script>
</body>
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
// Fonction pour masquer la notification après un délai de 5 secondes
setTimeout(function() {
  var notification = document.querySelector('.notification');
  if (notification) {
    notification.classList.add('hide');
  }
}, 5000);

// Fonction pour masquer la notification après un délai de 5 secondes
setTimeout(function() {
  var notification = document.querySelector('.notificationAnnuler');
  if (notification) {
    notification.classList.add('hide');
  }
}, 5000);
  </script>
</body>

</html>
