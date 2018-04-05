<!DOCTYPE html>
<html><head> 
<meta charset= 'utf-8'>
  <link rel="stylesheet" href="principale.css">
  <link rel="stylesheet" href="bootstrap.css"> 
</head>

<body >
<div class='center'>
  <div class="alert alert-warning"> 
   <strong>Ajouter un produit:</strong> 
               </div>

   <form action="" method="post" style="text-align: center;" >
      <table class="center">
      <tr>
      <td><label for="inputNom" class="control-label">Nom</label></td>
      <td><input type="text" name="nom" class="form-control" placeholder="Nom"></td>
      </tr> 

      <tr>
      <td><label for="inputDescription" class="control-label">Description</label></td>
      <td><input type="text" name="description" class="form-control" placeholder="Description"></td>
      </tr> 
        <tr>
      <td><label for="inputQte" class="control-label">Qte</label></td>
      <td><input type="number" name="qte" class="form-control" placeholder="Quantité"> </td>
        </tr>

          <tr>
      <td><label for="inputPrix" class="control-label">Prix</label></td>
      <td><input type="number" name="prix"  step ='0.01' class="form-control" placeholder="Prix"> </td>
        </tr>

       <tr>
       <td><label for="inputCtid" class="control-label">Catégories</label></td>
       <td><select name="ctid"  class="form-control">
              <option>Alimentaire</option>
              <option>Vêtements</option>
              <option>Jouets</option>
           </select>
       </td>
       </tr>
      </table>
    
     <div class="form-group">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                    
                        </div>
    
 </form>
 </div>
 </body>
 </html>