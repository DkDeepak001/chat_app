<?php
   // require_once "session.php";
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
   
    $user_message = ($_POST["message"]);
 
    // Create connection
    $link = mysqli_connect($servername, $username, $password,$db_name);
    $submit =($_POST["send"]);
      $lastsql = "SELECT * FROM `chatroom` WHERE `dept` = '$dept'";
              $lresult = mysqli_query($link, $lastsql);
                if (mysqli_num_rows($lresult) > 0) {
                  while($row = mysqli_fetch_assoc($lresult)) {
                    $lmsg_owner = $row["uname"];
                    $lmessage = $row["message"];
                    $ltime =$row["time"];
                    $lread =$lmsg_owner." ". $lmessage; 
                  }
              } else {
            echo "0 results";
              } 
    $cread = $sesusername ." ".$user_message;
 
//inserting masg into db
    if((strpos($submit,"send") !== FALSE) || strpos($user_message," ") !== FALSE){  
          if($lread !== $cread){
          $insert = "INSERT INTO `chatroom` (`uname`, `time`, `message`, `dept`) VALUES ('$sesusername', CURRENT_TIMESTAMP, '$user_message', '$dept'); ";
          if(mysqli_query($link,$insert)){
              $sql = "SELECT * FROM `chatroom` ORDER BY `chatroom`.`time` DESC";
              $result = mysqli_query($link, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                    $msg_owner = $row["uname"];
                    $message = $row["message"];
                    $time =$row["time"];
                    $read = "<div id='msgDiv'><p id='msggOwner'>" .$msg_owner."</p><p id='msgTime'> " .$time."</p><p id='msgg'>".$message ."</p> </div>"; 
                    echo $read;

                  }
              } else {
            echo "0 results";
              }   
      }
    }
  }else{
     $sql = "SELECT * FROM `chatroom` WHERE `dept` = '$dept' ";
              $result = mysqli_query($link, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                    $msg_owner = $row["uname"];
                    $message = $row["message"];
                    $time =$row["time"];
                    $read = "<div id='msgDiv'><p id='msggOwner'>" .$msg_owner."</p><p id='msgTime'> " .$time."</p><p id='msgg'>".$message ."</p> </div>"; 
                    echo $read;

                  }
              } else {
            echo "0 results";
              }    
    }  
}
         ?>