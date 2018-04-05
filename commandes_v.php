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
include("homedec.php");


  try{
  $connexion=new PDO($dsn,$username,$password);
  $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $ven = $idm->getUid();

    $SQL = "SELECT commande.cmdid,commande.pid,commande.qte,commande.date,commande.statut FROM (commande inner join produits on commande.pid = produits.pid)  where produits.uid= ?  AND commande.statut != ? order by cmdid asc";
    $st = $connexion->prepare($SQL);
    $res = $st->execute(array($ven,"en_cours"));
    $row=$st->fetch();
           

  
  if(!$row){
 echo "";
  }else{
         echo "<div class=\"container\">";
 echo "<table class=\"table\">";
  
  echo "  <div class=\"alert alert-warning\"> ";
               echo " <strong></strong> Liste des commandes déjà accéptées ou refusées:";
               echo "</div> ";
  echo "<thead> <tr class=\"active\">
  <td>cmdid: </td>
   <td>pid: </td>

   <td>nom: </td>
   <td>qte: </td>
   <td>date: </td>
   <td>statut: </td>
   <td>montant (unité €): </td>
   <td>montant (total €): </td>
   
   </tr></thead>";  
while($row) {
          $SQL2 = "SELECT nom,prix FROM produits WHERE pid=? ";
          $st2 = $connexion->prepare($SQL2);
          $res2 = $st2->execute(array($row["pid"]));
           $row2=$st2->fetch();
        $total=$row2['prix']*$row['qte'];
echo

"<tbody><tr class=\"info\" >
      <td>$row[cmdid]</td>
      <td>$row[pid]</td>
      
      <td>$row2[nom]</td>
      <td>$row[qte]</td>
      <td>$row[date]</td>
      <td>$row[statut]</td>
      <td>$row2[prix]</td>
      <td>$total</td> 
       </tr></tbody>";

  
$row = $st->fetch();
 } 
   
    echo "</table>";
    echo "</div>";
}
    ////////////////
$SQL = "SELECT commande.cmdid,commande.pid,commande.qte,commande.date,commande.statut,produits.qte as dispo FROM (commande inner join produits on commande.pid = produits.pid)  where produits.uid= ?  AND commande.statut= ? order by cmdid asc";
$st = $connexion->prepare($SQL);
          $res = $st->execute(array($ven,"en_cours"));
           $row=$st->fetch();
           

  
  if(!$row){
   echo "  <div class=\"alert alert-warning\"> ";
               echo " <strong></strong> Vous avez reçu aucune commande !";
               echo "</div> ";
  }else{
     echo "<div class=\"container\">";
 echo "<table class=\"table\">";

  echo "  <div class=\"alert alert-warning\"> ";
               echo " <strong></strong> Liste des commandes en cours:";
               echo "</div> ";
  echo "<thead> <tr class=\"active\">
  <td>cmdid: </td>
   <td>pid: </td>
  
   <td>nom: </td>
   <td>qte damndée: </td>
   <td>qte dispo: </td>
   <td>date: </td>
   <td>montant (unité $): </td>
   <td>montant (total $): </td>
   
   </tr></thead>";
          echo  "<form action=\" \" method=\"post\" style=\"text-align: left;\">";

while($row) {
          $SQL2 = "SELECT nom,prix FROM produits WHERE pid=? ";
          $st2 = $connexion->prepare($SQL2);
          $res2 = $st2->execute(array($row["pid"]));
           $row2=$st2->fetch();
           $total=$row2['prix']*$row['qte'];
echo

"<tbody><tr class=\"info\" ><td><input type=\"checkbox\" name=\"cbox[]\" value=\"$row[cmdid]\">$row[cmdid]</td>
      <td>$row[pid]</td>
   
      <td>$row2[nom]</td>
      <td>$row[qte]</td>
      <td>$row[dispo]</td>
      <td>$row[date]</td>
      <td>$row2[prix]</td> 
      <td>$total</td> 
      </tr></tbody>";

  
$row = $st->fetch();
 } 
   
    echo "</table>";
    echo "</div>";
     echo "<table class=\"center\">
       <tr>
       <td><label for=\"inputCm\" class=\"control-label\"></label></td>
       <td><select name=\"cm\"  class=\"form-control\">
       <option value=\"en_cours\"> en_cours </option>
       <option value=\"acceptee\">acceptee  </option>
        <option value=\"refusee\">refusee  </option>
          </select>
       </td>
       </tr>
      </table>";
      echo "<input type=\"submit\" value=\"Envoyer\" class=\"btn btn-primary\">";
      echo "</form>";

   if (isset($_POST["cm"]) && isset($_POST["cbox"])) {
             
    
        foreach($_POST['cbox'] as $v ){
          $sts=$_POST['cm'];
             $SQL = "SELECT nom,qte,pid FROM produits WHERE  pid =( SELECT pid FROM commande where cmdid=?) ";
             $st = $connexion->prepare($SQL);
             $res = $st->execute(array($v));
             $row=$st->fetch();


            if($row['qte']>0 && $sts=="acceptee"){
          //voir si la commandes n'est pas déja accepter !! un petit souci
            $sql = "SELECT * FROM commande WHERE  cmdid = ? ";
             $sta = $connexion->prepare($sql);
             $resa = $sta->execute(array($v));
             $rowa=$sta->fetch();
             //
             if($rowa['statut'] == "en_cours" && $rowa['qte'] <= $row['qte']){
          $SQL="UPDATE commande SET statut = ? where cmdid = ? ";
          $st = $connexion->prepare($SQL);
          $res = $st->execute(array($sts,$v));
              echo "<script type=\"text/javascript\">";
              echo "alert ('Le Produit $row[nom] est $sts !')";
              echo "</script>";
           echo "<br>";
           
           echo "  <div class=\"alert alert-success\"> ";
               echo " <strong></strong> Le Produit $row[nom] est $sts !";
               echo "</div> ";

           $SQL2 = "UPDATE produits SET qte=$row[qte]-$rowa[qte] WHERE pid=?";
           $st2 = $connexion->prepare($SQL2);
           $res2 = $st2->execute(array($row['pid']));
            }else{

              echo "<script type=\"text/javascript\">";
              echo "alert ('Vous avez déjà répondu a cette demande ! ou bien la qte dispo est insuffisante !! ')";
              echo "</script>";

               echo "<br>";
               echo "  <div class=\"alert alert-warning\"> ";
               echo " <strong> Vous avez déjà répondu a cette demande ! ou bien la qte dispo est insuffisante !!</strong>";
               echo "</div> ";

          }
           //
         }
         else if($sts=="refusee"){
          //voir si la commandes n'est pas déja accepter/refuser !! un petit souci
            $sql = "SELECT * FROM commande WHERE  cmdid = ? ";
             $sta = $connexion->prepare($sql);
             $resa = $sta->execute(array($v));
             $rowa=$sta->fetch();
           if($rowa['statut'] == "en_cours"){
          $SQL="UPDATE commande SET statut = ? where cmdid = ? ";
          $st = $connexion->prepare($SQL);
          $res = $st->execute(array($sts,$v));
              echo "<script type=\"text/javascript\">";
              echo "alert ('Le Produit $row[nom] est $sts !')";
              echo "</script>";
           echo "<br>";
           
           echo "  <div class=\"alert alert-warning\"> ";
               echo " <strong> Le Produit $row[nom] est $sts !</strong>";
               echo "</div> ";
         }else{
           echo "<script type=\"text/javascript\">";
              echo "alert ('Vous avez déjà répondu a cette demande!')";
              echo "</script>";

               echo "<br>";
               echo "  <div class=\"alert alert-warning\"> ";
               echo " <strong> Vous avez déjà répondu a cette demande !</strong>";
               echo "</div> ";
         }
         }else{
              echo "<script type=\"text/javascript\">";
              echo "alert ('Quantité insuffisante ou mauvaise opération !')";
              echo "</script>";
         
          echo "<br>";

               echo "  <div class=\"alert alert-warning\"> ";
               echo " <strong> Quantité insuffisante ou mauvaise opération !</strong>";
               echo "</div> ";
        }
         

     }
  }
}   

 
} catch (PDOExeception $e){
  	echo 'Echec de la connection : ' .$e->getMessage();
  }

    
     echo "<br><br>";
    echo "  <div class=\"alert alert-info\"> ";
    echo " <strong></strong><li>Revenir à la page principale <a href=\"page_principale_vndr.php\"> cliquez ici</a> </li>";
    echo "</div> ";
    
?>
</body>
</html>