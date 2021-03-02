<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/welcome.css">
<link rel="stylesheet" href="css/materialbtn.css">
<link rel="stylesheet" href="css/forum.css">

    <title>Forum</title>
</head>
<body>
<nav>
    <ul>
    <li><a href="chat.php">Chat</a></li>
    <li><a href="welcome.php">Home</a></li>
    <li><a href="#">Forum</a></li>
    </ul>
    </nav>
    
    <h1>Forum</h1>


<br>
<form action="" method="POST">
<div class="postbox">
<textarea type="send" name="form" cols="80" rows="8" class="forum-input" ></textarea>
<button class="btn btn-primary" type="submit" name="submit">Post</button>
</div>
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