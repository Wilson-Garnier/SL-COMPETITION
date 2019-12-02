
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
   <article>
      <table class="table_annuaire">
      <!-- ------------------------------------------- Formulaire action  ---------------------------------------- -->
      <table class="table_annuaire">
         <h2>Profil de <?php echo $user['login']; ?></h2>
        <?php

        require "/Model/model.php";
        require "/Controleur/control.php";

        $employe = new Pieces();
        echo "<thead>";
          echo "<tr>";
            echo "<th>#</th>";
            echo "<th>Nom</th>";
            echo "<th>Prénom</th>";
            echo "<th>Age</th>";
            echo "<th>E-mail</th>";
            echo "<th>Code Postal</th>";
            echo "<th>Pays</th>";
            echo "<th colspan='1'>Actions</th>";
          echo "</tr>";
        echo "</thead>";
        
        
          
            echo 
            "<tr>" 
                ."<td>"."<input readonly type='text' name='id' id='id' value='".$user['Id'] . "'></td>" 
                ."<td>"."<input type='text' name='nom' id='nom' value='".$user['Nom'] . "'></td>" 
                ."<td>"."<input type='text' name='prenom' id='prenom' value='".$user['Prenom'] . "'></td>"  
                ."<td>"."<input type='text' name='age' id='age' value='".$user['age'] . "'></td>" 
                ."<td>"."<input type='text' name='email' id='email' value='".$user['email'] . "'></td>" 
                ."<td>"."<input type='text' name='cp' id='cp' value='".$user['codepostal'] . "'></td>"
                ."<td>"."<input type='text' name='pays' id='pays' value='".$user['Pays'] . "'></td>"  
                ."<td>". "<input type='submit' name='action' value='Modifier'></td>".
            "</tr>";
            echo "</form>";
      


?>
</center>
</article>
       
      </table>
      </article>
      <br /><br /><br /><br /><br /><br /><br />
      <br /><br /><br /><br /><br /><br /><br />
      <br /><br /><br /><br /><br /><br /><br />

<?php include'footer.php' ?>

</body>
</html>