<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
    <title>Document</title>
</head>
<body>
    <nav>
    <ul>
    <li><a href="chat.php">Chat</a></li>
    <li><a href="forum.php">Forum</a></li>
    <li><a href="#">Home</a></li>
    </ul>
    </nav>
    <h1>welcome to chat application</h1>
    
    <?php
    require_once "session.php";
        
    $servername = "localhost";
    $username = "chat_app";
    $password = "Password#123";
    $db_name = "chat_app";
    
    // Create connection
    $link = mysqli_connect($servername, $username, $password,$db_name);


    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");  
    exit;
   }else{
    echo $_SESSION["username"];
    $username = $_SESSION["username"];
    $sql = "SELECT * from User_Details WHERE uname = '$username'";
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
         echo "<br>".$username." ".$email." is from " .$year ." year of " .$dept;
}

   ?>  
 <form action="logout.php" method="POST" > 
  <div class="form-group">
  <input type="submit" class="btn btn-primary" value="Logout">
  </div> 
  </form> 
 
 </body>
</html>