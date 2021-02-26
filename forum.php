<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
        .forum-input{
            margin:0% 0% 0% 10%;
            
        }
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


<br>
<form action="" method="POST">
<textarea type="send" name="form" cols="80" rows="8" class="forum-input" ></textarea>
<button class="btn btn-primary" type="submit" name="submit">Post</button>
</form>

    <?php 
    require_once "forumroom.php";
    
?>
    
<form action="logout.php" method="POST" > 
  <div class="form-group">
  <input type="submit" class="btn btn-danger" value="Logout">
  </div> 
  </form>  
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script> 
  $(document).ready(function() {
 	 $(".forum-message").load("forumroom.php");
   var refreshId = setInterval(function() {
      $(".forum-message").load('forumroom.php');
   }, 2400);
   $.ajaxSetup({ cache: false });
});  
</body>
</html>