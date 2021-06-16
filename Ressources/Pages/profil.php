<?php
	session_start();
	// $IdMedecin  = $_SESSION["IdMedecin"];

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../Style/style.css"/>
  <link rel="stylesheet" href="../Style/input.css"/>
  <link rel="stylesheet" href="../Style/profil.css"/>
  <link rel="stylesheet" href="../Style/title.css"/>


  <link rel="icon" href="../Images/Logo_light.png" type="image/icon type">
  <title>Gestion de votre profil • Psycaptr</title>
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

<?php require_once('dashboardHeaderNav.php');
  $canModify = $_SESSION["modifyProfile"];
  $_SESSION["modifyProfile"]=0;
?>

<body>
  <h1>Votre profil</h1>
  <section class="content-container flex">
    <form class="form-container" method="post" action="../../PHP/modifyProfile.php">
      <a class="modif_button" href="../../PHP/modifyProfile.php">Modifier votre profil</a>

      <section class="categorie information-container">
        <h2>Vos informations</h2>
        <div class="item prenom-container">
          <h4>Prénom</h4>
          <input name="Prenom" type="text" required="required" <?php if($canModify != 1){ echo "readonly='readonly' class='noModify'";}?> value="<?php echo $_SESSION['Prenom']; ?>"/>
        </div>

        <div class="item nom-container">
            <h4>Nom</h4>
            <input name="Nom" type="text" required="required" <?php  if($canModify != 1){ echo "readonly='readonly' class='noModify'";}?> value="<?php echo $_SESSION['Nom']; ?>"/>
        </div>

      </section>

      <section class="categorie information-container">

        <h2>Mes coordonnées</h2>
        <div class="item mail-container">
          <h4>Votre adresse mail</h4>
          <input name="Mail" type="email" required="required" <?php  if($canModify != 1){ echo "readonly='readonly' class='noModify'";}?> value="<?php echo $_SESSION['Mail']; ?>"/>
        </div>

        <?php if($canModify == 1){ ?>
        <div class="item tel-container">
          <h4>Votre mot de passe actuel <span class="obligatoire">*</span></h4>
          <input name="Mdp" type="password" minlength="8" inputmode="numeric" required="required">
        </div>
        <div class="item tel-container">
          <h4>Votre nouveau mot de passe</h4>
          <input name="newMdp" type="password" minlength="8" inputmode="numeric"/>
        </div>
        <div class="item tel-container">
          <h4>Confirmation du nouveau mot de passe</h4>
          <input name="newMdpBis" type="password" minlength="8" inputmode="numeric"/>
        </div>
        <div class="item tel-container button-profil">
          <button class="validerBoutton" type='submit' name='modifyProfile'>Valider les modifications</button>
        </div>

				<?php
        }?>
      </section>
    </form>
    <div class="img_container">
      <img src="../Images/modifyUser.jpg" alt="modifyUser" draggable="false">
    </div>
  </section>

</body>
</html>
<script></script>
