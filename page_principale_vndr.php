<!DOCTYPE html>
<html>

<head> 
  <meta charset= 'utf-8'>
  <link rel="stylesheet" href="principale.css">
  <link rel="stylesheet" href="bootstrap.css">

<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="bootstrap-theme.min.css">
<link rel="stylesheet" href="bootstrap-theme.css"> 




  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body class="p">
<script src="jquery.min.js" ></script>
<script src ="bot.min.js"></script>
<?php

require("auth/EtreAuthentifie.php");
$page_title="Gestion produits: page principale";
include("header.php");
$title = 'Accueil';

?>


</br>
<br><br> 




</br>
<ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="home.php">Home</a></li>
  <li role="presentation" class="active"><a href="page_principale_vndr.php">Mon espace</a></li>

  <li role="presentation"><a href="<?= $pathFor['logout'] ?>" title="Logout" style="text-align: left;">Déconnexion</a></li>
</ul>
</br>
<br><br> 

<div class="btn-group">
  <button type="button" class="btn btn-danger">Liste de Produits</button>
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="liste_par_recherche_v.php">Mes produits par recherche</a></li>
    <li><a href="liste_par_categorie_v.php">Mes produits par categorie</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="combinaison_v.php">Tous les produits</a></li>
  </ul>
  </div>
<div class="btn-group">
   <button type="button" class="btn btn-danger">Ajout et supression</button>
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="supprimer_v.php">Suprimer un produit</a></li>
    <li><a href="ajouter_v.php">Ajouter un produit</a></li>

  </ul>
</div>
<div class="btn-group">
   <button type="button" class="btn btn-danger">Modification</button>
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="modifier_v.php">Modifier un produit</a></li>

   
  </ul>
</div>
<div class="btn-group">
   <button type="button" class="btn btn-danger">Commandes</button>
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="commandes_v.php">Liste des commandes</a></li>
    
    
  </ul>
</div>

<?php
//include("footer.php")

?>
</body>
</html>