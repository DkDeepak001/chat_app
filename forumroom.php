<?php
  require_once "db.php";
    require_once "fetch.php";
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
   }else{
        session_start();
    $sesusername = $_SESSION["username"];
    $servername = "localhost";
    $username = "chat_app";
    $password = "Password#123";
    $db_name = "chat_app";
    $user_message = ($_POST["form"]);


  $link = mysqli_connect($servername, $username, $password,$db_name);
    $submit =($_POST["send"]);
      $lastsql = "SELECT * FROM `forumroom` ORDER BY `forumroom`.`time` DESC LIMIT 1 ";
              $lresult = mysqli_query($link, $lastsql);
                if (mysqli_num_rows($lresult) > 0) {
                  while($row = mysqli_fetch_assoc($lresult)) {
                    $lmsg_owner = $row["username"];
                    $lmessage = $row["message"];
                    $ltime =$row["time"];
                    $lid = $row["uid"];
                    $lread =$lmsg_owner." ". $lmessage; 
                    
                  }
              } else {
              } 
    $cread = $sesusername ." ".$user_message;
 




    if (isset($_POST['submit'])){ 
  if($lread !== $cread){
      $insert = "INSERT INTO `forumroom` (`uid`,`username`, `year`, `dept`, `time`, `message`) VALUES (NULL,'$sesusername', '$year', '$dept', CURRENT_TIMESTAMP, '$user_message')"; 
          if(mysqli_query($link,$insert)){
              $sql = "SELECT * FROM `forumroom` ORDER BY `forumroom`.`time` DESC  ";
              $result = mysqli_query($link, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                    $msg_owner = $row["username"];
                    $message = $row["message"];
                    $time =$row["time"];
                    $year = $row['year'];
                    $id = $row['uid'];
                    $read ="<a  href='view.php?myid=".$id. "'>".$message."<br></a>";
                    echo $read;  
                    $user_message = " ";
                  
                  }
              } else {
            echo "0 results";
              }   
      }
    }   
}
else{
  $sql = "SELECT * FROM `forumroom` ORDER BY `forumroom`.`time` DESC ";
              $result = mysqli_query($link, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                   $msg_owner = $row["username"];
                    $message = $row["message"];
                    $time =$row["time"];
                    $year = $row['year'];
                    $id = $row['uid'];
                    $read ="<a  href='view.php?myid=".$id. "'>".$message."<br></a>";
                    echo $read; 
                    $user_message = " ";
                  }
                }
              }
            }
          
?>