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
    <li><a href="#">Forum</a></li>
    <li><a href="welcome.php">Home</a></li>
    </ul>
    </nav>
    
    <h1>forum</h1>

    <?php 
    require_once "session.php";
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
   }else{

   }
    echo $_SESSION["username"];
?>



<form action="logout.php" method="POST" > 
  <div class="form-group">
  <input type="submit" class="btn btn-primary" value="Logout">
  </div> 
  </form>     
</body>
</html>