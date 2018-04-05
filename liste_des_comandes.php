<!DOCTYPE html>
<html><head> 
<meta charset= 'utf-8'>
  <link rel="stylesheet" href="principale.css">
  <link rel="stylesheet" href="bootstrap.css"> 
</head>

<body class="p">
  
 
  <?php
  include("auth/EtreAuthentifie.php");
  require("db_config.php");
  include("home_ach.php");


  try{
  $connexion=new PDO($dsn,$username,$password);
  $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $ach = $idm->getUid();
$SQL = "SELECT * FROM commande where uid = ? ";
$st = $connexion->prepare($SQL);
          $res = $st->execute(array($ach));
           $row=$st->fetch();

  
  
  if(!$row){
 echo "  <div class=\"alert alert-warning\"> ";
               echo " <strong></strong> Vous avez effectué aucune commande !";
               echo "</div> ";
  }else{
     echo "<div class=\"container\">";
   echo "<table class=\"table\">";
echo "  <div class=\"alert alert-warning\"> ";
               echo " <strong> <h2>Liste des commandes:</h2></strong> ";
               echo "</div> ";
  echo "<thead> <tr class=\"active\">
  <td>cmdid: </td>
   <td>pid: </td>
   <td>uid: </td>
   <td>nom: </td>
   <td>qte: </td>
   <td>date: </td>
   <td>status: </td>
   <td>montant (unité €): </td>
    <td>montant (total €): </td>
   </tr></thead>";
while($row) {
          $SQL2 = "SELECT nom,prix FROM produits WHERE pid=?";
          $st2 = $connexion->prepare($SQL2);
          $res2 = $st2->execute(array($row["pid"]));
           $row2=$st2->fetch();
           $total=$row2['prix']*$row['qte'];
echo

"<tbody><tr class=\"danger\"><td>$row[cmdid]</td><td>$row[pid]</td><td>$row[uid]</td><td>$row2[nom]</td><td>$row[qte]</td><td>$row[date]</td><td>$row[statut]</td><td>$row2[prix]</td><td>$total</td></tr></tbody>";
$row = $st->fetch();
 }

   }   echo "</table>";
       echo "</div>";
 
}


  catch (PDOExeception $e){
  	echo 'Echec de la connection : ' .$e->getMessage();
  }

  echo "<br><br>";
    echo "  <div class=\"alert alert-info\"> ";
    echo " <strong></strong><li>Revenir à la page principale <a href=\"page_principale.php\"> cliquez ici</a> </li>";
    echo "</div> ";
?>