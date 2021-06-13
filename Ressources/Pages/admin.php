<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../Style/style.css"/>
  <link rel="stylesheet" href="../Style/admin.css"/>
  <link rel="icon" href="../Images/Logo_light.png" type="image/icon type">

  <title>Administrateur • Psycaptr</title>
</head>

<?php require_once('dashboardHeaderNav.php');?>

<!-- Il faudrait pour check le type d'user connecté, 
si c'est l'admin alors afficher d'autre logo dans la nav bar -->

<body>
  <div class="dashboard_container">
    <h1 class="dashboard_title">Votre tableau de bord</h1>
    <div class="main_part_container">
        <div class="part_1_container ">
          <div class="graph graph-1">
            <h2 class="canvas_title">Fréquentation de la plateforme</h2>
            <div class="canvas_container">
             <canvas id="line-chart"></canvas>
            </div>
          </div>
        </div>
        <div class="part_2_container">
          <div class="graph graph-2">
            <h2>Gestion des Utilisateurs</h2>
            <a><img src="../Images/liste-de-controle.png"></a>
          </div>
        </div>
    </div>
    <div class="main_part_container">
      <div class="part_1_container">
          <div class="graph graph-double graph-3">
            <h2>Mon Profil</h2>
            <a><img src="../Images/User_icons/sharky.png"></a>
          </div>

          <div class="graph graph-double graph-4">
            <h2>Répartition des Utilisateurs</h2>
            <div class="canvas_container">
             <canvas id="doughnut-chart" width="750" height="450"></canvas>
            </div>
          </div>
      </div>
      <div class="part_2_container">
        <div class="graph graph-5">
          <h2>Validations en attente</h2>
          <a><img src="../Images/liste-de-taches.png"></a>
        </div>
      </div>
  </div>
  </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="../../javascripts/Graph/graph.js"></script>
<script>
  graph1();
  doughnut();
</script>
</html>

<?php
  // Vérification que l'utilisateur est bien connecté, et qu'il est bien un admin
	session_start();
	if($_SESSION['login'] != 1 | $_SESSION['userType'] != 'admin') {
		if(!isset($_SESSION['lastActivity']) && (time()-$_SESSION['lastActivity'])>1800){
			unset($_SESSION['login']);
			header('Location:../../index');
			exit();
		}
	}
	$_SESSION['lastActivity']= time();
?>
