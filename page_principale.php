<!DOCTYPE html>
<html>

<head> 
  <meta charset= 'utf-8'>
  <link rel="stylesheet" href="principale.css">
  <link rel="stylesheet" href="bootstrap.css"> 
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
<!--
<a href="<?= $pathFor['logout'] ?>" title="Logout" style="text-align: left;">Logout</a> </br>
<br><br>
<a href="ex1.php">Acheter (liste de tous les produit)</a> 
</br>
<a href="acheter_par_vendeur.php">Acheter (produit/ vendeur)</a>
</br>
<a href="acheter_par_categorie.php">Acheter (produit/ categorie)</a>
</br>
<a href="acheter_par_recherche.php">Acheter (en effectuant une recherche)</a>
</br>
</br>
<a href="liste_des_comandes.php">Liste des commandes</a> 
</br>
<a href="produits_ach.php">Acheter par combinaison</a> 
</br> -->

</br>
<ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="home.php">Home</a></li>
  <li role="presentation" class="active"><a href="page_principale.php">Mon espace</a></li>
  <li role="presentation"><a href="<?= $pathFor['logout'] ?>" title="Logout" style="text-align: left;">Déconnexion</a></li>
</ul>

<div class="btn-group">
  <button type="button" class="btn btn-danger" ></span> Achat de produits</button>
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="ex1.php">Tous les produits</a></li>
    <li><a href="acheter_par_vendeur.php">Produit par vendeur</a></li>
    <li><a href="acheter_par_categorie.php">Produit par catégorie</a></li>
    <li><a href="acheter_par_recherche.php">Produit par recherche</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="produits_ach.php"> Produit par combinaison</a> </li>
  </ul>
  </div>
<div class="btn-group">
   <button type="button" class="btn btn-danger">Mes commandes</button>
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="liste_des_comandes.php">Mes achats</a></li>
   
  </ul>
</div>

<?php
//include("footer.php")

?>
</body>
</html>