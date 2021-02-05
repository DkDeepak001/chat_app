<?php
require_once "session.php";
 

   echo "<br> username" .$_SESSION["username"];
       echo "<br> session id".$_SESSION["id"];

    $_SESSION["id"] = session_destroy();
    $_SESSION["loggedin"] = FALSE;
    echo "<br> session id".$_SESSION["id"];
       if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");


    // exit;
   }else{
       
   }
?>