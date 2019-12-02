<?php
class Pieces extends DB {
 
  function getSelect(){

    $page= (!empty($_GET['page']) ? $_GET['page'] :0);
    $page=($page <= 0 ? 1 :$page);
    $limite =3;
    $debut=($page -1)*$limite;
    return $this->getRequete("SELECT * FROM `pieces` LIMIT $limite OFFSET $debut");
  }

  function getclient(){

   
    return $this->getRequete("SELECT * FROM `client`");
  }
 
 
  function setAdd($tblcli){
    
    
  
   $Nom= $tblcli['Nom'];
   $Prenom=$tblcli['Prenom'];
   $login=$tblcli['login'];
 $mdp=sha1($tblcli['motdepasse']);
 $code=$tblcli['codepostal'];
 $pays=$tblcli['pays'];
     $strSQL ='INSERT INTO client (Nom, Prenom,login,motdepasse,codepostal,pays) 
     VALUES ("'.$Nom.'","'.$Prenom.'","'.$login.'","'.$mdp.'","'.$code.'","'.$pays.'");';
       $add = $this->getRequete($strSQL);
       return $add;
       
   }




   function getLire(){
    $page= (!empty($_GET['page']) ? $_GET['page'] :0);
    $page=($page <= 0 ? 1 :$page);
    $limite =2;
    $debut=($page -1)*$limite;
    return $this->getRequete("SELECT * FROM `pieces` WHERE categorie='turbo' LIMIT $limite OFFSET $debut");
  }



  function getcombine(){
    $page= (!empty($_GET['page']) ? $_GET['page'] :0);
    $page=($page <= 0 ? 1 :$page);
    $limite =3;
    $debut=($page -1)*$limite;
    return $this->getRequete("SELECT * FROM `pieces` WHERE categorie='combiné' LIMIT $limite OFFSET $debut");
  }
  function getligne(){
    $page= (!empty($_GET['page']) ? $_GET['page'] :0);
    $page=($page <= 0 ? 1 :$page);
    $limite =3;
    $debut=($page -1)*$limite;
    return $this->getRequete("SELECT * FROM `pieces` WHERE categorie='ligne'LIMIT $limite OFFSET $debut");
  }
  
  
  
  
  function getechangeur(){
    $page= (!empty($_GET['page']) ? $_GET['page'] :0);
    $page=($page <= 0 ? 1 :$page);
    $limite =3;
    $debut=($page -1)*$limite;
    return $this->getRequete("SELECT * FROM `pieces` WHERE categorie='echangeur'LIMIT $limite OFFSET $debut");
  }



  
  function getRecherche($tblpieces){
   
    
    $strSQL = "SELECT * FROM pieces 
                WHERE Nom_piece LIKE  :Nom_piece
              
              ";

    empty($tblpieces['Nom_piece'])  ? $tblpieces['Nom_piece'] = '*' : $tblpieces['Nom_piece']; 

    $tabValeur = array(
          'Nom_piece'  => "%".$tblpieces['Nom_piece']."%", 
        );

    $sch = $this->Requete($strSQL, $tabValeur);
    
    return $sch;
    
    }
    function getdelete($Id){

      $strSQL = "DELETE FROM client WHERE id = ?";
      $tabValeur = array($Id);
      $del = $this->Requete($strSQL, $tabValeur);
      return $del;
    }
    
    
    }
    



?>