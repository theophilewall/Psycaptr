<?php
  session_start();
    $IdMedecin     = $_SESSION['IdMedecin'];
    $IdPatient     = $_SESSION['IdPatient'];
    $NomPatient    = $_SESSION['NomPatient'];
    $PrenomPatient = $_SESSION['PrenomPatient'];
    $MailPatient   = $_SESSION['MailPatient'];

    if (in_array(strtolower($PrenomPatient{0}), ['a','e','i','o','u','é','y'])) {
      $de = 'd\'';
     }
     else {
       $de = 'de ';
     }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../Style/style.css"/>
  <link rel="stylesheet" href="../Style/dashboard.css"/>
  <link rel="icon" href="../Images/Logo_light.png" type="image/icon type">

  <title>DashBoard • Psycaptr</title>
</head>

<?php require_once('dashboardHeaderNav.php');?>

<body>

  <div class="dashboard_container">
    <h1 class="dashboard_title">Votre tableau de bord</h1>
    <div class="main_part_container">
        <div class="part_1_container ">
          <div class="graph graph-1">
            <h4 class="canvas_title">Évolution de votre score</h4>
            <div class="canvas_container">
             <canvas id="line-chart"></canvas>
            </div>
          </div>
        </div>
        <div class="part_2_container">
          <div class="graph graph-2">
            <h4 class="canvas_title">Score Moyen</h4>
            <div class="canvas_container">
             <canvas id="doughnut-chart"></canvas>
            </div>
          </div>
        </div>
    </div>
    <div class="main_part_container">
      <div class="part_1_container">
          <div class="graph graph-double graph-3">
            <h4 class="canvas_title">Votre dernier Test</h4>
            <div class="canvas_container">
             <canvas id="radar-chart"></canvas>
            </div>
          </div>
          <div class="graph graph-double graph-4">
            <h4 class="canvas_title">Tests par catégorie</h4>
            <div class="canvas_container">
             <canvas id="bar-chart"></canvas>
            </div>
          </div>
      </div>
      <div class="part_2_container">
        <div class="graph graph-5"></div>
      </div>
  </div>
  </div>

</body>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> -->
<script src="../../node_modules/chart.js/dist/chart.js"></script>
<!--<script src="../../node_modules/chart.js/dist/chartjs-plugin-colorschemes.js"></script>-->
<script src="../../javascripts/Graph/graph.js"></script>
<script>

  var Data = [];

  <?php

    if($_SESSION['userType'] == 'medecin'){
      require('../../PHP/connectDatabase.php');

      $sql = "SELECT Resultats FROM Test WHERE Id_Medecin = '$IdMedecin' AND Type='3' ORDER BY Date_Test ASC";

    	$result = $bdd -> query($sql);
      $num_row = mysqli_num_rows($result);

      $i = 0;
      while($row = $result -> fetch_row()){
        echo "Data[".$i."] = ".$row[0].";\n";
        $i++;
      }


      echo "console.log(Data);\n";

      if($num_row != 0){
        echo "lineChart(Data);\n";
      }
      else {
        echo "lineChart([1, 4, 8, 5, 6, 9]);\n";
      }



      $sql = "SELECT Type, COUNT(*) as type FROM `Test` WHERE Id_Medecin='$IdMedecin' GROUP BY Type";

      $result = $bdd -> query($sql);
      $num_row = mysqli_num_rows($result);

      $i = 0;
      while($row = $result -> fetch_row()){
        echo "Data[".$i."] = ".$row[1].";\n";
        $i++;
      }


      if($num_row != 0){
        echo "barChart(Data);\n";
      }
      else {
        echo "barChart([2, 4, 8, 3, 5]);\n";
      }

    }
    else {
      echo "lineChart([1, 4, 8, 5, 6, 9]);\n";
      echo "barChart([2, 4, 8, 3, 5]);\n";
    }

  ?>


  Data = [];

  doughnutChart();

  radarChart();
</script>
</html>
