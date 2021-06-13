<?php 
    //Connexion à la database
    $servername = 'localhost';
    $bddname = 'ttwawain_Psycaptr';
    $username = 'theophile';
    $password = 'psycaptrisep2023';

    //Message d'erreur en cas d'accès impossible à la database
    $bdd = new mysqli($servername, $username, $password, $bddname);
    if($bdd->connect_errno){
        echo 'Error connexion : impossible to access the data base' . $bdd -> connect_error;
        exit();
    }
	
?>