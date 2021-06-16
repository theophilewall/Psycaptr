<!-- Pas besoin de session start car deja dans l'algo php-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../Style/style.css"/>
  <link rel="stylesheet" href="../Style/nav_bar.css"/>
  <link rel="stylesheet" href="../Style/footer.css"/>
  <link rel="stylesheet" href="../Style/mailEnvoye.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900">

  <link rel="icon" href="../Images/Logo_light.png" size="32x32" type="image/icon type">
  <title>Banni • Psycaptr</title>
</head>

<nav id="navi" class="nav_absolute" >
  <?php 
    require_once('../../PHP/navBar.php');
    displayNavBar("../../");
  ?>
</nav>

<body>

  <div class="backup_container" >
     <div><i class="fas fa-info-circle"></i>  Vous êtes Banni</div>
     <a href="../../index">Revenir à l'acceuil</a>
  </div>
  
</body>
</html>

<!-- Ces balises de script fixent un bug de Chrome qui déclanche les  
animations des :hover au lancement de la page -->
<script> </script>