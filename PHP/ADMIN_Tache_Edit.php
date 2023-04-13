<?php
if(session_status() == PHP_SESSION_NONE) {
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



  <section class="home-section">


  <body>
    <section class="container">
    <?php
    // Connexion à la base de données SQLite
    $pdo = new PDO("sqlite:../DATABASE/bdd.sqlite");

    $tache = array(); // définit $tache comme un tableau vide par défaut

    if (isset($_GET["ID"])) {
        $ID = $_GET["ID"];
        
    
        // Récupération des informations liées à l'ID
        $query = "SELECT * FROM Tache WHERE IDTache = $ID";
        echo "<h1 class='Titre1'>Modification tâche ID : $ID </h1>";
        $result = $pdo->query($query);
        $tache = $result->fetch();
        $pdo = null;
    
    }    
    ?>
    <form method="post" class="form">
        <div class="input-box">
            <label>Nom de la tâche</label>
            <input type="text" name="NomTache" placeholder="Enter full name" value="<?php echo $tache['NomTache']?>" required />
        </div>

        <div class="input-box">
            <label>Description de la tâche</label>
            <input type="text" name="DescriptionTache" placeholder="Enter email address" value="<?php echo $tache['DescriptionTache']?>" required />
        </div>

        <div class="input-box">
            <label>Priorité de la tâche</label>
            <input type="text" name="PrioriteTache" placeholder="Enter email address" value="<?php echo $tache['PrioriteTache']?>" required />
        </div>

        <div class="input-box">
            <label>Date de début</label>
            <input type="text" name="DateDebutTache" placeholder="Enter birth date" value="<?php echo $tache['DateDebutTache']?>" required />
        </div>

        <div class="input-box">
            <label>Date d'échéance</label>
            <input type="text" name="DateMaxTache" placeholder="Enter birth date" value="<?php echo $tache['DateMaxTache']?>"required />
        </div>

        <div class="input-box">
            <label>Statut de la tâche</label>
            <div class="select-box">
                <select name="StatutTache">
                    <option <?php if ($tache['StatutTache'] == 'Non Fait') echo 'selected'; ?>>Non Fait</option>
                    <option <?php if ($tache['StatutTache'] == 'En cours') echo 'selected'; ?>>En cours</option>
                    <option <?php if ($tache['StatutTache'] == 'Terminé') echo 'selected'; ?>>Terminé</option>
                </select>
            </div>
        </div>

        <button class='AjouterBtn' name="validerModif">Modifier la tâche</button>
    </form>
    </section>
    <?php
$donnees = array(); // définit $donnees comme un tableau vide par défaut

if (isset($_POST["validerModif"])) {
    $ID = $_GET["ID"];
    $NomTache = $_POST["NomTache"];
    $DescriptionTache = $_POST["DescriptionTache"];
    $PrioriteTache = $_POST["PrioriteTache"];
    $DateDebutTache = $_POST["DateDebutTache"];
    $DateMaxTache = $_POST["DateMaxTache"];
    $StatutTache = $_POST["StatutTache"];

    // Stockage des données soumises par le formulaire dans $donnees
    $donnees = array(
        "NomTache" => $NomTache,
        "DescriptionTache" => $DescriptionTache,
        "PrioriteTache" => $PrioriteTache,
        "DateDebutTache" => $DateDebutTache,
        "DateMaxTache" => $DateMaxTache,
        "StatutTache" => $StatutTache
    );

    // Mise à jour des informations dans la base de données
    // Mise à jour de la ligne correspondant à l'ID avec les nouvelles informations
    $pdo = new PDO("sqlite:../DATABASE/bdd.sqlite");
    $query = "UPDATE Tache SET NomTache = :NomTache, DescriptionTache = :DescriptionTache, PrioriteTache = :PrioriteTache, DateDebutTache = :DateDebutTache, DateMaxTache = :DateMaxTache, StatutTache = :StatutTache WHERE IDTache = :ID";
    $stmt = $pdo->prepare($query);
    $result = $stmt->execute([
        ":NomTache" => $NomTache,
        ":DescriptionTache" => $DescriptionTache,
        ":PrioriteTache" => $PrioriteTache,
        ":DateDebutTache" => $DateDebutTache,
        ":DateMaxTache" => $DateMaxTache,
        ":StatutTache" => $StatutTache,
        ":ID" => $ID,
    ]);

    // Redirection vers la page ADMIN_Tache.php
    header("Location: ../PAGES/ADMIN_Equipe.php");
    exit();


}
?>
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
