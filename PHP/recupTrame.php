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
list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
    sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
echo("$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br /><br />");

// Listing de toutes les trames
echo "Tabular Data: La Database de l'ISEP contient ",count($data_tab)-1," trames.<br /><br />";
for($i=0, $size=count($data_tab); $i<$size-1; $i++){
    echo "Trame $i: $data_tab[$i]<br />";
    echo "TypeTrame: ",substr($data_tab[$i],0,1)," | NumObjet: ",substr($data_tab[$i],1,4)," | TypeRequete: ",substr($data_tab[$i],5,1)," | TypeCapteur: ",substr($data_tab[$i],6,1)," | NumCapteur: ",substr($data_tab[$i],7,2)," | ValeurLue: ",substr($data_tab[$i],9,4)," | NumTrame: ",substr($data_tab[$i],13,4)," | Checksum: ",substr($data_tab[$i],17,2)," | Annee: ",substr($data_tab[$i],19,4)," | Mois: ",substr($data_tab[$i],23,2)," | Jour: ",substr($data_tab[$i],25,2)," | Heure: ",substr($data_tab[$i],27,2)," | Minutes: ",substr($data_tab[$i],29,2)," | Secondes: ",substr($data_tab[$i],31,2);
    echo "<br /><br />";
}



// Checking et ajout si besoin de trames à la DB :



// Connexion à la database
$servername = 'localhost';
$bddname = 'ttwawain_Psycaptr';
$username = 'theophile';
$password = 'psycaptrisep2023';

// Message d'erreur en cas d'accès impossible à la database
$bdd = new mysqli($servername, $username, $password, $bddname);
if($bdd->connect_errno){
    echo 'Error connexion : impossible to access the data base' . $bdd -> connect_error;
    exit();
}


// Ajout ou non de la dernière trame à la DB :


// Dernière trame reçue :
$trame = $data_tab[count($data_tab)-2];
echo "Dernière trame reçue : ";
list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
    sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
echo("$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br /><br />");

$sql = 'SELECT * FROM `Trames`';

if($result = $bdd -> query($sql)){
    while($row = $result -> fetch_row()) {
        if("$row[6]"!="$a") {
            $sqlAjout = "INSERT INTO `Trames` (`TypeTrame`, `NumObjet`, `TypeRequete`, `TypeCapteur`, `NumCapteur`, `ValeurLue`, `NumTrame`, `Checksum`, `Annee`, `Mois`, `Jour`, `Heure`, `Minutes`, `Secondes`) VALUES ($t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec)";
            // $sqlAjout = "INSERT INTO `Trames` (`TypeTrame`, `NumObjet`, `TypeRequete`, `TypeCapteur`, `NumCapteur`, `ValeurLue`, `NumTrame`, `Checksum`, `Annee`, `Mois`, `Jour`, `Heure`, `Minutes`, `Secondes`) VALUES ('1', 'G9Dy', '1', '3', '01', '1234', '0002', '15', '2021', '06', '11', '09', '19', '13')";
            if ($bdd -> query($sqlAjout)) {
                echo "Ajout OK";
            } 
            else {
                echo "Error: " . $sqlAjout . "<br>" . $conn->error;
            }
        }
    }
}

?>