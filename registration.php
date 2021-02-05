
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control">
                <span class="help-block"></span>
            </div>    
            <div class="form-group ">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"></span>
            </div>
            <div class="form-group ">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="text" name="email" class="form-control">
                <span class="help-block"></span>
            </div>    
            <div class="form-group">
                    <label >year</label>
                    <select name="year" id="year">
                    <option>select</option>
                    <option  name="year" id="year">1</option>
                    <option  name="year" id="year">2</option>
                    <option  name="year" id="year">3</option>
                    </select>
            </div>
             <div class="form-group">
                    <label >Dept</label>
                    <select name="Dept" id="Dept">
                    <option name="Dept" id="Dept">select</option>
                    <option name="Dept" id="Dept">Bsc(CT)</option>                    
                    </select>
            </div>
             <div class="form-group">
                    <label for="sec">Sec</label>
                    <select name="sec" id="sec">
                    <option name="sec" id="sec">select</option>
                    <option name="sec" id="sec">A</option>                    
                    <option name="sec" id="sec">B</option>                    
                    </select>
            </div>
                
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
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
</body>
</html>