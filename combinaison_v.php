<!DOCTYPE html>
<html><head> 
<meta charset= 'utf-8'>
 <link rel="stylesheet" href="principale.css">
  <link rel="stylesheet" href="bootstrap.css"> 
  <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body class="p">

  <?php
  include("auth/EtreAuthentifie.php");
  require("db_config.php");
  include("homedec.php");
   include("produits_ach_form.php");


  try{
  $connexion=new PDO($dsn,$username,$password);
  $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $SQL = "SELECT uid,nom,prenom,role FROM users where role=? ";

          $st = $connexion->prepare($SQL);
          $res = $st->execute(array("vendeur"));
echo "<div class=\"container\">";
 echo "<table class=\"table\">";
  echo "  <div class=\"alert alert-warning\"> ";
               echo " <strong> <h2>Liste des vendeurs:</h2></strong> ";
               echo "</div> ";
  echo "<thead> <tr class=\"active\">
  <td>uid: </td>
   <td>Nom: </td>
   <td>Prénom: </td>
   <td>Role: </td>
   </tr></thead>";

     
while($row = $st->fetch()) {
echo

"<tbody><tr class=\"warning\"><td>$row[uid]</td><td>$row[nom]</td><td>$row[prenom]</td><td>$row[role]</td></tr></tbody>";
 }

      echo "</table>";
      echo "</div>";
if ( isset ($_POST["vendeur"]) && isset ($_POST["recherche"])  && isset($_POST["ctid"]) ){

$uid = $_POST["vendeur"];
$recherche = $_POST["recherche"];
$ctid = $_POST["ctid"];
$ven = $idm->getUid();
               if( $ctid=="Toutes_categories" && empty($recherche) && !is_numeric($uid) ){


          $SQL = "SELECT * FROM produits";
          $st = $connexion->prepare($SQL);
          $res = $st->execute(array());
          $row=$st->fetch();
    if(!$row){
      echo "Aucun produit disponoble pour la catégorie choisis !";
    }else{
  include("combinaison_v_fac.php");
   }
          ///          
 }else if( $ctid!="Toutes_categories" && empty($recherche) && is_numeric($uid) ){
                    
                    $SQL = "SELECT ctid FROM categories where nom=? ";
                    $st = $connexion->prepare($SQL);
                    $res = $st->execute(array($ctid));
                   $row=$st->fetch();

                    $SQL = "SELECT * FROM produits WHERE ctid=? AND uid=?";
          $st = $connexion->prepare($SQL);
          $res = $st->execute(array($row['ctid'],$uid));
          $row=$st->fetch();
    if(!$row){
      echo "Aucun produit disponoble pour la catégorie choisis !";
    }else{
include("combinaison_v_fac.php");
   }
           
 }
 ///////
 else if( $ctid=="Toutes_categories" && empty($recherche) && is_numeric($uid) ){
                    

                    $SQL = "SELECT * FROM produits WHERE  uid=?";
          $st = $connexion->prepare($SQL);
          $res = $st->execute(array($uid));
          $row=$st->fetch();
    if(!$row){
      echo "Aucun produit disponoble pour la catégorie choisis !";
    }else{
include("combinaison_v_fac.php");
   }
           
 }
 //////
  else if( $ctid!="Toutes_categories" && empty($recherche) && !is_numeric($uid) ){
                     
                     $SQL = "SELECT ctid FROM categories where nom=? ";
                    $st = $connexion->prepare($SQL);
                    $res = $st->execute(array($ctid));
                   $row=$st->fetch();

                $SQL = "SELECT * FROM produits WHERE ctid=?";
          $st = $connexion->prepare($SQL);
          $res = $st->execute(array($row['ctid']));
          $row=$st->fetch();
    if(!$row){
      echo "Aucun produit disponoble pour la catégorie choisis !";
    }else{
include("combinaison_v_fac.php");
   }
           
 }
 ///////
 else if( $ctid=="Toutes_categories" && !empty($recherche) && is_numeric($uid) ){
                    

                    $SQL = "SELECT * FROM produits WHERE  uid=? AND nom like ?";
          $st = $connexion->prepare($SQL);
          $res = $st->execute(array($uid,"%$recherche%"));
          $row=$st->fetch();
    if(!$row){
      echo "Aucun produit disponoble pour la catégorie choisis !";
    }else{
include("combinaison_v_fac.php");
   }
           
 }
 ////
  else if( $ctid!="Toutes_categories" && !empty($recherche) && is_numeric($uid) ){
                    $SQL = "SELECT ctid FROM categories where nom=? ";
                    $st = $connexion->prepare($SQL);
                    $res = $st->execute(array($ctid));
                   $row=$st->fetch();

                    $SQL = "SELECT * FROM produits WHERE  uid=? AND ctid=? AND nom like ?";
          $st = $connexion->prepare($SQL);
          $res = $st->execute(array($uid,$row['ctid'],"%$recherche%"));
          $row=$st->fetch();
    if(!$row){
      echo "Aucun produit disponoble pour la catégorie choisis !";
    }else{
include("combinaison_v_fac.php");
   }
           
 }
 /////
 else if( $ctid!="Toutes_categories" && !empty($recherche) && !is_numeric($uid) ){
                    $SQL = "SELECT ctid FROM categories where nom=? ";
                    $st = $connexion->prepare($SQL);
                    $res = $st->execute(array($ctid));
                   $row=$st->fetch();

                    $SQL = "SELECT * FROM produits WHERE   ctid=? AND nom like ?";
          $st = $connexion->prepare($SQL);
          $res = $st->execute(array($row['ctid'],"%$recherche%"));
          $row=$st->fetch();
    if(!$row){
      echo "Aucun produit disponoble pour la catégorie choisis !";
    }else{
include("combinaison_v_fac.php");
   }
           
 }
 ////
 else if( $ctid=="Toutes_categories" && !empty($recherche) && !is_numeric($uid) ){
                 

                    $SQL = "SELECT * FROM produits WHERE  nom like ?";
          $st = $connexion->prepare($SQL);
          $res = $st->execute(array("%$recherche%"));
          $row=$st->fetch();
    if(!$row){
      echo "Aucun produit disponoble pour la catégorie choisis !";
    }else{
include("combinaison_v_fac.php");
   }
           
 }
}
   
        

}catch (PDOExeception $e){
    echo 'Echec de la connection : ' .$e->getMessage();
  }
 
   echo "<br><br>";
    echo "  <div class=\"alert alert-info\"> ";
    echo " <strong></strong><li>Revenir à la page principale <a href=\"page_principale_vndr.php\"> cliquez ici</a> </li>";
    echo "</div> ";
?>
 

  
 



</body>
</html>