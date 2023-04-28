<?php
  session_start();
  # Permet de gérer les erreurs
  try {
    # Connexion à la base de données, on garde cette connexion dans une variable
    # sqlite est le type de base de données, ce qui suit après les : est la base de données (en local pour sqlite)
    $pdo = new PDO("sqlite:../DATABASE/bdd.sqlite");

    # Maintenant qu'on est connecté on récupère les données (table Demandes)
    # query permet d'exécuter une requête SQL
    $stmt = $pdo->prepare("SELECT * FROM Tache WHERE IdProjet = :idProjet");
    $stmt->bindParam(':idProjet', $_GET['ID']);
    $stmt->execute();
    $Taches = $stmt->fetchAll(PDO::FETCH_ASSOC);

  } catch (PDOException $e) {
    die($e);
  }
?>

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
     <li>
       <a href="../PAGES/ADMIN_Projet.php">
         <i class='bx bx-spreadsheet' ></i>
         <span class="links_name">Projet</span>
       </a>
       <span class="tooltip">Projet</span>
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
        <?php $ID = isset($_GET["ID"]) ? intval($_GET["ID"]) : null; ?>
        <h1 class='TableTitre'>Projet <?php echo $_SESSION['ServiceUtilisateur'].' - '.$pdo->query("SELECT NomProjet FROM Projet WHERE IdProjet = $ID")->fetchColumn(); ?></h1>
            <div class="input-group">
                <input type="search" placeholder="Rechercher...">
                <i class='bx bx-search'></i>
            </div>
        </section>
        <section class="table__body">
        <table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nom</th>
      <th>Description</th>
      <th>Date début</th>
      <th>Date fin</th>
    </tr>
  </thead>
  <tbody>
  <?php 
$pdo = new PDO("sqlite:../DATABASE/bdd.sqlite");

if (isset($_GET["ID"])) {
    $ID = intval($_GET["ID"]);
    // Récupération des informations liées à l'ID
    
    $req = $pdo->prepare("SELECT * FROM Tache WHERE IdProjet = ?");
    $req->execute(array($ID));

    // if ($req->rowCount() > 0) {
        while($Tache = $req->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $Tache['IdTache']; ?></td>
                <td><?php echo $Tache['NomTache']; ?></td>
                <td><?php echo $Tache['DescriptionTache']; ?></td>
                <td><?php echo $Tache['DateDebutTache']; ?></td>
                <td><?php echo $Tache['DateMaxTache']; ?></td>
            </tr>
        <?php }
    // } else {
    //     echo "Aucune tâche trouvée avec cet ID.";
    // }
}
?>


  </tbody>
</table>

        </section>
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
  </script>
</body>
</html>
