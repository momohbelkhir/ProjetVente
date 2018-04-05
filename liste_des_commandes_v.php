<!DOCTYPE html>
<html><head> 
<meta charset= 'utf-8'>
  <link rel="stylesheet" href="principale.css">
</head>

<body >
  
 
  <?php
  include("auth/EtreAuthentifie.php");
  require("db_config.php");



  try{
  $connexion=new PDO($dsn,$username,$password);
  $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $ach = $idm->getUid();
$SQL = "SELECT * FROM commande where uid = ? ";
$st = $connexion->prepare($SQL);
          $res = $st->execute(array($ach));
           $row=$st->fetch();

 echo "<table>";
  echo "<h2>Liste des commandes:</h2>";
  echo " <tr>
  <td>cmdid: </td>
   <td>pid: </td>
   <td>uid: </td>
   <td>nom: </td>
   <td>qte: </td>
   <td>date: </td>
   <td>status: </td>
   <td>montant ($): </td>
   </tr>";
  
  if(!$row){
 echo "rien";
  }else{
while($row = $st->fetch()) {
          $SQL2 = "SELECT nom,prix FROM produits WHERE pid=?";
          $st2 = $connexion->prepare($SQL2);
          $res2 = $st2->execute(array($row["pid"]));
           $row2=$st2->fetch();
echo

"<tr ><td>$row[cmdid]</td><td>$row[pid]</td><td>$row[uid]</td><td>$row2[nom]</td><td>$row[qte]</td><td>$row[date]</td><td>$row[statut]</td><td>$row2[prix]</td></tr>";
 }

   }   echo "</table>";

 
}


  catch (PDOExeception $e){
  	echo 'Echec de la connection : ' .$e->getMessage();
  }
  echo "<li>Revenir à la page principale <a href=\"page_principale.php\"> cliquez ici</a> </li>";
?>