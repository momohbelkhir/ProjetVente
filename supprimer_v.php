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
               echo " <strong> <h2>Liste des produits:</h2></strong> suppression de produits";
               echo "</div> ";
  echo "<thead> <tr class=\"active\">
  <td>pid: </td>
   <td>Nom: </td>
   <td>Description: </td>
   <td>qte: </td>
    <td>Prix: </td>
   <td>uid: </td>
   <td>ctid: </td>
   <td>supprimer: </td>
   </tr></thead>";
         
while($row) {
echo

"<tbody><tr class=\"success\"><td>$row[pid]</td><td>$row[nom]</td><td>$row[description]</td><td>$row[qte]</td><td>$row[prix]</td><td>$row[uid]</td><td>$row[ctid]</td><td><a href='supprimer_v.php?pid=$row[pid]' class=\"btn btn-info btn-lg\"><span class=\"glyphicon glyphicon-trash\"></span> Trash </a></td></tr></tbody>";
$row = $st->fetch();
 }
       
      echo "</table>";
      echo "</div>";

                if(isset($_GET["pid"])){
       if ( !isset($_POST["supprimer"]) && !isset($_POST["annuler"]) ){ 
        echo "<br>";
  include("supprimer_v_form.php");
}else if(isset($_POST["annuler"])){
  
               echo "  <div class=\"alert alert-warning\"> ";
               echo " <strong> L'opération est annulée</h3> !</strong>";
               echo "</div> ";
}else{
 
 
    if(isset($_GET["pid"])){
      $p=$_GET['pid'];
       $SQLs = "SELECT * FROM produits where uid = ? AND pid = ?";
       $sts = $connexion->prepare($SQLs);
       $ress = $sts->execute(array($ven,$p));

      $rows=$sts->fetch();
  if($rows){
  echo "  <div class=\"alert alert-warning\"> ";
               echo " <strong> Le produit $p a été supprimer !</h3> !</strong>";
               echo "</div> ";
 $SQL = "DELETE FROM produits WHERE pid= ? and uid=?";
 $res = $connexion->prepare($SQL);
 $res ->execute(array($p,$ven));
}else {
   echo "<script type=\"text/javascript\">";
              echo "alert ('le produit $p est déjà supprimé !')";
              echo "</script>";
}
}
}
 
}


   }else if(!$row){
              echo "  <div class=\"alert alert-warning\"> ";
               echo " <strong> Vous n'avez pas de produit!</h3> !</strong>";
               echo "</div> ";
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