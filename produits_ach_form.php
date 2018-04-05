<!DOCTYPE html>
<html><head> 
<meta charset= 'utf-8'>

  <link rel="stylesheet" href="bootstrap.css"> 
</head>

<body >
<div class="alert alert-info" >
  <strong></strong> 

<div class='center'>
  <h2> Rechercher un produit :</h2>

   <form action="" method="post">
      <table class="center">

         <tr>
      <td><label for="inputUid" class="control-label" >Vendeur uid</label></td>
      <td><input type="number" name="vendeur"  class="form-control" placeholder="Vendeur uid"> </td>
        </tr>


      <tr>
      <td><label for="inputRecherche" class="control-label">Recherche</label></td>
      <td><input type="text" name="recherche" class="form-control" placeholder="Produit"></td>
      </tr> 

       <tr>
       <td><label for="inputCtid" class="control-label">Catégories</label></td>
       <td><select name="ctid"  class="form-control">
       

       <option>Toutes_categories</option> 
             <option>Alimentaire</option>
        <option>Vêtements</option>
        <option>Jouets</option>

          </select>
       </td>
       </tr>
      </table>
    
     <div class="form-group">
                            <button type="submit" class="btn btn-primary">Recherche</button>
                    
                        </div>
    
 </form>
 </div>
</div>
 </body>
</html>