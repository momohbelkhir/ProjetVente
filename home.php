<!DOCTYPE html>
<html>
<head> 
<meta charset= 'utf-8'>

  <link rel="stylesheet" href="principale.css">
  <link rel="stylesheet" href="bootstrap.css"> 
</head>

<body class="p">

<script src="jquery.min.js" ></script>
<script src ="bot.min.js"></script>

<?php

require("auth/EtreAuthentifie.php");

$title = 'Accueil';
//include("header.php");
//echo "<link rel=\"stylesheet\" href=\"principale.css\">"
?>

<!--<a href="<?= $pathFor['logout'] ?>" title="Logout">Logout</a> </br>-->

<?php

   if($idm->getRole() == "acheteur"){
  
   	include("home_ach.php");
     echo "<br> <br>";
   	echo " 	<div class=\"alert alert-info\"> ";
    echo " <strong> Info! </strong> hello acheteur!.";
    echo " <h3>Hello</h3> " . $idm->getIdentity()."<h3> Your uid is:</h3> ". $idm->getUid() ."<h3> Your role is:</h3> ".$idm->getRole();
    echo "</div> ";

   

//echo "<h3>Hello</h3> " . $idm->getIdentity()."<h3>. Your uid is:</h3> ". $idm->getUid() ."<h3> Your role is:</h3> ".$idm->getRole();
}else if($idm->getRole()== "vendeur"){
	include("homedec.php");
    echo "<br> <br>";
   	echo " 	<div class=\"alert alert-info\"> ";
    echo " <strong> Info! </strong> hello Vendeur!.";
    echo " <h3>Hello</h3> " . $idm->getIdentity()."<h3> Your uid is:</h3> ". $idm->getUid() ."<h3> Your role is:</h3> ".$idm->getRole();
    echo "</div> ";
     

//echo "<h3>Hello</h3> " . $idm->getIdentity()."<h3> Your uid is:</h3> ". $idm->getUid() ."<h3> Your role is:</h3> ".$idm->getRole();
}
//include("footer.php");
?>


</body>
</html>