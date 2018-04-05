<!DOCTYPE html>
<html lang="en">
<head> 

  <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="principale.css">
     <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body class="p">
<script src="jquery.min.js" ></script>
<script src ="js/bot.min.js"></script>


  

  <?php
  include("auth/EtreAuthentifie.php");
  require("db_config.php");
  include("homedec.php");
  include("liste_par_recherche_v_form.php");


  try{
  $connexion=new PDO($dsn,$username,$password);
  $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
             if (isset($_POST["nom"])){
    $nom = $_POST["nom"];
    $ven = $idm->getUid();
          $SQL = "SELECT * FROM produits WHERE nom like ? AND uid=?";
          $st = $connexion->prepare($SQL);
          $res = $st->execute(array("%$nom%",$ven));
           $row=$st->fetch();

   if($row){
    echo "<div class=\"container\">";
 echo "<table class=\"table\">";
  echo "  <div class=\"alert alert-warning\"> ";
               echo " <strong> <h2>Liste des produits:</h2></strong> ";
               echo "</div> ";

  echo " <thead><tr class=\"active\">
  <td>pid: </td>
   <td>Nom: </td>
   <td>Description: </td>
   <td>qte: </td>
    <td>Prix: </td>
   <td>uid: </td>
   <td>ctid: </td>
   </tr></thead>";

while($row) {
echo

"<tbody><tr class=\"danger\"><td>$row[pid]</td><td>$row[nom]</td><td>$row[description]</td><td>$row[qte]</td><td>$row[prix]</td><td>$row[uid]</td><td>$row[ctid]</td></tr></tbody>";
$row = $st->fetch();
 }
       
      echo "</table>";
      echo "</div>";
   }else if(!$row){
   
              echo "  <div class=\"alert alert-warning\"> ";
               echo " <strong> Aucun résultat pour votre recherche ! !</strong>";
               echo "</div> ";
  }
}

   
}

  catch (PDOExeception $e){
    echo 'Echec de la connection : ' .$e->getMessage();
  }

     echo "<br><br>";
    echo "  <div class=\"alert alert-info\"> ";
    echo " <strong></strong><li>Revenir à la page principale <a href=\"page_principale_vndr.php\"> cliquez ici</a> </li>";
    echo "</div> ";
?>
</body>
</html>