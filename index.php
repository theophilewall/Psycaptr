<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <!-- Retire le cache -->
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="Pragma" content="no-cache" />

  <link rel="stylesheet" href="Ressources/Style/style.css"/>
  <link rel="stylesheet" href="Ressources/Style/home.css"/>
  <link rel="stylesheet" href="Ressources/Style/nav_bar.css"/>
  <link rel="stylesheet" href="Ressources/Style/footer.css"/>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" href="Ressources/Images/Logo_simple.png" sizes="32x32" type="image/icon type">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900">
  <title>Psycaptr</title>

</head>

<body>
    <nav id="header">
      <?php
        require_once('PHP/navBar.php');
        displayNavBar();
      ?>
    </nav>

    <a draggable="false" class="back-to-top" href="#"><i class="fa fa-arrow-up"></i></a>

    <svg style="width:0;height:0;position:absolute;" aria-hidden="true" focusable="false">
        <linearGradient id="gradient-svg" x2="1" y2="1">
            <stop offset="0%" stop-color="#ff589e" />
            <stop offset="100%" stop-color="#8261ee" />
        </linearGradient>
    </svg>

    <div class="home-background centered">
        <div class="fade-effect"></div>

        <div class="wave-container">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                <path fill="#fff" fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,250.7C672,235,768,181,864,181.3C960,181,1056,235,1152,234.7C1248,235,1344,181,1392,154.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>

        <div class="inner">
          <div class="home-text rellax" data-rellax-speed="-5">
            <p>Better health for future <br>with Infinite Measures</p>
          </div>
          <div class="menu-items">
              <div class="item item-rapide">
                  <div class="item-icon">
                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 98.92 122.88" style="enable-background:new 0 0 98.92 122.88" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M78.77,0c-3.29,39.36-48.34,13.5-65.45,46.28c-2.42,5.34-4.03,10.29-4.8,14.84c-1.26,1.55-2.42,3.22-3.45,5 c-5.22,9.05-6.28,19.35-3.78,28.71c2.51,9.35,8.58,17.75,17.63,22.97c9.05,5.22,19.35,6.28,28.71,3.78 c9.35-2.51,17.75-8.58,22.97-17.63c2.31-4,3.8-8.24,4.54-12.54c5.32-3.1,10.02-7.48,13.62-13.28c6.08-14.12-5.01-25.38,10.17-35.32 c-9.38-4.72-15.1,0.16-20.58,9.7c-5.93,12.88-28.14-2.37-7.32-10.29C88.92,35.42,87.29,14.45,78.77,0L78.77,0L78.77,0z M37.02,84.91c0.11,0,0.23,0,0.34,0.01l13.03-9.76c1.51-1.13,3.66-0.83,4.79,0.68c1.13,1.51,0.83,3.66-0.68,4.79L41.6,90.3 c-0.36,2.21-2.27,3.9-4.58,3.9c-2.56,0-4.64-2.08-4.64-4.64c0-0.49,0.08-0.96,0.22-1.41L19.33,77.89 c-0.84-0.65-0.99-1.85-0.35-2.69c0.65-0.84,1.85-0.99,2.69-0.35l13.5,10.44C35.74,85.05,36.36,84.91,37.02,84.91L37.02,84.91z M53.96,57.11c16.06,9.27,21.08,28,11.8,44.06c-9.27,16.06-28,21.08-44.06,11.81c-16.06-9.27-21.08-28-11.8-44.06 C19.18,52.86,37.9,47.84,53.96,57.11L53.96,57.11z"/></g></svg>
                  </div>
                  <div class="item-title text-fade">
                      <p>Rapide</p>
                  </div>
                  <div class="item-text">
                      <p>Nos tests ne prennent que quelques minutes à réaliser</p>
                  </div>
              </div>
              <div class="item item-precis">
                  <div class="item-icon">
                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve"><g><path d="M862.2,477.6c0-18.7-15.2-33.8-33.8-33.8c-18.7,0-33.8,15.2-33.8,33.8c0,4.9,1,9.6,2.9,13.7c2.2,12.7,5.1,35.1,5.1,68.8c0,209-153.3,362.3-362.4,362.3C231,922.4,77.8,769.1,77.8,560.1c0-209,153.3-362.3,362.4-362.3c33.4,0,38-1.6,67.1,4.6l0.1-0.7c0.9,0.1,1.9,0.3,2.8,0.3c17.8,0,32.4-14.5,32.4-32.4c0-15.4-10.7-28.1-25-31.4l0.3-2c-36.7-6.5-38.4-6.1-77.7-6.1C202.6,130.1,10,322.6,10,560c0,237.5,192.6,430,430.1,430c237.5,0,430.1-192.5,430.1-430c0-37.3-3-54.8-8.2-81.4C862.1,478.4,862.2,477.9,862.2,477.6L862.2,477.6z M345.4,862.1c0.3,0.2,0.7,0.2,1,0.4c1.1,0.4,3.6,0.7,3.6,0.7c1.7,0.3,3.1,1,4.9,1c13.1,0,21.5-11,23.7-24.1c2.2-13.6-12.9-21.9-12.9-21.9c-49.9-15.5-94.3-43.3-130.3-79.8c0,0-13-12.2-22.2-12.2c-13.1,0-23.7,10.8-23.7,24.1c0,7.8,3.8,14.3,9.4,18.8l-0.2,0.1C239.1,811.3,289.2,843.5,345.4,862.1L345.4,862.1z M435.5,421.8c1.2,0.1,2.4,0.4,3.7,0.4c18.7,0,33.8-15.2,33.8-33.8c0-18.4-14.6-33.2-32.9-33.7v-0.9c-114,0-206.5,92.5-206.5,206.4c0,114,92.5,206.4,206.5,206.4c113.4,0,205.4-91.4,206.4-204.5c0.1-1.1,0.3-2.2,0.3-3.4c0-18.7-15.2-33.8-33.8-33.8c-18.7,0-33.8,15.2-33.8,33.8c0,0.5,0.1,1,0.1,1.6h-0.5c0,85.5-53.1,138.6-138.6,138.6c-85.5,0-138.6-53.1-138.6-138.6C301.5,476.2,352.9,423.8,435.5,421.8L435.5,421.8z M990,216l-189.6-16.2L784.2,9.9l-67.8,68.4v0.2L579.2,199.8h-0.3V369L389.5,542l36.3,52.4l205.5-189.2h169.1V405l0.2,0.2l137.5-137.4l-0.2-0.2h0.2L990,216L990,216z M764.6,353.6h-118V235.7l86-86v118h118L764.6,353.6L764.6,353.6z M176.3,661.2c-4.3-4.5-10.3-7.4-16.9-7.4c-13.1,0-23.7,10.8-23.7,24.1c0,7.3,11.8,24,13.7,27c0.2,0.6,0.7,1,1,1.7c2.2,3.5,8.3,9,8.3,9c3.7,2.4,7.8,4.2,12.6,4.2c13.1,0,23.7-10.8,23.7-24.1c0-2.6-0.7-5.1-1.5-7.5L176.3,661.2L176.3,661.2z"/></g></svg>
                  </div>
                  <div class="item-title text-fade">
                      <p>Précis</p>
                  </div>
                  <div class="item-text">
                      <p>Nos tests sont réalisés avec très grande précision</p>
                  </div>
              </div>
              <div class="item item-secure" >
                  <div class="item-icon">
                      <svg xmlns="http://www.w3.org/2000/svg" id="Capa_1""enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512"><g><path style="fill:linear-gradient(127deg, #ff589e 0%, #8261ee 91%);" d="m459.669 82.906-196-81.377c-4.91-2.038-10.429-2.039-15.338 0l-196 81.377c-7.465 3.1-12.331 10.388-12.331 18.471v98.925c0 136.213 82.329 258.74 208.442 310.215 4.844 1.977 10.271 1.977 15.116 0 126.111-51.474 208.442-174.001 208.442-310.215v-98.925c0-8.083-4.865-15.371-12.331-18.471zm-27.669 117.396c0 115.795-68 222.392-176 269.974-105.114-46.311-176-151.041-176-269.974v-85.573l176-73.074 176 73.074zm-198.106 67.414 85.964-85.963c7.81-7.81 20.473-7.811 28.284 0s7.81 20.474-.001 28.284l-100.105 100.105c-7.812 7.812-20.475 7.809-28.284 0l-55.894-55.894c-7.811-7.811-7.811-20.474 0-28.284s20.474-7.811 28.284 0z"/></g></svg>
                  </div>
                  <div class="item-title text-fade">
                      <p>Sécurisé</p>
                  </div>
                  <div class="item-text">
                      <p>Vous seul pouvez accéder à vos résultats confidentiels</p>
                  </div>
              </div>
            </div>
        </div>


    </div>

    <section class="pourquoi-utiliser-container">
      <h2 class="title-pk">Pourquoi nous faire confiance ?</h2>
      <p class="presentation-sub-title sub-title-pk">Notre équipe dynamique vous propose une solution innovante et adaptée aux besoins des médecins qui vous permettra de mesurer avec précision les données psychotechniques de vos patients. En accédant à votre tableau de bord, vous découvrirez un espace vous permettant de visualiser chaques données sous forme de graphiques.</p>
      <img src="Ressources/Images/ordinateurs.png" draggable="false">
    </section>

    <section id="test-section">
    <!-- Vague d'ouverture de section -->
        <div class="wave wave-start">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none"><path fill="#fff" fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,250.7C672,235,768,181,864,181.3C960,181,1056,235,1152,234.7C1248,235,1344,181,1392,154.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
        </div>

    <div class="inner test-container">
      <div class="nos-tests-presentation-text">
        <h2 class="presentation-title" draggable="false">En quoi consistent nos tests ?</h2>
        <p class="presentation-sub-title">Nos tests psychotechniques servent à vérifier les capacités psychotechniques d'un individu pour la conduite automobile, moto... <br> Ces tests peuvent s'avérer utiles pour les pilotes d'avion, d'autocar et de course qui veulent vérifier leurs aptitudes au pilotage d'appareils transportant des vies.</p>
      </div>

      <div class="tests-item-container">
        <div class="test-item">
          <div class="item-illustration">
            <svg class="ecg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="446.667px" height="99.174px" viewBox="0 0 446.667 99.174" enable-background="new 0 0 446.667 99.174" xml:space="preserve"><g>
	          <path fill="none" stroke="#D9004D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M379.833,54.893H179.452
		        c-0.417,0-0.802,0.221-1.012,0.581l-4.204,7.206l-4.489-12.481c-0.162-0.451-0.582-0.758-1.061-0.775
		        c-0.476-0.02-0.919,0.259-1.113,0.697l-3.895,8.809l-4.686-27.542c-0.097-0.572-0.6-0.984-1.177-0.975
		        c-0.58,0.01-1.064,0.443-1.14,1.018l-4.409,33.444l-3.957-19.977c-0.097-0.493-0.499-0.869-0.998-0.934
		        c-0.498-0.064-0.983,0.196-1.204,0.648l-5.148,10.54H66.833"/></g>
            </svg>
          </div>

          <h3>Niveau de stress</h3>
          <div class="test-description"> Nous allons évaluer le stress d'un patient par une mesure de la fréquence cardiaque et de la température de la peau. </div>
          <a href="Ressources/Pages/voir-plus">Voir plus</a>
          <div class="line"></div>
        </div>

        <div class="test-item">
          <div class="item-illustration">
            <div class="yellow-circle"></div>
          </div>
          <h3>Acuité visuelle</h3>
          <div class="test-description"> Nous allons étudier la réaction d'un sujet à une lumière. Pour ce faire, nous allons mesurer le temps de réaction à un stimulus visuel.</div>
          <a href="Ressources/Pages/voir-plus">Voir plus</a>
          <div class="line"></div>
        </div>

        <div class="test-item">
          <div class="item-illustration">
            <div class="sound-wave">
              <span class="bar"></span>
              <span class="bar"></span>
              <span class="bar"></span>
              <span class="bar"></span>
              <span class="bar"></span>
            </div>
          </div>

          <h3>Acuité sonore</h3>
          <div class="test-description">Nous allons mesurer la qualité de reconnaissance de tonalité, le temps de récation à un stimulus sonore et l'étendue de la perception auditive d'un patient. </div>
          <a href="Ressources/Pages/voir-plus">Voir plus</a>
          <div class="line"></div>
        </div>
      </div>
    </div>


    <div class="wave wave-stop" id="FAQ-link">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
        <path fill="#fff" fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,250.7C672,235,768,181,864,181.3C960,181,1056,235,1152,234.7C1248,235,1344,181,1392,154.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
      </svg>
    </div>
  </section>

  <section id="FAQ-section">
    <script src="Javascripts/faq.js"></script>
    <h1 class="FAQ-une-question-title">Une question ?</h1>
    <div class="FAQ-container">
      <ul class="FAQ-questions-reponses-container">
        <?php
        require('PHP/connectDatabase.php');
        $sql = 'SELECT * FROM FAQ';

        if(!$result = $bdd -> query($sql)){
            echo "Échec de la requête SQL : (" . $bdd->errno . ") " . $bdd->error;
        }

        // Recuperation des resultats
        while($row = $result -> fetch_row()){
            $Question=$row[1];
            $Reponse = $row[2];

            //On génère une ligne qui correpond pour chaque question / réponses
            echo '<li class="FAQ-question-reponses question-first" onclick="toggleAccordion(this)">';
            echo '<div class="FAQ-question">';
            echo '<h4>'.$Question.'</h4><span class="icon"></span>';
            echo '</div>';
            echo '<div class="FAQ-reponse">';
            echo '<div class="wrapper">';
            echo '<p>'.$Reponse.'</p>';
            echo '</div>';
            echo '</div>';
            echo '</li>';
        }

        $result -> free_result();

        $bdd -> close();
        ?>
      </ul>
    </div>

    <!-- Cercles qui se balladent en fond -->

    <svg class="circle circle1 rellax" data-rellax-speed="10" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
      <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
      <g><g><path fill="#fff3f8" d="M500,10C229.4,10,10,229.4,10,500c0,270.5,219.4,490,490,490c270.5,0,490-219.5,490-490C990,229.4,770.5,10,500,10z M500,826.7c-180.4,0-326.7-146.3-326.7-326.7S319.6,173.3,500,173.3S826.7,319.6,826.7,500C826.7,680.4,680.4,826.7,500,826.7z"/></g><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/></g>
    </svg>

    <svg class="circle circle3 rellax" data-rellax-speed="-3" data-rellax-zindex="-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
      <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
      <g><g><path fill="#fff3f8" d="M500,10C229.4,10,10,229.4,10,500c0,270.5,219.4,490,490,490c270.5,0,490-219.5,490-490C990,229.4,770.5,10,500,10z M500,826.7c-180.4,0-326.7-146.3-326.7-326.7S319.6,173.3,500,173.3S826.7,319.6,826.7,500C826.7,680.4,680.4,826.7,500,826.7z"/></g><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/></g>
    </svg>
  </section>

  <div id="contact-container" class="centered">
    <div class="inner">

      <form class="contact_form_container" action="PHP/contactAlgo.php" method="POST">
        <div class="abstract_container" id="contact_link"></div>
        <div class="title_container">
          <h3 draggable="false">Une autre question ?    Contactez-nous !</h3>
        </div>
        <div class="input_container input_container_1">
          <input name="Prenom" type="text" placeholder="Prénom" required/>
          <input name="Nom" type="text" placeholder="Nom" required/>
        </div>

        <div class="input_container input_container_2">
          <input name="Mail" type="email" placeholder="Votre mail" required/>
        </div>

        <div class="input_container input_container_3">
          <textarea name="Message" placeholder="Votre message" required></textarea>
        </div>
        <div class="envoyer_button">
          <button type="submit">Envoyer le message</button>
        </div>
      </form>
    </div>
  </div>

  
  <footer id="footer" class="centered" >
   <div class="CGU">
      <a href="Ressources/Pages/CGU.php"> Conditions d'utilisation et mentions légales </a>
    </div>
    <?php 
      displayFooter();
    ?>
  </footer>

  <!-- Ajout de la barre de navigation et du footer -->
  <script src="./javascripts/faq.js"></script>
  <script src="./javascripts/rellax.js"></script>
  <script> var rellax = new Rellax('.rellax',{ center : true }); </script>
</body>
</html>
