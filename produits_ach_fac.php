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

"<tbody><tr class=\"warning\">
<td><input type=\"radio\" name=\"cbox[]\" value=\"$row[pid]\">$row[pid]</td>

<td>$row[nom]</td>
<td>$row[description]</td>
<td>$row[qte]</td>
<td>$row[prix]</td>
<td>$row[uid]</td>
<td>$row[ctid]</td>
</tr></tbody>";
$row = $st->fetch();
 }
       echo "<td><input type=\"number\" name=\"qte\"  class=\"form-control\" placeholder=\"Quantité\"> </td>";
      echo "</table>";
      echo "</div>";
      echo "<input type=\"submit\" value=\"Envoyer\" class=\"btn btn-primary\">";
      echo "</form>";
      ?>
  </body>
  </html>

