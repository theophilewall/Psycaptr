<?php 
	session_start();
    if($_SESSION['login'] != 1 | !isset($_SESSION['login'])) {
      if(!isset($_SESSION['lastActivity']) && (time()-$_SESSION['lastActivity'])>1800){
        $_SESSION = array(); 
		    header('Location:/');
        exit();
      }
    }
    $_SESSION['lastActivity']= time();
?>