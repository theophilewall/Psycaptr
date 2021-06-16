<?php
session_start();

// Lecture, analyse et affichage des trames :

$ch = curl_init();
curl_setopt(
    $ch,
    CURLOPT_URL,
    "http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=G9Dy");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);
echo "Raw Data:<br />";
echo("$data<br /><br />");

$data = substr($data, 91);
$data_tab = str_split($data,33);

// Dernière trame reçue :
$trame = $data_tab[count($data_tab)-2];

echo "Dernière trame reçue : ";
list($typeTrame, $numObjet, $typeRequest, $typeCapteur, $numCapteur, $valeurLue, $numTrame, $checkSum, $year, $month, $day, $hour, $min, $sec) =
    sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
echo("$typeTrame,$numObjet,$typeRequest,$typeCapteur,$numCapteur,$valeurLue,$numTrame,$checkSum,$year,$month,$day,$hour,$min,$sec<br /><br />");

// Listing de toutes les trames
echo "Tabular Data: La Database de l'ISEP contient ",count($data_tab)-1," trames.<br /><br />";
for($i=0, $size=count($data_tab); $i<$size-1; $i++){
    echo "Trame $i: $data_tab[$i]<br />";
    echo "TypeTrame: ",substr($data_tab[$i],0,1)," | NumObjet: ",substr($data_tab[$i],1,4)," | TypeRequete: ",substr($data_tab[$i],5,1)," | TypeCapteur: ",substr($data_tab[$i],6,1)," | NumCapteur: ",substr($data_tab[$i],7,2)," | ValeurLue: ",substr($data_tab[$i],9,4)," | NumTrame: ",substr($data_tab[$i],13,4)," | Checksum: ",substr($data_tab[$i],17,2)," | Annee: ",substr($data_tab[$i],19,4)," | Mois: ",substr($data_tab[$i],23,2)," | Jour: ",substr($data_tab[$i],25,2)," | Heure: ",substr($data_tab[$i],27,2)," | Minutes: ",substr($data_tab[$i],29,2)," | Secondes: ",substr($data_tab[$i],31,2);
    echo "<br /><br />";
}

// Connexion à la database
require('connectDatabase.php'); //Connexion à la database

// Dernière trame reçue :
$trame = $data_tab[count($data_tab)-2];
echo "Dernière trame reçue : ";
list($typeTrame, $numObjet, $typeRequest, $typeCapteur, $numCapteur, $valeurLue, $numTrame, $checkSum, $year, $month, $day, $hour, $min, $sec) =
    sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
echo("$typeTrame,$numObjet,$typeRequest,$typeCapteur,$numCapteur,$valeurLue,$numTrame,$checkSum,$year,$month,$day,$hour,$min,$sec<br /><br />");

$sql = 'SELECT * FROM `Trames`';

if($result = $bdd -> query($sql)){
    while($row = $result -> fetch_row()) {
        if(""=="$row") {
            break;
        }
    }
    if ($bdd -> query($sqlAjout)) {
        echo "Ajout OK";
    } 
    else {
        echo "Error: " . $sqlAjout . "<br>" . $conn->error;
    }
}
$result -> free_result();
$bdd -> close();
exit();
?>