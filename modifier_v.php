<!DOCTYPE html>
<html><head> 
<meta charset= 'utf-8'>
  <link rel="stylesheet" href="principale.css">
  <link rel="stylesheet" href="bootstrap.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body class="p">
 
 
  <?php
  include("auth/EtreAuthentifie.php");
  require("db_config.php");
 include("homedec.php");


  try{
  $connexion=new PDO($dsn,$username,$password);
  $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $SQL = "SELECT * FROM produits where uid = ?";
   $st = $connexion->prepare($SQL);
   $ven = $idm->getUid();
   $res = $st->execute(array($ven));
      $row=$st->fetch();

   if($row){
 echo "<div class=\"container\">";
 echo "<table class=\"table\">";
               echo "  <div class=\"alert alert-warning\"> ";
               echo " <strong> <h2>Liste des produits:</h2></strong> Modification de produits";
               echo "</div> ";
  echo " <thead><tr class=\"active\">
  <td>pid: </td>
   <td>Nom: </td>
   <td>Description: </td>
   <td>qte: </td>
    <td>Prix: </td>
   <td>uid: </td>
   <td>ctid: </td>
   <td>Modifier:</td>
   </tr></thead>";

while($row) {
echo

"<tbody><tr class =\"danger\" ><td>$row[pid]</td><td>$row[nom]</td><td>$row[description]</td><td>$row[qte]</td><td>$row[prix]</td><td>$row[uid]</td><td>$row[ctid]</td><td><a href='modifier_v.php?pid=$row[pid]' class=\"btn btn-info btn-lg\"><span class=\"glyphicon glyphicon-wrench\"></span> modifier</a></td></tr></tbody>";
$row = $st->fetch();
 }
       
      echo "</table>";
      echo "</div>";
   }else if(!$row){echo "Vous n'avez pas de produits !";}
   //
//include("modifier_v.html");
          /*$SQL="SELECT pid from produits where pid=? ";
          $st = $connexion->prepare($SQL);
          $res = $st->execute(array($pid));*/

if(isset($_GET['pid'])){
  
   include("modifier_v_form.php");
$pid= $_GET["pid"];
 $ven = $idm->getUid();
           $SQL="SELECT pid from produits where pid=? ";
          $st = $connexion->prepare($SQL);
          $res = $st->execute(array($pid));
            $check = count($st->fetchAll());
            if($check ==0){
              echo "l'enregistrement n'existe pas dans la base de données ";
            }else if ($check==1){
              
               if(isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['qte']) && isset($_POST['prix'])){
                $nom = $_POST["nom"];
                $description = $_POST["description"];
                $qte=$_POST["qte"];
                $prix = $_POST["prix"];
               
                if(!empty($nom)){
                  $SQL="UPDATE produits SET nom = ? where pid = ? and uid=?";
                  $st = $connexion->prepare($SQL);
                  $res = $st->execute(array($nom,$pid,$ven));
                  if($st){echo "modifier !"; 

                  }else{
                  echo "erreur !!";
                  } // blem: ici modifier a chaque fois
                }
                if(!empty($description)){
                  $SQL="UPDATE produits SET description = ? where pid = ? and uid=?";
                  $st = $connexion->prepare($SQL);
                  $res = $st->execute(array($description,$pid,$ven));
                  if($st){echo "modifier !"; 

                  }else{
                  echo "erreur !!";
                  } // blem: ici modifier a chaque fois
                }
                if(is_numeric($qte) && $qte>0){
                  $SQL="UPDATE produits SET qte = ? where pid = ? and uid=?";
                  $st = $connexion->prepare($SQL);
                  $res = $st->execute(array($qte,$pid,$ven));
                  if($st){echo "modifier !"; 

                  }else{
                  echo "erreur !!";
                  } // blem: ici modifier a chaque fois
                }else{
                  echo " la qte est pas modifiée!!";
                  }
                 if(is_numeric($prix) && $prix >0){
                  $SQL="UPDATE produits SET prix = ? where pid = ? and uid=?";
                  $st = $connexion->prepare($SQL);
                  $res = $st->execute(array($prix,$pid,$ven));
                  if($st){echo "modifier !"; 

                  }else{
                  echo "erreur !!";
                  } 
                }else{
                  echo " le prix est pas modifié!!";
                  } 

                   $SQL2 = "SELECT * FROM produits WHERE pid=? and uid=? ";
                   $st2 = $connexion->prepare($SQL2);
                   $res2 = $st2->execute(array($pid,$ven));

 echo "<div class=\"container\">";
 echo "<table class=\"table\">";
 echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
echo "  <div class=\"alert alert-warning\"> ";

               echo " <strong> <h2>Le produit modifié:</h2></strong> ";
               echo "</div> ";
  echo "<thead> <tr class=\"active\">
  <td>pid: </td>
   <td>Nom: </td>
   <td>Description: </td>
   <td>qte: </td>
    <td>Prix: </td>
   <td>uid: </td>
   <td>ctid: </td>
   </tr></thead>";

while($row = $st2->fetch()) {
echo

"<tbody><tr class=\"danger\" ><td>$row[pid]</td><td>$row[nom]</td><td>$row[description]</td><td>$row[qte]</td><td>$row[prix]</td><td>$row[uid]</td><td>$row[ctid]</td></tr></tbody>";

 }
       
      echo "</table>";
      echo "</div>";
                     }
    }
          
    }


/*else{
  echo "Rentrer un pid";
}*/
        

}catch (PDOExeception $e){
    echo 'Echec de la connection : ' .$e->getMessage();
  }

   echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
    echo "  <div class=\"alert alert-info\"> ";
    echo " <strong></strong><li>Revenir à la page principale <a href=\"page_principale_vndr.php\">cliquez ici</span></a> </li>";
    echo "</div> ";
?>
 

  
 



</body>
</html>