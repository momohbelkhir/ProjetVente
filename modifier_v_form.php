<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="pricipale.css">
<link rel="stylesheet" href="bootstrap.css"> 
	<title>edit</title>
</head>
<body>

<?php
 $pid= $_GET["pid"];
          $SQLr="SELECT * from produits where pid=? ";
          $str = $connexion->prepare($SQLr);
          $resr = $str->execute(array($pid));
          $rowr = $str->fetch();
?>
  
  <div class='center'>
  <div class="alert alert-info" >
  <strong></strong> 
  <h2> Modifier un produit :</h2>
  </div>
   <form action="" method="post" style="text-align: center;" >
          <div  class="col-md-ofsset-2 col-md-3">
      <div class="center">

      <tr>
      <td><label for="inputNom" class="control-label">Nv Nom</label></td> 
      <td><input type="text" name="nom" class="form-control"  value=" <?php echo $rowr['nom']; ?> "></td>
      </tr> 

      <tr>
      <td><label for="inputDescription" class="control-label"> Nvlle Description</label></td>
      <td><input type="text" name="description" class="form-control" value=" <?php echo $rowr['description']; ?> " ></td>
      </tr> 
        <tr>
      <td><label for="inputQte" class="control-label">Nvlle Qte</label></td>
      <td><input type="number" name="qte"  class="form-control" placeholder="Quantité"> </td>
        </tr>

          <tr>
      <td><label for="inputPrix" class="control-label">Nv Prix</label></td>
      <td><input type="number" name="prix"  step='0.01' class="form-control" placeholder="Prix"> </td>
        </tr>

      </div>
       
     <div class="form-group">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                    
    </div>
          </div>
    
 </form>
 </div>

</body>
</html>