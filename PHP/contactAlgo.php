<?php
session_start();
require('algo.php'); //Connexion à la database
require('connectDatabase.php'); //Connexion à la database

$Id = IdGenerator(11); //Un Id est généré par une méthode

//On récupère les données rentrées par l'utilisateur
$Nom = convertInput($_POST['Nom']);
$Prenom = convertInput($_POST['Prenom']);
$Mail = convertInput($_POST['Mail']);
$Message = convertInput($_POST['Message']);
$Message = str_replace("'","''",$Message);

$Date = date('Y-m-d H:i:s');
$IdUser = 0;
$MailTo = 'demo.psycaptr@gmail.com';

$sql = "SELECT * FROM `Message-Utilisateur`";

if($result = $bdd -> query($sql)){
  while($row = $result -> fetch_row()) {
    if($Id == $row[0]){
      $Id = IdGenerator(11);
    }
  }
}

$sql = "INSERT INTO `Message-Utilisateur` (`Id`, `IdUser`, `Nom`, `Prenom`, `Mail`, `Message`, `Date`) VALUES ('$Id','$IdUser','$Nom','$Prenom','$Mail','$Message','$Date')";

if(!$result = $bdd -> query($sql)){
  echo "Échec de la requête SQL : (" . $bdd->errno . ") " . $bdd->error;
}


$bdd -> close();

$header="MIME-Version: 1.0\r\n";
$header.='From:"Psycaptr"support@psycaptr.tk<>'."\n";
$header.='Content-Type:text/html; charset="utf-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';
mail($MailTo, "Message de ".$Prenom." ".$Nom, $Message, $header);
header("Location:/");
exit();
?>
