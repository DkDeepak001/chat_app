
<?php
    session_start();
    $sesusername = $_SESSION["username"];
    $servername = "localhost";
    $username = "chat_app";
    $password = "Password#123";
    $db_name = "chat_app";
    
    // Create connection
    $link = mysqli_connect($servername, $username, $password,$db_name);
    $sql = "SELECT * from User_Details WHERE uname = '$sesusername'";
    $result = mysqli_query($link, $sql);
         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $email = $row["email"];
              $dept = $row["dept"];
              $year = $row["year"];
              $sec = $row["sec"];   
            }
         } else {
            echo "0 results";
         }
         ?>