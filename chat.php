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
    <li><a href="#">Chat</a></li>
    <li><a href="forum.php">Forum</a></li>
    <li><a href="welcome.php">Home</a></li>
    </ul>
    </nav>
<h1>chat</h1>

<br>
<form action="" method="POST" id="contact-form">
<input type="message" name="message" required>
<button type="send" id="send" name="send" value="send" >send</button>
<div class="msggg">
<?php 
 require_once "chatroom.php";
?>
</div>
</form>

<form action="logout.php" method="POST"> 
  <div class="form-group">
  <input type="submit" class="btn btn-primary" value="Logout">
  </div> 
  </form> 
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script>

 $(document).ready(function() {
 	 $(".msggg").load("chatroom.php");
   var refreshId = setInterval(function() {
      $(".msggg").load('chatroom.php');
   }, 2400);
   $.ajaxSetup({ cache: false });
});
</script>

    </body>
</html>