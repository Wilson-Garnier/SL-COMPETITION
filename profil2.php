<?php
session_start();

$bdd = new PDO("mysql:host=localhost;dbname=slcompetition;charset=utf8", "root", "root" );


if (!array_key_exists('Id', $_SESSION)) {
    header('Location: connexion.php');
} else {
    require('header3.php');
 
    $stmt = $bdd->prepare('SELECT * FROM client WHERE Id = :Id');
    $stmt->bindParam('Id', $_SESSION['Id'], PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch();
}
?>
<!doctype html>
 
<html>
<head>
<meta charset="utf-8">
<title>Panel Membre</title>
<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
 
<body>
<article>
   
<center>
 <h2>Profil de <?php echo $user['login']; ?></h2>
         <br /><br />
         <b> Votre Nom : </b> <?php echo $user['Nom']; ?>
         <br />
         <b> Votre Prénom : </b> <?php echo $user['Prenom']; ?>
         <br />
         <b> Votre Age : </b> <?php echo $user['age']; ?> <i>ans</i>
         <br />
         <b> Votre Login : </b><?php echo $user['login']; ?>
         <br />
         <b> Votre Adresse e-mail : </b><?php echo $user['email']; ?>
         <br />
         <b> Votre Code Postal : </b><?php echo $user['codepostal']; ?>
         <br />
         <b> Votre Pays : </b><?php echo $user['Pays']; ?>
         <br />
      <br /><br /><br /><br /><br /><br /><br />
      <br /><br /><br /><br /><br /><br /><br />
      <br /><br /><br /><br /><br /><br /><br />
 
      <link rel="stylesheet" href="./Css/style.css">

<footer class="color2">
	<hr>
	<center>					   
	<img src="image/paiement.png"  height="20%" width="20%" >  <p class="color3"> &copy; Copyright 2019 | SL COMPETITION- SAINT-LOUIS |  Site e-Commerce | <a  href ="contacter.php"> Nous Contacter</a> </p> 
			<nav id="fmenu">
				<ul>
				
					<p class="color3">Téléphone : 02 62 41 84 57 | e-mail : SL-Competition@gmail.com</p>
				
					
				</ul>
			</nav>	
    </center>                   
    </footer>
	
</html>
</center>
</article>
</body>
</html>


