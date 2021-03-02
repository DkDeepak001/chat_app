<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/welcome.css">
  <link rel="stylesheet" href="css/materialbtn.css">
  <link rel="stylesheet" href="css/home.css">  
  <title>Welcome</title>
</head>
<body>
    <nav>
    <ul>
    <li><a href="chat.php">Chat</a></li>
    <li><a href="#">Home</a></li>
    <li><a href="forum.php">Forum</a></li>
    </ul>
    </nav>
    <div class="landingpage">
    <h1>Welcome to chat application</h1>
    
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
         echo "<br><div class='bodymain'>  Username : ".$username." <br> Email ID :  ".$email." <br> Year :  " .$year ." <br> Deptartment :  " .$dept . " <br> Section : " . $sec ; 
}

   ?>  
 <form action="logout.php" method="POST" > 
  <div class="form-group">
  <input type="submit" class="btn btn-primary btn-rounded mar" value="Logout">
  </div> 
  </form> 
</div>
 </body>
</html>