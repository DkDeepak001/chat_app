
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
  <link rel="stylesheet" href="css/reg.css">
   <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Condensed:ital@1&display=swap" rel="stylesheet"> </head>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Arapey&family=Kalam&display=swap" rel="stylesheet"> 
<!-- MDB -->
<link rel="stylesheet" href="css/materialbtn.css">
<body>
    <div class="mainwrapper">
    <div class="wrapper">
        <h2 class="siginUP">SIGN UP</h2>
        <form action="" method="POST">
                  
      <div class="group">      
      <input type="text" name="username" required >
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Username</label>
    </div>
          
    <div class="group">      
      <input type="password"  name="password" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Password</label>
    </div>
        <div class="group">      
      <input type="password" name="confirm_password" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Confirm Password</label>
    </div>
      <div class="group">      
      <input type="email" name="email" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Email</label>
    </div>    
           
   <div class="select">
                    <select name="year" id="year" class="select-text" required>
					<option  name="year" id="year" disabled selected></option>
                    <option  name="year" id="year">1</option>
                    <option  name="year" id="year">2</option>
                    <option  name="year" id="year">3</option>
                    </select>
                    <span class="select-highlight"></span>
					<span class="select-bar"></span>
					<label class="select-label">Year</label>
            </div>
             <div class="select">
                    <select name="Dept" id="Dept" class="select-text" required>
                   <option  name="Dept" id="Dept" disabled selected></option>
						<option  name="Dept" id="Dept">Bsc(CT)</option>
						<option  name="Dept" id="Dept">Bsc(CS)</option>
						<option  name="Dept" id="Dept">Bsc(IT)</option>
                    </select>
                    <span class="select-highlight"></span>
					<span class="select-bar"></span>
					<label class="select-label">Dept</label>
            </div>
             <div class="select">
                    <select name="sec" id="sec" class="select-text" required>
                   <option  name="Dept" id="Dept" disabled selected></option>
                    <option name="sec" id="sec">A</option>                    
                    <option name="sec" id="sec">B</option>                    
                    </select>
                    	<span class="select-highlight"></span>
					<span class="select-bar"></span>
					<label class="select-label">Sec</label>
            </div> 
                
            <div class="btn-grp">
                <button type="submit"class="btn btn-warning btn-rounded" value="Submit">submit</button>
                <button type="reset"   class="btn btn-outline-danger btn-rounded"  data-mdb-ripple-color="dark" value="Reset">reset</button>
            </div>
                    </form>

</div>
            <div class="wrapper2">
                <h2>Welcome Back!</h2>
                <h4>To Keep Connect With Us Please Login 
                    With Your Personal info
                </h4>
                <a href="login.php" >
     <button class="btn btn-outline-dark btn-rounded"  data-mdb-ripple-color="dark">Login </button>
</a>    </div>    
    </div>
   <?php
        require_once "db.php";
        $username = $password = $confirm_password = $email = $year = $dept = $sec =  "";
        $username_err = $password_err = $confirm_password_err = $email_err = $select_err="" ;

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $username =($_POST["username"]);
            $email = ($_POST["email"]);
             if(empty(trim($_POST["username"]))){
               $username_err = "Please enter a username.";
               echo $username_err;
                }else{                
                  
                $sql_u = "SELECT * FROM User_Details WHERE uname='$username'";
                $sql_e = "SELECT * FROM User_Details WHERE email='$email'";
                $res_u = mysqli_query($link, $sql_u);
                $res_e = mysqli_query($link, $sql_e);

                if (mysqli_num_rows($res_u) > 0) {
                $name_error = "Sorry... username already taken"; 
                echo "<br>".$name_error;
                }else if(mysqli_num_rows($res_e) > 0){
                $email_errors = "Sorry... email already taken"; 	
                echo "<br>".$email_errors;	
                }      
            }
                 if(empty(trim($_POST["password"]))){
                            $password_err = "Please confirm password.";     
                            echo "<br>".$password_err;
                        } else{
                            $password = trim($_POST["confirm_password"]);
                            echo "<br>".$password_err;
                        }

                        // Validate confirm password
                        if(empty(trim($_POST["confirm_password"]))){
                            $confirm_password_err = "Please confirm password.";     
                            echo "<br>".$confirm_password_err;
                        } else{
                            $confirm_password = trim($_POST["confirm_password"]);
                            echo "<br>".$confirm_password_err;
                            if(empty($password_err) && ($password != $confirm_password)){
                                $confirm_password_err = "Password did not match.";
                                echo $confirm_password_err;
                            }
                        }

                        //validate Email
                        if(strpos( ($_POST["email"]),"@skasc.ac.in") == FALSE){
                            $email_err = "Invalid Email";
                            echo "<br>". $email_err;
                        }else{

                        }
                        //Checking Dept Year Sec
                        $year = ($_POST["year"]);
                        $dept = ($_POST["Dept"]);
                        $sec = ($_POST["sec"]);
                        if (strpos( $year,"select") !== FALSE || strpos( $dept,"select") !== FALSE || strpos( $sec,"select") !== FALSE){
                            $select_err = " Please select data";
                            echo "<br>". $select_err;
                        }else{
                        }
                         if(empty($username_err) && empty($name_error) && empty($email_errors) && empty($password_err) && empty($confirm_password_err) && empty($email_err) && empty($select_err)){
                            $sql = "INSERT INTO `User_Details` (`uid`, `uname`, `upass`, `email`, `year`, `dept`, `sec`,`session_id`) 
                            VALUES (NULL, '$username', '$password', '$email', '$year', '$dept', '$sec','')";
                               if(mysqli_query($link, $sql)){
                                header("Location:/login.php");
                            } else{
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                }
                        }
                         else{
                             echo " <br> Please Fill All Details :)";

                         }

        }
    ?>
    <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
></script>
</body>
</html>