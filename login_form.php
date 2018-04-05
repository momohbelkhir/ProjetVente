<!DOCTYPE html>
<html>
<head> 
<meta charset= 'utf-8'>


    <link rel="stylesheet" href="principale.css">
  <link rel="stylesheet" href="bootstrap.css"> 
  <link rel="stylesheet" href="bootstrap.nin.css">
<link rel="stylesheet" href="bootstrap-theme.min.css">
<link rel="stylesheet" href="bootstrap-theme.css"> 
</head>

<body >

<?php
$title="Authentification";
include("header.php");

echo "<p class=\"error\">".($error??"")."</p>";
?>

 <!-- <div class="alert alert-danger" >
  <strong></strong> 
   <div class='center'>
        <h2>Authentifiez-vous</h2>

                    <form method="post">
                       
                        <table class="center">
                            <tr>
                            <td><label for="inputNom" class="control-label">Login</label></td>
                            <td><input type="text" name="login" size="20" class="form-control" id="inputLogin" required placeholder="login"
                                   required value="<?= $data['login']??"" ?>"></td>
                            </tr>
                            <tr>
                            <td><label for="inputMDP" class="control-label">MDP</label></td>
                            <td><input type="password" name="password" size="20" class="form-control" required id="inputMDP"
                                   placeholder="Mot de passe"></td>
                            </tr>
                        </table>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Connexion</button>
                            <span class="pull-center"><a href="<?= $pathFor['adduser'] ?>">S'enregistrer</a></span>
                        </div>
                    </form>
    </div>
    </div>
//////////-->
<div class='center'>
       
    <form method="post">
     <div class="container bootstrap snippet">
      <div class="row login-page">
       <div class="col-md-4  col-lg-4 col-md-offset-4  col-lg-offset-4">
<div class="alert alert-info" >
      
        <img src="log1.png" alt="" class="user-avatar">  
        <h1>Connexion</h1>
        <form action="#" class="ng-pristine ng-valid" >
          <div class="form-content">
            <div class="form-group">
              <input type="text" name="login" class="form-control input-underline input-lg " style="color: black;" placeholder="login "  required value="<?= $data['login']??""?>">
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control input-underline input-lg" style="color: black;" placeholder="your password" required value="">
            </div>          
          </div>
          <button class="btn btn-info btn-lg" > Log in</button>
          <span class="pull-right btn btn-info btn-lg"><a href="<?= $pathFor['adduser'] ?>">S'enregistrer</a></span>
        </form>
        </div>
      </div>  
    </div>
  </div>

</form>
</div>
<?php

include("footer.php");
?>

</body>
</html>