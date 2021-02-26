<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

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
    echo   $row["username"] . $row["time"].$row["message"]. "<br>";
  }
} else {
  echo "0 results";
}
   


?>
<form action="" method="POST"> 
<label for="ans" >answer</label>
<input name="ans" >
<button>post</button>
</form>


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
                      $read = $msg_owner." ".$message."<br>" ;
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
                      $read = $msg_owner." ".$message."<br>" ;
                      echo $read; 
                      }
                    }

}
$_POST['ans']= " ";

?>

</body>
</html>