<?php
$title="Ajout de l'utilisateur";
include("header.php");
?>
<p class="error"><?= $error??""?></p>

<div class="center">

    <form method="post">
         <!--legend>Inscription</legend-->
            <div class="container bootstrap snippet">
      <div class="row login-page">
       <div class="col-md-4  col-lg-4 col-md-offset-4  col-lg-offset-4">
<div class="alert alert-info" >
      <strong><h2>Inscription:</h2></strong>
        <table>
                 
                    <tr>
                        <td><label for="inputNom" class="control-label">Nom</label></td>
                         <td><input type="text" name="nom" class="form-control" id="inputNom" placeholder="Nom" required value="<?= $data['nom']??""?>">
                         </td>
                    </tr>

                    <tr>
                       <td> <label for="inputPrenom" class="control-label">Prénom</label></td>
                          <td>  <input type="text" name="prenom" class="form-control" id="inputPrenom" placeholder="Prénom" required aria-required="true" value="<?= $data['prenom']??""?>"></td>
                    </tr>

                    <tr>
                        <td><label for="inputLogin" class="control-label">Login</label></td>
                            <td><input type="text" name="login" class="form-control" id="inputLogin" placeholder="login" required value="<?= $data['login']??""?>"></td>
                    </tr>

                     <tr>
                        <td><label for="inputRole" class="control-label">Role</label></td>
                          <!--  <td><input type="text" name="role" class="form-control" id="inputRole" placeholder="user/admin" required value="<?= $data['role']??""?>">
                            
                            </td>-->
                            <td> <select name="role" class="form-control"> 
                            <option class="form-control" id="inputRole" value="vendeur">Vendeur   </option>
                             <option class="form-control" id="inputRole" value="acheteur">Acheteur   </option>
                            </select></td>

                    </tr>

                    <tr>
                        <td><label for="inputMDP" class="control-label">MDP</label></td>
                            <td><input type="password" name="mdp" class="form-control" id="inputMDP" placeholder="Mot de passe" required value=""></td>
                    </tr>

                    <tr>
                        <td><label for="inputMDP2" class="control-label">Répéter MDP</label></td>
                            <td><input type="password" name="mdp2" class="form-control" id="inputMDP" placeholder="Répéter le mot de passe" required value=""></td>
                   </tr>

        </table>
        
                    <div class="form-group">
                            <button type="submit" class="btn btn-primary">S'enregistrer</button>
                    </div>
                    
     </div>
     </div>
     </div>
     </div>
    </form>
    </div>
<?php

include("footer.php");
