
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
 <link rel="stylesheet" href="css/login.css">
 <link rel="stylesheet" href="css/materialbtn.css">
</head>
<body>
<div class="mainwrapper">
    <div class="wrapper1">
        <h2>Login</h2>
        <form action="/session.php" method="POST">
                  <div class="group">      
      <input type="text" name="username" >
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Username</label>
    </div>
           <div class="group">      
      <input type="password"  name="password" >
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Password</label>
    </div>
     <input type="submit" class="btn btn-primary btn-rounded" value="Login">
    </form>
           
            </div>
            <div class="wrapper2">
            <h2>Hello Friends!</h2>
            <h4>Enter Your Personal Details and start Journey With us!</h4>
            <a href="registration.php">
            <button class="btn btn-outline-dark btn-rounded">Sign up</button></a>
                            <!-- <p>Don't have an account? <a href="registration.php">Sign up now</a>.</p> -->

            </div>
        
        </div> 
      <?php
      require_once "session.php";
   if($count>=1){  
       echo "ok";
   }else{
       echo "Invalid username or password";
   }
      ?>

    
</body>
</html>