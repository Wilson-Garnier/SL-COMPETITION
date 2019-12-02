<?php
SESSION_start();

$bdd = new PDO("mysql:host=localhost;dbname=slcompetition;charset=utf8", "root", "root" );

if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM client WHERE email = ? AND motdepasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['Id'] = $userinfo['Id'];
         $_SESSION['Nom'] = $userinfo['Nom'];
         $_SESSION['Prenom'] = $userinfo['Prenom'];
         $_SESSION['age'] = $userinfo['age'];
         $_SESSION['email'] = $userinfo['email'];
         $_SESSION['login'] = $userinfo['login'];
         $_SESSION['codepostal'] = $userinfo['codepostal'];
         $_SESSION['Pays'] = $userinfo['Pays'];

         header("Location: Vue/viewconn.php?id=".$_SESSION['Id']);
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<html>
<?php include "header.php" ?> 
   <body>
      <div class="inscription">
         <form method="POST" action="">
      
      <center>
            <h2>Connexion</h2>
            <br /><br />

            <label for="mail">Adresse e-mail : </label>
            <input type="email" id="mail" name="mailconnect" placeholder="Adresse mail" />
            <br /> <br />
            <label for="mdp">Mot de passe : </label>
            <input type="password" id="mdp" name="mdpconnect" placeholder="Mot de passe" />
            <br /><br />
            <input type="submit" name="formconnexion" value="Se connecter !" />
         </form>

         <br /> <br />
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      
      
      
      </center>
      </div>
   </body>
      <br /> <br /><br /> <br /><br /> <br /><br /> <br /><br /> <br /><br /> <br /><br /> <br /><br /> <br /><br /> <br /><br /> <br />
   <?php include "footer.php" ?> 
</html>