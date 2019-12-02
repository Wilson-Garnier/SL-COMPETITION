<?php require 'header.php';
?>
 <article>
      <br><h1> Espace administration </h1>
    </article>
    <article>
      <!-- ------------------------------------------- Formulaire Login  ---------------------------------------- -->
      <form action='action.php?action=Login' method='POST'>
        <table>
          <tr> 
            <td> <label for="username">Pseudo</label></td>
            <td> <input name="user_name" id="user_name" type="text" required></td>
          </tr>
          <tr>
            <td> <label for="password">Mot de passe</label></td> 
            <td> <input name="password" id="password" type="password" required ></td> 
          </tr>
          <tr>
            <td colspan='2'> <input type='submit' name='action' value='Login'></td>
            
          </tr>
          