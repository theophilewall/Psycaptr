<?php
session_start();

require('algo.php'); //Ajout de la méthode convertInput()
require('connectDatabase.php'); //Connexion à la database

//
//Script qui permet d'ajouter un utilisateur
//

if($_SESSION['userType']=='medecin'){
    $IdMedecin = $_SESSION['IdMedecin'];
}


/*------------------------------------------------------------------------*/

if(isset($_POST['addUser'])){
    $Id = IdGenerator(7); //Un Id est généré par une méthode

    if($_SESSION['userType']=='admin'){
        $Mdp    = convertInput($_POST['Mdp']);
        $MdpBis = convertInput($_POST['MdpBis']);
        if($MdpBis != $Mdp){
            header("Location:../Ressources/Pages/modifyUsers");
            exit();
        }
        $CryptedMdp = password_hash($Mdp, PASSWORD_DEFAULT);
    }

    $Nom    = convertInput($_POST['Nom']);
    $Prenom = convertInput($_POST['Prenom']);
    $Mail   = convertInput($_POST['Mail']);
    $Date   = date('Y-m-d');
    $Type = convertInput($_POST['Type']);


    if($_SESSION['userType']=='admin'){
        $sql = "SELECT * FROM Utilisateurs";
    }
    else if($_SESSION['userType']=='medecin'){
        $sql = "SELECT * FROM Patient WHERE Id='$IdMedecin'";
    }

    if(!$result = $bdd -> query($sql)){
        echo "Échec de la requête SQL : (" . $bdd->errno . ") " . $bdd->error;
    }

    else {
        while($row = $result -> fetch_row()) {
            // On vérifie que le mail n'est pas déjà utilisé
            if($Mail == $row[1]) {
                header("Location:../Ressources/Pages/modifyUsers");
                exit();
            }
            while($Id == $row[0]){
                $Id = IdGenerator(7);
            }
        }
    }

    $result -> free_result();
    $_POST['addUser'] = array();


    if($_SESSION['userType']=='admin'){
        if($Type == "Medecin"){
            $sql = "INSERT INTO `Utilisateurs` (`Id`, `Mail`, `CryptedMdp`, `Date_Inscription`, `Nom`, `Prenom`) VALUES ('$Id','$Mail','$CryptedMdp','$Date','$Nom','$Prenom')";
        }
        else if($Type == "Administrateur"){
          $sql = "INSERT INTO `Admin` (`Mail`, `Mdp`, `Nom`, `Prénom`) VALUES ('$Mail','$Mdp', '$Nom','$Prenom')";
        }
    }
    else if($_SESSION['userType']=='medecin'){
        $sql = "INSERT INTO `ValidationPatient` (`Id`, `Mail`, `Id_Medecin`, `Date_Inscription`, `Nom`, `Prenom`) VALUES ('$Id','$Mail','$IdMedecin','$Date','$Nom','$Prenom')";
    }
    if(!$bdd -> query($sql)){
        echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
        echo " |".$Id;
    }else {
        header("Location:../Ressources/Pages/modifyUsers");
        exit();
    }
    $bdd -> close();
    exit();
}

/*------------------------------------------------------------------------*/


if(isset($_POST['modifyUser'])){
    $Nom    = convertInput($_POST['Nom']);
    $Prenom = convertInput($_POST['Prenom']);
    $Mail   = convertInput($_POST['Mail']);
    $Id     = convertInput($_POST['Id']);

    if($_SESSION['userType']=='admin'){
        $sql = "UPDATE Utilisateurs SET Mail='$Mail', Nom='$Nom', Prenom='$Prenom' WHERE Id='$Id'";
    }
    else if($_SESSION['userType']=='medecin'){
        $sql = "UPDATE Patient SET Mail='$Mail', Nom='$Nom', Prenom='$Prenom' WHERE Id='$Id'";
    }

    if(!$bdd -> query($sql)){
        echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
        echo " |".$Id;
    } else {
        header("Location:../Ressources/Pages/modifyUsers");
        exit();
    }

    $_POST['modifyUser'] = array();
    $result -> free_result();
    $bdd -> close();
    exit();
}

/*------------------------------------------------------------------------*/

if(isset($_POST['accessUser'])){
    $_SESSION['NomPatient']   = convertInput($_POST['Nom']);
    $_SESSION['PrenomPatient'] = convertInput($_POST['Prenom']);
    $_SESSION['MailPatient']   = convertInput($_POST['Mail']);
    $_SESSION['IdPatient']     = convertInput($_POST['Id']);

    header("Location:../Ressources/Pages/dashboardData");

    $_POST['accessUser'] = array();
    $result -> free_result();
    $bdd -> close();
    exit();
}

//
//Script qui permet de modifier les informations d'un utilisateur
//

if(isset($_POST['modifyUser'])){
    $Nom    = convertInput($_POST['Nom']);
    $Prenom = convertInput($_POST['Prenom']);
    $Mail   = convertInput($_POST['Mail']);
    $Id     = convertInput($_POST['Id']);

    if($_SESSION['userType']=='admin'){
        $sql = "UPDATE Utilisateurs SET Mail='$Mail', Nom='$Nom', Prenom='$Prenom' WHERE Id='$Id'";
    }
    else if($_SESSION['userType']=='medecin'){
        $sql = "UPDATE Patient SET Mail='$Mail', Nom='$Nom', Prenom='$Prenom' WHERE Id='$Id'";
    }

    if(!$bdd -> query($sql)){
        echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
        echo " |".$Id;
    } else {
        header("Location:../Ressources/Pages/modifyUsers");
        exit();
    }

    $_POST['modifyUser'] = array();
    $result -> free_result();
    $bdd -> close();
    exit();
}

/*------------------------------------------------------------------------*/

if(isset($_POST['removeUser'])){
    $Id = convertInput($_POST['Id']);

    if($_SESSION['userType']=='admin'){
        $sql = "DELETE FROM Utilisateurs WHERE Id='$Id'" ;
    }
    else if($_SESSION['userType']=='medecin'){
        $sql = "DELETE FROM Patient WHERE Id='$Id'" ;
    }

    if(!$bdd -> query($sql)){
        echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
        echo " |".$Id;
    } else {
        header("Location:../Ressources/Pages/modifyUsers");
        exit();
    }

    $_POST['removeUser'] = array();
    $result -> free_result();
    $bdd -> close();
    exit();
}

if(isset($_POST['validationUserM'])){
	$Id = convertInput($_POST['Id']);

	$sql = "SELECT * FROM ValidationMedecin WHERE Id='$Id'";

    if(!$result = $bdd -> query($sql)){
        echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
        echo " |".$Id;
    }

	$row = $result -> fetch_row();

	$sql = "INSERT INTO `Utilisateurs` (`Id`, `Mail`, `CryptedMdp`, `Date_Inscription`, `Nom`, `Prenom`, `IP`) VALUES ('$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]', '$row[6]')";

    if(!$bdd -> query($sql)){
    echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
    echo " |".$Id;
    }

    $sql = "DELETE FROM ValidationMedecin WHERE Id='$Id'" ;

    if(!$bdd -> query($sql)){
    echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
    echo " |".$Id;
    }

    header("Location:../Ressources/Pages/modifyUsers");
    $result -> free_result();
    $bdd -> close();
    exit();
}
/*------------------------------------------------------------------------*/

if(isset($_POST['validationUserP'])){
	$Id = convertInput($_POST['Id']);

	$sql = "SELECT * FROM ValidationPatient WHERE Id='$Id'";

    if(!$result = $bdd -> query($sql)){
        echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
        echo " |".$Id;
    }

    $row = $result -> fetch_row();

	$sql = "INSERT INTO `Patient` (`Id`, `Mail`, `Id_Medecin`, `Date_Inscription`, `Nom`, `Prenom`) VALUES ('$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]')" ;

    if(!$bdd -> query($sql)){
        echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
        echo " |".$Id;
    }

    $sql = "DELETE FROM ValidationPatient WHERE Id='$Id'" ;

    if(!$bdd -> query($sql)){
        echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
        echo " |".$Id;
    }

    header("Location:../Ressources/Pages/modifyUsers");
    $result -> free_result();
    $bdd -> close();
    exit();
}

/*------------------------------------------------------------------------*/



/*------------------------------------------------------------------------*/

if(isset($_POST['banUser'])){
	$Id = convertInput($_POST['Id']);

	$sql = "SELECT * FROM Utilisateurs WHERE Id='$Id'";

    if(!$result = $bdd -> query($sql)){
        echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
        echo " |".$Id;
    }

	$row = $result -> fetch_row();

	$sql = "INSERT INTO `BannedUsers` (`Id`, `Mail`, `CryptedMdp`, `Date_Inscription`, `Nom`, `Prenom`, `IP`) VALUES ('$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]', '$row[6]')";

    if(!$bdd -> query($sql)){
        echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
        echo " |".$Id;
    }

    $sql = "DELETE FROM Utilisateurs WHERE Id='$Id'" ;

    if(!$bdd -> query($sql)){
        echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
        echo " |".$Id;
    }

    header("Location:../Ressources/Pages/modifyUsers");
    $result -> free_result();
    $bdd -> close();
    exit();
}

/*------------------------------------------------------------------------*/

if(isset($_POST['unbanUser'])){
	$Id = convertInput($_POST['Id']);

	$sql = "SELECT * FROM BannedUsers WHERE Id='$Id'";

    if(!$result = $bdd -> query($sql)){
        echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
        echo " |".$Id;
    }

	$row = $result -> fetch_row();

	$sql = "INSERT INTO `Utilisateurs` (`Id`, `Mail`, `CryptedMdp`, `Date_Inscription`, `Nom`, `Prenom`, `IP`) VALUES ('$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]', '$row[6]')";

    if(!$bdd -> query($sql)){
        echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
        echo " |".$Id;
    }

    $sql = "DELETE FROM BannedUsers WHERE Id='$Id'" ;

    if(!$bdd -> query($sql)){
        echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
        echo " |".$Id;
    }

    header("Location:../Ressources/Pages/modifyUsers");
    $result -> free_result();
    $bdd -> close();
    exit();
}

if(isset($_POST["declineUserM"])){
	$Id = convertInput($_POST['Id']);



	$sql = "DELETE FROM `ValidationMedecin` WHERE Id='$Id'";

	 if(!$bdd -> query($sql)){
			 echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
			 echo " |".$Id;
	 }

	 header("Location:../Ressources/Pages/modifyUsers");
	 exit();
}

if(isset($_POST["declineUserP"])){
	$Id = convertInput($_POST['Id']);



	$sql = "DELETE FROM `ValidationPatient` WHERE Id='$Id'";

	 if(!$bdd -> query($sql)){
			 echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
			 echo " |".$Id;
	 }

	 header("Location:../Ressources/Pages/modifyUsers");
	 exit();
}

	$bdd -> close();
  exit();
?>
