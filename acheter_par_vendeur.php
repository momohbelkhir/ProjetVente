<!DOCTYPE html>
<html><head> 
<meta charset= 'utf-8'>
  <link rel="stylesheet" href="principale.css">
  <link rel="stylesheet" href="bootstrap.css"> 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body class="p" >
  
 
  <?php
  include("auth/EtreAuthentifie.php");
  require("db_config.php");
 include("home_ach.php");


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
   <td>Produits: </td>
   </tr></thead>";

     
while($row = $st->fetch()) {
echo

"<tbody><tr class=\"warning\"><td>$row[uid]</td><td>$row[nom]</td><td>$row[prenom]</td><td>$row[role]</td>
<td><a href='acheter_par_vendeur.php?uid=$row[uid]'class=\"btn btn-info btn-lg\"><span class=\"glyphicon glyphicon-eye-open\"></span>open</a></td></tr></tbody>";
 }

      echo "</table>";
      echo "</div>";

     if(isset($_GET["uid"])){
        $id = $_GET["uid"];
      
      


$SQL = "SELECT * FROM produits where uid=?";
          $st = $connexion->prepare($SQL);
          $res = $st->execute(array($id));
           
        $row = $st->fetch();
         if($row){
  echo "<div class=\"container\">";
 echo "<table class=\"table\">";
               echo "  <div class=\"alert alert-warning\"> ";
               echo " <strong> <h2>Liste des produits:</h2></strong> Sélectionnez des produits";
               echo "</div> ";
  echo " <thead><tr class=\"active\">
  <td>pid: </td>
   <td>Nom: </td>
   <td>Description: </td>
   <td>qte: </td>
   <td>prix: </td>
   <td>uid: </td>
   <td>ctid: </td>
   </tr></thead>";

     echo  "<form action=\" \" method=\"post\" style=\"text-align: center;\">";

while($row) {
echo

"<tbody><tr class=\"info\"><td><input type=\"checkbox\" name=\"cbox[]\" value=\"$row[pid]\">$row[pid]</td><td>$row[nom]</td><td>$row[description]</td><td>$row[qte]</td><td>$row[prix]</td><td>$row[uid]</td><td>$row[ctid]</td></tr></tbody>";
$row = $st->fetch();
 }

      echo "</table>";
      echo "</div>";
      echo "<input type=\"submit\" value=\"Envoyer\" class=\"btn btn-primary\">";
      echo "</form>";
    }else{
     
       echo "  <div class=\"alert alert-warning\"> ";
               echo " <strong> Aucun produits pour ce vendeur!! !</strong>";
               echo "</div> ";
    }
}
         if (isset($_POST["cbox"])) {
        foreach($_POST['cbox'] as $v){
          
          $userid = $idm->getUid();
       
          $SQL = "SELECT qte,nom FROM produits WHERE  pid=?";
          $st = $connexion->prepare($SQL);
          $res = $st->execute(array($v));
          $row=$st->fetch();

          if($row['qte']>0){

            $SQL = "INSERT INTO commande (pid,uid,qte,date) VALUES (?,?,?,now())";
            $st = $connexion->prepare($SQL);
            $res = $st->execute(array($v,$userid,1));
              echo "<br>";
             
              echo "<script type=\"text/javascript\">";
              echo "alert ('Le produit $row[nom] a été ajoutée !!')";
              echo "</script>";
         
               echo "<br><br>";

               echo "  <div class=\"alert alert-success\"> ";
               echo " <strong> Le produit $row[nom] a été ajoutée !!</strong>";
               echo "</div> ";
    
             }else{ 
            
              echo "<script type=\"text/javascript\">";
              echo "alert ('Quantité insuffisante pour le produit : $row[nom]!')";
              echo "</script>";
         
               echo "<br><br>";

               echo "  <div class=\"alert alert-warning\"> ";
               echo " <strong> Quantité insuffisante pour le produit : $row[nom]! !</strong>";
               echo "</div> ";
            }

           }

 }

}


  catch (PDOExeception $e){
  	echo 'Echec de la connection : ' .$e->getMessage();
  }
  echo "<br><br>";
    echo "  <div class=\"alert alert-info\"> ";
    echo " <strong></strong><li>Revenir à la page principale <a href=\"page_principale.php\"> cliquez ici</a> </li>";
    echo "</div> ";
?>
 

  
 



</body>
</html>