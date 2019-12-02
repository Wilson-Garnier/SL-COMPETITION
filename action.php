<?php 
  // Cela signifie que vous ne souhaitez pas voir le résultat de votre script mis une fois pour toutes en cache, 
  header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  header("Cache-Control: no-cache");
  header("Pragma: no-cache");
  

    if (isset($_REQUEST['action'])) {
      require "./Model/model.php";
      require "./Controleur/control.php";
      require "./Controleur/membre.php";
      $pieces = new Pieces();
      $client = new membre();

     

      if ($_GET['action'] == 'add') {
        $pieces->setAdd($_POST);
      
       header('Location:../Vue/view.php');
       
       session_start();
      }
      if ($_REQUEST['action'] == 'Rechercher') {
        var_dump($_POST);
        
        $tblpieces = $pieces->getRecherche($_POST);
        include "../Vue/view.php";
        
      }
      if ($_REQUEST['action'] == 'Modifier') {
        $_POST['ide']=intval($_POST['id']);
        $employe->setUpdate($_POST);
      } 
      
      if ($_GET['action'] == 'Admin') {
          
        session_start();

      if (!empty($_SESSION['userId'])) {

        $client = new membre();
        $tblcli = $client->getSelec2t();
        
        include "/Vue/viewclient.php"; 

        }else {

          include "Admin.php";         

        }
      

      //if ($_GET['action'] == 'Util') {
      //  include "./vue/vueLogin.php";
      }
    //}
      if ($_GET['action'] == 'Login') {
        session_start();

        
        $username = filter_var($_POST["user_name"], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
       
        //require_once "membre.php";
        //require_once  "control.php";
        
        //$pieces = new Pieces();
        $tblEmp = $pieces->getclient();
        
        $isLoggedIn = $client->verifLogin($username, $password);


        if (! $isLoggedIn) {
          include "Admin.php";
          echo "<span style=\"color:red;\"> Les Informations d'identifications ne sont pas Valide !! </span>";
    

            exit();
        }
        include "/Vue/viewclient.php";
        exit();
     
      }
      if ($_REQUEST['action'] == 'supprimer') {

        
        $pieces->getdelete($_GET['id']);
        include "Admin.php";
        echo "<span style=\"color:red;\"> Une reconexion est nécessaire afin de prendre en compte les changements ! </span>";
      } 
     // if ($_GET['action'] == 'Accueil') {
       // $tblEmp = $employe->getSelect();
      //  include "view.php";
    //} 
      
    //}
   
     }
   

  //}
      

?>
