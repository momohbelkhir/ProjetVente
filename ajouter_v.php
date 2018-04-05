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
  include("ajouter_v_form.php");


  try{
  $connexion=new PDO($dsn,$username,$password);
  $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
if ( isset ($_POST["nom"]) && isset ($_POST["description"]) && isset($_POST["qte"]) && isset($_POST["prix"]) && isset($_POST["ctid"]) ){

$nom = $_POST["nom"];
$description = $_POST["description"];
$qte=$_POST["qte"];
$prix = $_POST["prix"];
$ctid = $_POST["ctid"];
$ven = $idm->getUid();
               if( empty($nom) || empty($description) || !is_numeric($qte) || !is_numeric($prix) ){
                
                echo "<script type=\"text/javascript\">";
              echo "alert ('Il faut remplir tous les champs !')";
              echo "</script>";
                    
 }else{
                    
                    $SQL = "SELECT ctid FROM categories where nom=? ";
                    $st = $connexion->prepare($SQL);
                    $res = $st->execute(array($ctid));
                     $row=$st->fetch();
                     if($row){

 $SQL = "INSERT INTO produits (nom,description,qte,prix,uid,ctid) VALUES(?,?,?,?,?,?)";
 $st = $connexion->prepare($SQL);
 $res = $st->execute(array($nom,$description,$qte,$prix,$ven,$row['ctid']));

        
   $SQL = "SELECT * FROM produits WHERE uid=?";
          $st = $connexion->prepare($SQL);
          $res = $st->execute(array($ven));
           $row=$st->fetch();
           //
echo "<script type=\"text/javascript\">";

echo "alert ('le produit à été ajouté avec succès !')";

echo "</script>";
//
   
 echo "<div class=\"container\">";
 echo "<table class=\"table\">";
  echo "  <div class=\"alert alert-warning\"> ";
               echo " <strong></strong> Liste des produits:";
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

while($row) {
 
echo

"<tbody><tr class=\"info\"><td>$row[pid]</td><td>$row[nom]</td><td>$row[description]</td><td>$row[qte]</td><td>$row[prix]</td><td>$row[uid]</td><td>$row[ctid]</td></tr></tbody>";
$row = $st->fetch();
 }
       
      echo "</table>";
      echo "</div>";
    }else{echo "<h1>Catégorie introuvable !</h1>";}
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