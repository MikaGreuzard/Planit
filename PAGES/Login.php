<!-- Début du document HTML -->
<!DOCTYPE html> <!-- Indique que le document est un document HTML5 -->
<html lang="en"> <!-- Balise d'ouverture de la page HTML avec attribut "lang" indiquant la langue de la page (anglais) -->
  <head> <!-- Balise d'en-tête de la page -->
    <meta charset="UTF-8" /> <!-- Définit le codage des caractères utilisés dans le document -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Définit le mode de compatibilité pour Internet Explorer -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <!-- Définit la taille d'affichage et le niveau de zoom initial pour les appareils mobiles -->
    <title>Plan'it</title> <!-- Titre de la page -->
    <link rel="stylesheet" href="../CSS/Login.css" /> <!-- Lie un fichier CSS externe à la page -->
  </head>
  <body> <!-- Balise du corps de la page -->
    <main> <!-- Balise du contenu principal de la page -->
      <div class="box"> <!-- Div qui englobe tout le contenu de la page -->
        <div class="inner-box"> <!-- Div qui contient les deux formulaires et le slider -->

          <div class="forms-wrap"> <!-- Div qui contient les deux formulaires -->
    
          <form action="../PHP/Login_Config.php" method="POST" autocomplete="off" class="sign-in-form">
              <div class="logo"> <!-- Div contenant le logo du site -->
                <h4><span class="first-word">Plan'</span><span class="second-word">it</span></h4> <!-- Titre du logo -->
              </div>
    
              <div class="heading"> <!-- Div contenant le titre du formulaire de connexion -->
                <h2>Bienvenue</h2> <!-- Titre principal du formulaire -->
                <h6>Connectez-vous à l'aide de vos identifiants.</h6> <!-- Sous-titre du formulaire -->
                <!-- <a href="#" class="toggle">Inscription</a> Bouton permettant de basculer sur le formulaire d'inscription -->
              </div>
    
              <div class="actual-form"> <!-- Div contenant les champs de saisie du formulaire de connexion -->
                <div class="input-wrap"> <!-- Div contenant le champ d'identification -->
                  <input
                    type="text"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    name="Identifiant"
                    required
                  />
                  <label>Email</label> <!-- Étiquette associée au champ d'identification -->
                </div>
    
                <div class="input-wrap"> <!-- Div contenant le champ de mot de passe -->
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    name="MotDePasse"
                    required
                  />
                  <label>Mot de passe</label> <!-- Étiquette associée au champ de mot de passe -->
                </div>
    
                <input type="submit" value="Connexion" class="sign-btn" /> <!-- Bouton de soumission du formulaire -->
    
                <p class="text"> <!-- Paragraphe de texte contenant un lien pour récupérer un identifiant ou un mot de passe oublié -->
                  Identifiant ou mot de passe oublié ?
                  <a href="#">Aide</a>
                </p>
              </div>
            </form>

            <form action="../PHP/InscriptionConfig.php" method="post" class="sign-up-form"> <!-- Formulaire d'inscription avec action "index.html", méthode POST et classe "sign-up-form" -->
              <div class="logo"> <!-- Div contenant le logo du site -->
                <h4><span class="first-word">Plan'</span><span class="second-word">it</span></h4> <!-- Titre du logo -->
              </div>
    
              <div class="heading"> <!-- Div contenant le titre du formulaire d'inscription -->
                <h2>Inscription</h2> <!-- Titre principal du formulaire -->
                <h6>Vous avez déjà un compte ?</h6> <!-- Sous-titre du formulaire -->
                <a href="#" class="toggle">Se connecter</a> <!-- Bouton permettant de basculer sur le formulaire de connexion -->
              </div>
    
              <div class="actual-form"> <!-- Div contenant les champs de saisie du formulaire d'inscription -->
              <div class="input-wrap">
                <input
                  type="text"
                  minlength="4"
                  class="input-field"
                  autocomplete="off"
                  name="NomUtilisateur"
                  required
                />
                <label>Nom</label>
              </div>

    
                <div class="input-wrap"> <!-- Div contenant le champ d'email -->
                <input
                    type="text"
                    class="input-field"
                    autocomplete="off"
                    name="PrenomUtilisateur"
                    required
                />
                  <label>Prénom</label> <!-- Étiquette associée au champ d'email -->
                </div>
    
                <div class="input-wrap"> <!-- Div contenant le champ de mot de passe -->
                <input
                    type="email"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    name="EmailUtilisateur"
                    required
                />
                  <label>Email</label> <!-- Étiquette associée au champ de mot de passe -->
                </div>

                <div class="input-wrap"> <!-- Div contenant le champ de mot de passe -->
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    name="MotDePasseUtilisateur"
                    required
                  />
                  <label>Mot de passe</label> <!-- Étiquette associée au champ de mot de passe -->
                </div>

                <div class="input-wrap"> <!-- Div contenant le champ de mot de passe -->
                  <input
                    type="text"
                    minlength="2"
                    class="input-field"
                    autocomplete="off"*
                    name="ServiceUtilisateur"
                    required
                  />
                  <label>Service</label> <!-- Étiquette associée au champ de mot de passe -->
                </div>
    
                <input type="submit" value="Inscription" class="sign-btn" /> <!-- Bouton de soumission du formulaire -->
    
                <p class="text"> <!-- Paragraphe de texte contenant des liens vers les conditions d'utilisation et la politique de confidentialité -->
                  En m'inscrivant, j'accepte les 
                  <a href="#">Conditions d'utilisation</a> et la
                  <a href="#">Politique de confidentialité</a>
                </p>
              </div>
            </form>
          </div>
    
          <div class="carousel"> <!-- Div contenant le slider -->
            <div class="images-wrapper"> <!-- Div contenant les images du slider -->
              <img src="../ASSETS/image1.png" class="image img-1 show" alt="" /> <!-- Image par défaut affichée au chargement de la page -->
              <img src="../ASSETS/image2.png" class="image img-2" alt="" /> <!-- Image du slider -->
              <img src="../ASSETS/image3.png" class="image img-3" alt="" /> <!-- Image du slider -->
            </div>
    
            <div class="text-slider"> <!-- Div contenant les titres du slider -->
              <div class="text-wrap"> <!-- Div contenant les titres du slider -->
                <div class="text-group"> <!-- Div contenant les différents titres du slider -->
                  <h2>Gérez vos tâches en toute simplicité.</h2> <!-- Titre du slider -->
                  <h2>Toutes vos tâches au même endroit.</h2> <!-- Titre du slider -->
              <h2>Simplifiez la gestion de vos tâches.</h2> <!-- Titre du slider -->
            </div>
          </div>

          <div class="bullets"> <!-- Div contenant les indicateurs du slider -->
            <span class="active" data-value="1"></span> <!-- Indicateur actif pour l'image par défaut -->
            <span data-value="2"></span> <!-- Indicateur pour la deuxième image -->
            <span data-value="3"></span> <!-- Indicateur pour la troisième image -->
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

  <!-- Fichier JavaScript -->

  <script src="../JS/Login.js"></script> <!-- Lie un fichier JavaScript externe à la page -->
  </body>
</html>