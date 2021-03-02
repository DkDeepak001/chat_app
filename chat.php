<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/welcome.css">
  <link rel="stylesheet" href="css/materialbtn.css">
  <link rel="stylesheet" href="css/chat.css">
  <title>chatroom</title>
</head>
<body>
<nav>
    <ul>
    <li><a href="#">Chat</a></li>
    <li><a href="welcome.php">Home</a></li>
    <li><a href="forum.php">Forum</a></li>
    </ul>
    </nav>
<h1>Chatroom</h1>
<form action="logout.php" method="POST"> 
  <div class="form-group">
  <input type="submit" class="btn btn-primary btn-rounded" value="Logout">
  </div> 
  </form> 
<br>
<div class="msggg" id="myDiv">
<?php 
 require_once "chatroom.php";
?>
</div>
<div class="cont">
<form action="" method="POST" id="contact-form">
<input type="message" name="message" required>
<button type="send" id="send" name="send" value="send"  class="btn btn-primary btn-rounded mar" >send</button>
</form>
</div>

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
<script>
 
setInterval(function myFunction() {
  var elmnt = document.getElementById("myDiv");
  elmnt.scrollTop = 100000000000000;
}, 1000);
</script>

    </body>
</html>