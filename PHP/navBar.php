<?php
// session_start();

function displayNavBar(string $url=""){
    if($url==""){
        $url2="Ressources";
    }
    else{
        $url2="..";
    }
    echo '<a class="link-logo" href="'.$url.'/#">';
    echo '<img class="header-logo" src="'.$url2.'/Images/logo.png" alt="Logo Psycaptr" draggable="false">';
    echo '</a>';
    echo '<div class="header-link-container" draggable="false">';
    echo '<a class="header-link Acceuil" href="'.$url.'/#" draggable="false">Accueil</a>';
    echo '<a class="header-link Tests" href="'.$url.'/#test-section" draggable="false">Tests</a>';
    echo '<a class="header-link FAQ" href="'.$url.'/#FAQ-link" draggable="false">FAQ</a>';
    echo '<a class="header-link Contact" href="'.$url.'/#contact_link" draggable="false">Contact</a>';
    echo '</div>';

    if($_SESSION['login'] == 1) {
        echo '<a class="header-connect-container" href="'.$url2.'/Pages/dashboard" draggable="false">Votre Dashboard</a>';
    }
    else{
        echo '<a class="header-connect-container" href="'.$url2.'/Pages/connexion" draggable="false">Connexion</a>';
    }
}

function displayFooter(){
    echo '<div class="inner"><div class="socials"><a draggable="false" href="https://facebook.com"><i class="fa fa-facebook"></i></a><a draggable="false" href="https://instagram.com"><i class="fa fa-instagram"></i></a><a draggable="false" href="https://twitter.com"><i class="fa fa-twitter"></i></a><a draggable="false" href="https://youtube.com"><i class="fa fa-youtube-play"></i></a></div><div class="footer-line"></div><p>Copyright © 2021 Psycaptr Company</p></div>';
}
?>