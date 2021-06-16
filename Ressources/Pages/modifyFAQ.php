<?php  
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../Style/style.css"/>
  <link rel="stylesheet" href="../Style/profil.css"/>
  <link rel="stylesheet" href="../Style/modifyFAQ.css"/>
  <link rel="stylesheet" href="../Style/title.css"/>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="icon" href="../Images/Logo_light.png" type="image/icon type">
  <title>Gestion de la FAQ • Psycaptr</title>
</head>

<script>
  document.addEventListener("DOMContentLoaded", function(event) { 
      var scrollpos = localStorage.getItem('scrollpos');
      if (scrollpos) window.scrollTo(0, scrollpos);
  });

  window.onbeforeunload = function(e) {
      localStorage.setItem('scrollpos', window.scrollY);
  };
</script>

<?php require_once('dashboardHeaderNav.php');?>

<body>
  <h1>Gestionnaire de la FAQ</h1>
  <section class="content-container">
    <h2>Ajout d'une question à la FAQ</h2>

   <form class="container-form" action="../../PHP/modifyFAQAlgo.php" method="POST">
      <div class="count_container count_container_grand">
        <h3 class="count count_plus">+</h3>
      </div>
      <div class="inputs_container">
        <div class="line-container user-container">
          <input class="question-container" type="text" placeholder="Contenu de la question" name="Question" required/>
          <div class="valider_changement remove"><button type="submit" name="addFAQ"><i class="fa fa-plus"></i></button></div>
        </div>
        <textarea class="reponse-container" type="text" name="Reponse" placeholder="Contenu de la réponse " required></textarea>
      </div>
    </form>


    <!-- Affichage de la liste des utilisateurs -->
    <?php require('../../PHP/modifyFAQAlgo.php');?>
    
  </section>
</body>
</html>

<!-- Ces balises de script fixent un bug de Chrome qui déclanche les  
animations des :hover au lancement de la page -->
<script> 
  function adjustHeight(el){
      el.style.height = (el.scrollHeight > el.clientHeight) ? (el.scrollHeight)+"px" : "60px";
  }
</script>