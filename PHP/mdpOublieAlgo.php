<?php
session_start();
require('algo.php'); //Connexion à la database
require('connectDatabase.php'); //Connexion à la database


if(isset($_POST['recup_submit'])) {
   $Mail = convertInput($_POST['recup_mail']);

   $sql = "SELECT * FROM Utilisateurs WHERE Mail='$Mail'";

   if(!$result = $bdd -> query($sql)){
      echo "Échec de la requête SQL : (" . $bdd->errno . ") " . $bdd->error;
   }

   $num_row = mysqli_num_rows($result);

   $_SESSION['Msg'] = '';

   if($num_row==0){
      $_SESSION['Msg'] = "Aucun compte n'est associé à ce mail";
      header("Location:../Ressources/Pages/mdpOublie");
      exit();
   }

   $result -> free_result();

   $sql = 'SELECT * FROM Utilisateurs';

   if($result = $bdd -> query($sql)) {
      while($row = $result -> fetch_row())  {
         if($Mail == $row[1]) {
            $Id = $row[0];
            $Nom = $row[4];
            $Prenom = $row[5];
         }
      }
   }

   $result -> free_result();

   $recup_code = IdGenerator(8);

   $header="MIME-Version: 1.0\r\n";
   $header.='From:"Psycaptr"<support@psycaptr.tk>'."\n";
   $header.='Content-Type:text/html; charset="utf-8"'."\n";
   $header.='Content-Transfer-Encoding: 8bit';
   $message = '
   <html>
   <head>
       <title>Récupération de mot de passe - Psycaptr</title>
       <meta charset="utf-8" />
   </head>
   <body>
       <font color="#303030";>
       <div align="center">
         <table width="600px">
             <tr>
             <td align="center">
               <img src ="https://psycaptr.tk/Ressources/Images/Logo_simple.png" height="70px" width="70px"><br><br>
               <div align="center">Bonjour <b>'.$Prenom.' '.$Nom.'</b>,</div>
               <div align="center"> Voici votre code de récupération: <b>'.$recup_code.'</b>
               <a href = "https://psycaptr.tk/Ressources/Pages/nouveauMdp?Id='.$Id.'&recup_code='.$recup_code.'">Cliquez-ici pour réinitialiser votre mot de passe"</a>
               A bientôt sur <a href="https://psycaptr.tk">Psycaptr</a> ! </div>
               
             </td>
             </tr>
             <tr>
             <td align="center">
               <font size="2">
                   Ceci est un email automatique, merci de ne pas y répondre.
               </font>
             </td>
             </tr>
         </table>
       </div>
       </font>
   </body>
   </html>
   ';

   mail($Mail, "Récupération de mot de passe - Psycaptr", $message, $header);

   // Pas ici, après.


   // --------------  NE FONCTIONNE PAS RIEN N APPARAIT DANS LA BDD ------------------------

   $sql = "SELECT * FROM RecupMotDePasse WHERE Id='$Id'";

   if(!$result = $bdd -> query($sql)){
      echo "Échec de la requête SQL : (" . $bdd->errno . ") " . $bdd->error;
   }

   $num_row = mysqli_num_rows($result);
   $result -> free_result();

   if($num_row>=1){     //Supérieur uniquement par précaution en theorie ça ne dépasse pas 1
      $sql = "UPDATE RecupMotDePasse SET Code = '$recup_code' WHERE Id = '$Id'";
      if(!$result = $bdd -> query($sql)){
         echo "Échec de la requête SQL : (" . $bdd->errno . ") " . $bdd->error;
      }

      header("Location:../Ressources/Pages/mailEnvoye");
      $result -> free_result();
      $bdd -> close();
      exit();
   }
   else{
      $sql = "INSERT INTO `RecupMotDePasse` (`Id`, `Mail`, `Code`) VALUES ('$Id','$Mail','$recup_code')";
   }

   if(!$result = $bdd -> query($sql)){
      echo "Échec de la requête SQL : (" . $bdd->errno . ") " . $bdd->error;
   }

   header("Location:../Ressources/Pages/mailEnvoye");
   $result -> free_result();
   $bdd -> close();
   exit();
}
// ----  JE PENSE NE FONCTIONNE PAS CAR VALIDATION EN BUTTON ET PAS INPUT ET DONC BAH $POST....(?) ------------------------


if(isset($_POST['mdp_submit'])) {
   $Id = $_SESSION['IdRecover'];
   $Code = $_SESSION['CodeRecover'];
   

   echo 'Identifiant : '.$Id;
   echo 'Code : '.$Code;
   $Mdp    = convertInput($_POST['Mdp']);
   $MdpBis = convertInput($_POST['MdpBis']);

   if($MdpBis != $Mdp){
      header('Location:../Ressources/Pages/nouveauMdp');
      echo 'Le mot de passe est différent';
      $_SESSION['Msg'] = 'Code invalide';
      exit();
   }

   $CryptedMdp = password_hash($Mdp, PASSWORD_DEFAULT);

   $sql = "SELECT * FROM RecupMotDePasse WHERE Id='$Id' AND Code='$Code'";
   if(!$result = $bdd -> query($sql)){
      echo "Échec de la requête SQL : (" . $bdd->errno . ") " . $bdd->error;
   }
   $num_row = mysqli_num_rows($result);

   if($num_row != 1){
      while($row = $result -> fetch_row()){
         $Id=$row[0];
         $Code2=$row[2];
          
         echo $Id;
         echo $Code2;
     }
      echo 'probleme de row askip';
      echo 'nombre de row '.$num_row;

      // header("Location:../Ressources/Pages/nouveauMdp");
      $_SESSION['Msg'] = 'Code invalide';
      $bdd -> close();
      exit();
   }

   $sql = "UPDATE Utilisateurs SET CryptedMdp='$CryptedMdp' WHERE Id='$Id'";
   
   if(!$result = $bdd -> query($sql)){
      echo "Échec de la requête SQL : (" . $bdd->errno . ") " . $bdd->error;
   }

   $sql = "DELETE * FROM RecupMotDePasse WHERE Id='$Id' AND Code='$Code";

   if(!$result = $bdd -> query($sql)){
      echo "Échec de la requête SQL : (" . $bdd->errno . ") " . $bdd->error;
   }

   header("Location:../");
   $result -> free_result();
   $bdd -> close();
   exit();
}

// if(isset($_POST['mdp_submit'],$_POST['new_mdp'],$_POST['new_mdp_conf']){
//    if(!empty($_POST['new_mdp']) && !empty($_POST['new_mdp_conf'])) {
//       //ajouter à la bdd
//    } 
//    else{
//       $_SESSION['Msg'] = 'Les mots de passe ne correspondent pas';
//    }
// }
?>