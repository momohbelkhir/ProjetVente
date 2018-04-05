<!DOCTYPE html>
<html><head> 
<meta charset= 'utf-8'>
  <link rel="stylesheet" href="principale.css">
  <link rel="stylesheet" href="bootstrap.css"> 
   <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body class="p" >
 
 
  <?php
  include("auth/EtreAuthentifie.php");
  require("db_config.php");
  include("homedec.php");
  include("liste_par_categorie_v_form.php");


  try{
  $connexion=new PDO($dsn,$username,$password);
  $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      if ( isset ($_POST["ctid"]) ){
        $ctid = $_POST["ctid"];
       $ven = $idm->getUid();
        //récuperé le ctid :
                    $SQL = "SELECT ctid FROM categories where nom=? ";
                    $st = $connexion->prepare($SQL);
                    $res = $st->execute(array($ctid));
                     $row=$st->fetch();
      

///////fin
                     $SQL = "SELECT * FROM produits WHERE ctid=? and uid=?";
                     $st = $connexion->prepare($SQL);
                     $res = $st->execute(array($row['ctid'],$ven));
                     $row=$st->fetch();

  
    if(!$row){
      
                   echo "<script type=\"text/javascript\">";
                   echo "alert ('Vous avez pas de produits dans cette categorie !')";
                   echo "</script>";
                   echo "  <div class=\"alert alert-warning\"> ";
               echo " <strong> Vous n'avez pas de produits dans cette categorie !</strong> ";
               echo "</div> ";
    }else{
      

  echo "<div class=\"container\">";
  echo "<table class=\"table\">";
   echo "  <div class=\"alert alert-warning\"> ";
               echo " <strong> <h2>Liste des produits:</h2></strong> ";
               echo "</div> ";
  echo "<thead> <tr class=\"active\">
  <td>pid: </td>
   <td>Nom: </td>
   <td>Description: </td>
   <td>qte: </td>
   <td>prix: </td>
   <td>uid: </td>
   <td>ctid: </td>
   </tr></thead>";


while($row) {
echo

"<tbody><tr class=\"info\"><td>$row[pid]</td><td>$row[nom]</td><td>$row[description]</td><td>$row[qte]</td><td>$row[prix]</td><td>$row[uid]</td><td>$row[ctid]</td></tr></tbody>";
$row = $st->fetch();
 }

      echo "</table>";
      echo "</div>";
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