<!DOCTYPE html>
<html><head> 
<meta charset= 'utf-8'>
 <link rel="stylesheet" href="principale.css">
  <link rel="stylesheet" href="bootstrap.css"> 
</head>

<body class="p" >

  <?php

  
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
   <td>prix: </td>
   <td>uid: </td>
   <td>ctid: </td>
   </tr> </thead>";

while($row) {
echo

"<tbody><tr class=\"warning\"><td>$row[pid]</td><td>$row[nom]</td><td>$row[description]</td><td>$row[qte]</td><td>$row[prix]</td><td>$row[uid]</td><td>$row[ctid]</td></tr><tbody>";
$row = $st->fetch();
 }

      echo "</table>";
      echo "</div>";
 
      echo "</form>";
      ?>
  </body>
  </html>

