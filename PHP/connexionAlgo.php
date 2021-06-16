<?php
	require_once('algo.php');
	session_start();

	$_SESSION = array(); 

	$Mail = convertInput($_POST['Mail']);
	$Mdp  = convertInput($_POST['Mdp']);

	$_SESSION['Mail']=$Mail;

	$servername = 'localhost';
	$bddname = 'ttwawain_Psycaptr';
	$username = 'theophile';
	$password = 'psycaptrisep2023';

	$bdd = new mysqli($servername, $username, $password, $bddname);
	if($bdd->connect_errno){
		echo 'Error connexion : impossible to access the data base' . $bdd -> connect_error;
		exit();
	}

	$sql = 'SELECT * FROM Admin';

	if($result = $bdd -> query($sql)){
		while($row = $result -> fetch_row()) {
			if($Mail == $row[0] && $Mdp == $row[1]){
				$_SESSION['login'] = 1;
				$_SESSION['userType'] = 'admin';
				$_SESSION['lastActivity'] = time();
				$_SESSION['Mail'] = $row[0];
				$_SESSION['Nom'] = $row[2];
			    $_SESSION['Prenom'] = $row[3];
				header('Location:../Ressources/Pages/dashboard');
				exit();
			}
		}
	}

	$sql = 'SELECT * FROM Utilisateurs';

	if($result = $bdd -> query($sql)) {
		while($row = $result -> fetch_row())  {
			if($Mail == $row[1] && password_verify($Mdp, $row[2])) {
				$_SESSION['IdMedecin'] = $row[0];
				$_Session['Mail'] = $row[1];
				$_SESSION['Nom'] = $row[4];
			    $_SESSION['Prenom'] = $row[5];

				$_SESSION['login'] = 1;
				$_SESSION['userType'] = 'medecin';
				$_SESSION['lastActivity'] = time();
				
				// Récupère l'IP de l'utilisateur et la crypte
				$IP = password_hash($_SERVER['REMOTE_ADDR'], PASSWORD_DEFAULT);

				// CREER ICI UNE CONDITION POUR VERIFIER SI L'UTILISATEUR N'EST BANNIT

				//Récupère la dernière adresse IP utilisée pour se connecter
				if($IP != $row[6]){
					$sql = "UPDATE Utilisateurs SET IP='$IP' WHERE Id='$row[0]'";
					$result -> free_result();

					if(!$bdd -> query($sql)){
						echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
						echo " |".$Id;
					}
				}
				
				header('Location:../Ressources/Pages/dashboard');
				exit();
			}
		}
	}

	header('Location:../Ressources/Pages/connexion');

	$result -> free_result();

	$bdd -> close();
	exit();
 ?>
