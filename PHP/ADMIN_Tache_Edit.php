<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="5"> -->
    <title>Test Edit</title>
    <link rel="stylesheet" href="../CSS/RessourcesEdit.css">
    <link rel="shortcut icon" href="../Assets/Logo.png">
    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
</head>
<body>
    

    <?php
    // Connexion à la base de données SQLite
    $pdo = new PDO("sqlite:../DATABASE/bdd.sqlite");

    if (isset($_GET["ID"])) {
        $ID = $_GET["ID"];
        echo "<h1 class='Titre1'>Modification ID : $ID </h1>";

        // Récupération des informations liées à l'ID
        $query = "SELECT * FROM Tache WHERE IDTache = $ID";
        $result = $pdo->query($query);
        $row = $result->fetch();
        

        // Affichage des champs d'entrée avec les informations récupérées
        echo "<form method='post' class='FormulaireEdit'>";

        echo "<input type='hidden' name='ID' value='$ID'>";
        
        echo "<label for='NomRessource' class='TitreLabel'>Ressource : </label>";
        echo "<input type='text' id='NomTache' name='NomTache' class='text-input-NomRessource' value='".$row["NomTache"]."'><br>";

        echo "<label for='ReferenceRessource' class='TitreLabel'>Référence : </label>";
        echo "<input type='text' id='DescriptionTache' name='DescriptionTache' class='text-input-ReferenceRessource' value='".$row["DescriptionTache"]."'><br>";

        echo "<label for='QuantiteRessource' class='TitreLabel'>Quantité : </label>";
        echo "<input type='text' id='PrioriteTache' name='PrioriteTache' class='text-input-QuantiteRessource' value='".$row["PrioriteTache"]."'><br>";

        echo "<label for='PrixUniteRessource' class='TitreLabel'>Prix/Unité : </label>";
        echo "<input type='text' id='DateDebutTache' name='DateDebutTache' class='text-input-PrixUniteRessource' value='".$row["DateDebutTache"]."'><br>";

        echo "<label for='PrixUniteRessource' class='TitreLabel'>Prix/Unité : </label>";
        echo "<input type='text' id='DateMaxTache' name='DateMaxTache' class='text-input-PrixUniteRessource' value='".$row["DateMaxTache"]."'><br>";

        echo "<label for='PrixUniteRessource' class='TitreLabel'>Prix/Unité : </label>";
        echo "<input type='text' id='StatutTache' name='StatutTache' class='text-input-PrixUniteRessource' value='".$row["StatutTache"]."'><br>";
        
        // echo "<label for='PrixUniteRessource' class='TitreLabel'>Prix/Unité : </label>";
        // echo "<input type='text' id='IdUtilisateur' name='IdUtilisateur' class='text-input-PrixUniteRessource' value='".$row["IdUtilisateur"]."'><br>";




        echo "<div class='conteneur-boutons'>";
        echo "<input type='submit' name='valider' class='BoutonValider' value='Valider'>";
        echo "<input type='button' name='annuler' class='BoutonAnnuler' value='Annuler' onclick='window.location.href=\"../HTML/Ressources.php\"'>";
        echo "</div>";
        echo "</form>";


    } else {
        // Gérer l'absence d'ID
    }

    // Traitement de la mise à jour des informations si le formulaire a été soumis
    if (isset($_POST["valider"])) {
        $ID = $_POST["ID"];
        $NomTache = $_POST["NomTache"];
        $DescriptionTache = $_POST["DescriptionTache"];
        $PrioriteTache = $_POST["PrioriteTache"];
        $DateDebutTache = $_POST["DateDebutTache"];
        $DateMaxTache = $_POST["DateMaxTache"];
        $StatutTache = $_POST["StatutTache"];

        // Mise à jour des informations dans la base de données
        // Mise à jour de la ligne correspondant à l'ID avec les nouvelles informations
        $query = "UPDATE Tache SET NomTache = '$NomTache', DescriptionTache = '$DescriptionTache', PrioriteTache = '$PrioriteTache', DateDebutTache = '$DateDebutTache', DateMaxTache = '$DateMaxTache', StatutTache = '$StatutTache' WHERE IDTache = $ID";

        $result = $pdo->query($query);

        // Redirection vers la page Demandes.php
        header("Location: ../PAGES/ADMIN_Tache.php");
}
?>
