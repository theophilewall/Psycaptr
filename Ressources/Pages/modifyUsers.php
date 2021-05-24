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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="icon" href="../Images/Logo_light.png" type="image/icon type">
  <title>DashBoard • Psycaptr</title>
</head>

<?php require_once('dashboardHeaderNav.php');?>

<body>
  <section class="content-container">
    <h2>Liste des utilisateurs</h2>

    <form class="search_bar-container" action="modifyUsers.php" method="POST">
      <input  type="text" name="search" placeholder="Rechercher parmis les utilisateurs">
      <div class="button-container"><button type="submit">Recherche</button></div>
    </form>

    <!-- Ces lignes servent aux tests en localhost (sans BDD) -->
    
    <!-- <form class="line-container user-container" onsubmit="addUser()" method="POST">
      <input type="text" name="Nom" placeholder="Nom" required>
      <input type="text" name="Nom" placeholder="Prenom" required>
      <input input type="email" name="Nom" placeholder="Adresse mail" required>
      <div class="valider_changement"><button type="submit"><i class="fas fa-plus"></i></button></div>
    </form> -->

    <!-- Affichage de la liste des utilisateurs -->
    <?php require('../../PHP/modifyUsersAlgo.php');?>
    
  </section>
  <!-- <script src="../../javascripts/Graph/graph.js"></script> -->
</body>
</html>