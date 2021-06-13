<?php 
	session_start();

    require('algo.php'); //Ajout de la méthode convertInput()
    require('connectDatabase.php'); //Connexion à la database

    // 
    //Script qui permet d'ajouter une question et sa réponse
    // 

    if(isset($_POST['addFAQ'])){
        $Id     = IdGenerator(10); //Un Id est généré par une méthode
        $Question    = convertInput($_POST['Question']);
        $Reponse = convertInput($_POST['Reponse']);
        $Question = str_replace("'","''",$Question);
        $Reponse = str_replace("'","''",$Reponse);
        $_POST['addFAQ'] = array(); 


        $sql = 'SELECT * FROM FAQ';
        if(!$result = $bdd -> query($sql)){
            echo "Échec de la requête SQL : (" . $bdd->errno . ") " . $bdd->error;
        }
        else {
            while($row = $result -> fetch_row()) {
                while($Id == $row[0]){
                    $Id = IdGenerator(10);
                }
            }
        }
        
        $sql = "INSERT INTO `FAQ` (`Id`, `Question`, `Reponse`) VALUES ('$Id','$Question','$Reponse')";

        if(!$bdd -> query($sql)){
            echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
            echo " |".$Id;
        }else {
            header("Location:../Ressources/Pages/modifyFAQ");
            exit();
        }
        $bdd -> close();
        exit();
    }


    //
    //Script qui permet de modifier les informations d'un utilisateur
    // 

    if(isset($_POST['modifyFAQ'])){
        $Id     = convertInput($_POST['Id']);
        $Question    = convertInput($_POST['Question']);
        $Reponse = convertInput($_POST['Reponse']);
        $Question = str_replace("'","''",$Question);
        $Reponse = str_replace("'","''",$Reponse);

        $_POST['modifyFAQ'] = array(); 

        $sql = "UPDATE FAQ SET Question='$Question', Reponse='$Reponse' WHERE Id='$Id'";

        if(!$bdd -> query($sql)){
            echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
            echo " |".$Id;
        } else {
            header("Location:../Ressources/Pages/modifyFAQ");
            exit();
        }

        $result -> free_result();
        $bdd -> close();
        exit();
    }

    if(isset($_POST['removeFAQ'])){
        $Id     = $_POST['Id'];
        $_POST['removeFAQ'] = array(); 

        $sql = "DELETE FROM FAQ WHERE Id='$Id'" ;
        if(!$bdd -> query($sql)){
            echo "Échec lors de la création du compte : (" . $bdd->errno . ") " . $bdd->error;
            echo " |".$Id;
        } else {
            header("Location:../Ressources/Pages/modifyFAQ");
            echo $Id;
            exit();
        }

        $result -> free_result();
        $bdd -> close();
        exit();
    }


    $sql = 'SELECT * FROM FAQ';

    if(!$result = $bdd -> query($sql)){
        echo "Échec de la requête SQL : (" . $bdd->errno . ") " . $bdd->error;
    }
    
    echo '<h2>Liste des questions et réponses</h2>';

    $count = 0;
    // Recuperation des resultats
    while($row = $result -> fetch_row()){
        $Id=$row[0];
        $Question=$row[1];
        $Reponse = $row[2];
        $count+=1;

        //On génère une ligne qui correpond à chaque utilisateurs
        echo '<form class="container-form" action="../../PHP/modifyFAQAlgo.php" method="POST">';
        echo '<div class="count_container">';
        echo '<h3 class="count">#'.$count.'</h3>';
        echo '</div>';
        echo '<div class="inputs_container">';
        echo '<div class="line-container user-container">';
        echo '<input class="question-container" type="text" name="Question" value="'.$Question.'" required/>';
        echo '<div class="valider_changement modify"><button type="submit" name="modifyFAQ"><i class="fa fa-check"></i></button></div>';
        echo '<div class="valider_changement remove"><button type="submit" name="removeFAQ"><i class="fa fa-trash"></i></button></div>';
        echo '</div>';
        echo '<input class="question-container invisible" readonly="readonly" type="text"  name="Id" value="'.$Id.'" required/>';
        echo '<textarea class="reponse-container" type="text" name="Reponse" placeholder="Contenu de la réponse " required>'.$Reponse.'</textarea>';
        echo '</div>';
        echo '</form>';
    }

    $result -> free_result();

	$bdd -> close();
    exit();
?>
