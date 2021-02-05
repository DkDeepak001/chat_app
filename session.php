 <?php
            // Initialize the session
            session_start();
            
            // Check if the user is already logged in, if yes then redirect him to welcome page
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                // header("location:/welcome.php");
                // exit;
            }
             

            // Include config file
            require_once "db.php";
            
            // Define variables and initialize with empty values
            
            $username = $password = "";
            $username_err = $password_err = "";
            $usernam = ($_POST["usaername"]);
            $password =($_POST["password"]);
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                    // Check if username is empty
                    if(empty(trim($_POST["username"]))){
                        $username_err = "Please enter username.";
                        echo $username_err;
                    } else{
                        $username = trim($_POST["username"]);
                    }
                    if(empty(trim($_POST["password"]))){
                        $password_err = "<br> Please enter your password.";
                        echo $password_err;
                    } else{
                        $password = trim($_POST["password"]);
                    }
                     // Validate credentials
                    if(empty($username_err) && empty($password_err)){
                        // Prepare a select statement
                        $sql = "SELECT uid FROM User_Details WHERE uname = '$username' and upass = '$password'";
                        $result = mysqli_query($link,$sql);
                        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                        $active = $row['active'];  
                        $count = mysqli_num_rows($result);
                        if($count>=1){                            
                            $username = ($_POST["username"]);
                            // Password is correct, so start a new session
                            session_start();
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;                            
                            $_SESSION["username"] = $username; 
                            $_SESSION["id"] = session_id() . uniqid();
                            $sesid = $_SESSION["id"];
                            echo $sesid;  
                            echo "<br>".$username;
                            $ses = "UPDATE `User_Details` SET `session_id` = '$sesid' WHERE  `User_Details`.`uname` = '$username'; ";
                                    if(mysqli_query($link, $ses)){
                                        // header("Location:/login.php");
                                    echo "<br> OK";
                                    header("Location:/welcome.php");
        }                            } else{
                                   echo "invalid username or password";
                                   header("Location:/login.php");

                                }
                            // Redirect user to welcome page
                            //  header("Location:/welcome.php");
                            }else{
                                echo "Invalid username or password";
                                // header("Location:/login.php");

                            }

                    }
                 mysqli_close($link);
                
            ?>






    