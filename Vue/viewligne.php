<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../css/style.css">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

<body>
<img src="../image/logo.png" height="13%" width="13%">

<div style="text-align:right">
<div>
  <a href="../inscription.php" style="font-size:13pt" class="button">S'inscrire </a>
  <a href="../connexion.php" style="font-size:13pt" class="button"> Me connecter </a>
  <a href="../Admin.php" style="font-size:13pt" class="button"> Admin </a>

 &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
  <a href="panier.php">Panier<img src="../image/panier.png" width=50 height=50></a>
</div>
</div>
  <article>
      <!-- ------------------------------------------- Formulaire Recherche  ---------------------------------------- -->
      <form action='../action.php?action=Rechercher' method='POST'>
        <table>
          <tr> 
           
            <td> <input type='text' name='Nom_piece' id='Nom_piece' ></td>
            <td colspan='2'> <input type='submit' name='action' value='Rechercher'></td>
          </tr>
        </table>
      </form>
    </article>
    
  
  <ul class="topnav">   
<li><a  href="../index.php">Accueil</a></li>
<li><a href="view.php"> Tout les produits Disponibles</a></li>
<li><a href="viewturbo.php?action=lire"> Turbo</a></li>
<li><a href="viewcombine.php?action=lire"> Combiné Filetés</a></li>
<li><a href="viewligne.php?action=lire"> Ligne Echappement</a></li>
<li ><a href="viewechangeur.php?action=lire"> Echangeur à air </a></li> 
</ul> 
 <h1> Pièces Disponible 	 </h1>
  <table border="2">
  <tr>
  <th>#</th>
  <th>Nom de la Pièces</th>
  <th>Despcription</th>
  <th>Image</th>
  <th>Prix</th>
  <th>Stock</th>
  </tr>
<?php
  // $resultat ici énoncé de la requête
  // $cnx connexion à la base de données
  require "../Model/model.php";
  require "../Controleur/control.php";
  $page= (!empty($_GET['page']) ? $_GET['page'] : 0);
  $page =($page <= 0 ? 1 :$page);
  $pieces= new pieces();
  foreach ($pieces->getligne() as $ligne) 
  {
    echo "<tr>";
      echo "<td>" . $ligne['Id_piece'] . "</td>";
      echo "<td>"  . $ligne['Nom_piece'] . "</td>";
      echo "<td>" . $ligne['Description_piece'] . "</td>";
      echo "<td>" . $ligne['Image_pieces'] . "</td>";
      echo "<td>" . $ligne['Prix_piece'] 	. "€"."</td>";
      echo "<td>" . $ligne['Quantite_piece'] 	."</td>";
      echo "<td>"."<a href='Panier.php'><img src='../image/panier2.png'width=50 height=50></a>"."</td>";
      echo "<td>";
  
  }

 
 ?>  

        
  </form>
</body>
</table>
<a href="?action=Page&page=<?php echo $page -1 ?>">Page précédente</a>
      ___

<a href="?action=Page&page=<?php echo $page +1 ?>">Page suivante</a>

<?php require '../footer.php';
?>
</html>


