
<?php require 'header.php';
?>

<!doctype html>
<html lang="fr">
<head>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">

    <meta charset="utf-8">
    <title>S'inscrire</title> 
  
</head>


<?php
$bdd = new PDO('mysql:host=localhost;dbname=slcompetition', 'root', 'root');

if(isset($_POST['forminscription'])) {
   $nom = htmlspecialchars($_POST['Nom']);
   $prenom = htmlspecialchars($_POST['Prenom']);
   $age = htmlspecialchars($_POST['age']);
   $login = htmlspecialchars($_POST['login']);
   $email = htmlspecialchars($_POST['email']);
   $mail2 = htmlspecialchars($_POST['mail2']);
   $mdp = sha1($_POST['motdepasse']);
   $mdp2 = sha1($_POST['motdepasse2']);
   $cp = htmlspecialchars($_POST['codepostal']);
   $pays = htmlspecialchars($_POST['Pays']);
   if(!empty($_POST['Nom']) AND !empty($_POST['Prenom']) AND !empty($_POST['age']) AND !empty($_POST['login']) AND !empty($_POST['email']) AND !empty($_POST['mail2']) AND !empty($_POST['motdepasse']) AND !empty($_POST['motdepasse2']) AND !empty($_POST['codepostal']) AND !empty($_POST['Pays'])) {
      $pseudolength = strlen($login);
      if($pseudolength <= 25) {
         if($email == $mail2) {
            
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $reqmail = $bdd->prepare("SELECT * FROM client WHERE email = ?");
                  $reqmail->execute(array($email));
                  $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
                  if($mdp == $mdp2) {
                     $insertmbr = $bdd->prepare("INSERT INTO client(Nom, Prenom, age, login, email, motdepasse, codepostal, Pays) VALUES(?, ?, ?, ?, ?, ?, ? ,?)");
                     $insertmbr->execute(array($nom, $prenom, $age, $login, $email, $mdp, $cp, $pays ));
                     $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                  } else {
                     $erreur = "Vos mots de passes ne correspondent pas !";
                  }
               } else {
                  $erreur = "Adresse mail déjà utilisée !";
               }
            } else {
               $erreur = "Votre adresse mail n'est pas valide !";
            }
         
         } else {
            $erreur = "Vos adresses mail ne correspondent pas !";
         }
      } else {
         $erreur = "Votre pseudo ne doit pas dépasser 25 caractères !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>


<html>


      <div class="inscription">
         
         <form method="POST" action="">
         
         <center>
         <h2>Inscription</h2>
         <br /><br />         
                     <!--<label for="nom">Nom :</label>-->
                     <input type="text" placeholder="Votre nom" id="Nom" name="Nom" value="<?php if(isset($nom)) { echo $nom; } ?>" />
                     <br /><br />
                     <!--<label for="prenom">Prenom :</label>-->
                     <input type="text" placeholder="Votre prénom" id="Prenom" name="Prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>" />
                     <br /><br />
                     <!--<label for="age">Age :</label>-->
                     <input type="text" placeholder="Votre age" id="age" name="age" value="<?php if(isset($age)) { echo $age; } ?>" />
                     <br /><br />
                     <!--<label for="login">Login :</label>-->
                     <input type="text" placeholder="Votre login" id="login" name="login" value="<?php if(isset($login)) { echo $login; } ?>" />
                     <br /><br />
                     <!--<label for="email">Adresse e-Mail :</label>-->
                     <input type="email" placeholder="Votre mail" id="email" name="email" value="<?php if(isset($email)) { echo $email; } ?>" />
                     <br /><br />
                     <!--<label for="mail2">Confirmation du mail :</label>-->
                     <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
                     <br /><br />
                     <!--<label for="mdp">Mot de passe :</label>-->
                     <input type="password" placeholder="Votre mot de passe" id="motdepasse" name="motdepasse" />
                     <br /><br />
                     <!--<label for="mdp2">Confirmation du mot de passe :</label>-->
                     <input type="password" placeholder="Confirmez votre mdp" id="motdepasse2" name="motdepasse2" />
                     <br /><br />
                     <!--<label for="codepostal">Code Postal:</label>-->

    <select name="codepostal" id="codepostal" value="<?php if(isset($cp)) { echo $cp; } ?>">
    <option value="">--Choisissez un CP--</option>
    <option value="97400">97400</option>
    <option value="97410">97410</option>
    <option value="97412">97412</option>
    <option value="97413">97413</option>
    <option value="97414">97414</option>
    <option value="97419">97419</option>
    <option value="97420">97420</option>
    <option value="97425">97425</option>
    <option value="97426">97426</option>
    <option value="97427">97427</option>
    <option value="97429">97429</option>
    <option value="97430">97430</option>
    <option value="97431">97431</option>
    <option value="97433">97433</option>
    <option value="97436">97436</option>
    <option value="97438">97438</option>
    <option value="97439">97439</option>
    <option value="97440">97440</option>
    <option value="97441">97441</option>
    <option value="97442">97442</option>
    <option value="97450">97450</option>
    <option value="97460">97460</option>
    <option value="97470">97470</option>
    <option value="97480">97480</option>
    
    </select>
                <br /><br />  

                      <!--<label for="Pays">Pays :</label>-->
                     <input type="text" placeholder="Votre Pays" id="Pays" name="Pays" value="<?php if(isset($pays)) { echo $pays; } ?>" />
                     <br /><br />

                     <input type="submit" name="forminscription" value="Je m'inscris" />
                     <br /><br /><br />

       
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>   
         </center>
         </form>
         
      </div>
   </body>

   <?php include "footer.php" ?> 

</html>