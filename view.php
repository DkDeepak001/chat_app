<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/welcome.css">
    <link rel="stylesheet" href="css/materialbtn.css">
    <link rel="stylesheet" href="css/display.css">
    <title>Display</title>
</head>
<body>
    <nav>
    <ul>
    <li><a href="chat.php">Chat</a></li>
    <li><a href="welcome.php">Home</a></li>
    <li><a href="forum.php">Forum</a></li>
    </ul>
    </nav>

<?php

$id = $_GET["myid"];
session_start();
$sesuser =  $_SESSION["username"];
require_once "db.php";
    require_once "fetch.php";
    $servername = "localhost";
    $username = "chat_app";
    $password = "Password#123";
    $db_name = "chat_app";

    $link = mysqli_connect($servername, $username, $password,$db_name);
    $sql = "SELECT * FROM forumroom WHERE uid = '$id' ";
   $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
     // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    $read = "<div class='headAns'><div class='paragrp'><p class='paraname'>". $row["username"] ."</p><p class='paraTime'>" .$row["time"]."</p></div><p class='paraAns'> ".$row["message"]. "</p></div>";
      echo $read;
  }
} else {
  echo "0 results";
}
   


?>
<div class="formAns">
<form action="" method="POST"> 
<label for="ans" >Answer : </label>
<input name="ans" >
<button class="btn btn-primary btn-rounded mar">post</button>
</form>
</div>

<?php
$ans =($_POST['ans']);

  $lastsql = "SELECT * FROM `ans` ORDER BY `ans`.`time` DESC LIMIT 1 ";
              $lresult = mysqli_query($link, $lastsql);
                if (mysqli_num_rows($lresult) > 0) {
                  while($row = mysqli_fetch_assoc($lresult)) {
                    $lmsg_owner = $row["username"];
                    $lmessage = $row["ans"];
                    $ltime =$row["time"];
                    $lid = $row["qid"];
                    $lread =$sesusername."   ". $lmessage; 
                  }
              } else {
              } 
  $cread = $sesusername ."   ".$ans;
 if(($lread !== $cread)&& (!empty($ans)) ){
    $insertsql = "INSERT INTO `ans` (`qid`, `username`, `time`, `ans`) VALUES ('$id', '$sesuser', CURRENT_TIMESTAMP, '$ans');";
       if(mysqli_query($link, $insertsql)){
              $sql = "SELECT * FROM `ans` WHERE `qid` = '$id' ";
              $result = mysqli_query($link, $sql);
                  if (mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)) {
                      $msg_owner = $row["username"];
                      $message = $row["ans"];
                      $time =$row["time"];
                      $year = $row['year'];
                      $id = $row['qid'];
                      $read ="<div class='postAnsuser'><div class=postAnsgrp><p class='postAnsName'>". $msg_owner."</p><p class='postAnsTime'>".$time."</p></div><p class='postAnsMsgg'> ".$message."</p></div>" ;
                      echo $read; 
                  }
                }
 }
}else{
   $sql = "SELECT * FROM `ans` WHERE `qid` = '$id' ";
              $result = mysqli_query($link, $sql);
                  if (mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)) {
                      $msg_owner = $row["username"];
                      $message = $row["ans"];
                      $time =$row["time"];
                      $year = $row['year'];
                      $id = $row['qid'];
                      $read ="<div class='postAnsuser'><div class=postAnsgrp><p class='postAnsName'>". $msg_owner."</p><p class='postAnsTime'>".$time."</p></div><p class='postAnsMsgg'> ".$message."</p></div>" ;
                      echo $read; 
                      }
                    }

}
$_POST['ans']= " ";

?>

</body>
</html>