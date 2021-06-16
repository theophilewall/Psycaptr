<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../Style/style.css"/>
  <link rel="stylesheet" href="../Style/profil.css"/>
  <link rel="stylesheet" href="../Style/modifyUsers.css"/>
  <link rel="stylesheet" href="../Style/title.css"/>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="icon" href="../Images/Logo_light.png" type="image/icon type">
  <title>Gestion des utilisateurs • Psycaptr</title>
</head>



<body>


    <!-- Affichage de la liste des utilisateurs -->

	<a href="http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=G9Dy&TRAME=".<?php

	// Exemple de trame : 1 G9Dy 13011234 FFFF 1520210611094457

	$trame = "23033585FFFF15";
	echo $trame;

	?>.""> Test d'envoi d'une trame Site-Objet</a>


</body>
</html>

<!-- Ces balises de script fixent un bug de Chrome qui déclanche les
animations des :hover au lancement de la page -->
<script> </script>
