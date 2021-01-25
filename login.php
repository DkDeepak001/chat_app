<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log-in</title>
    <link rel="stylesheet" href="/css/login.css">
</head>

<body>
    <div class="land">
        <div class="container">
            <h1>log in</h1>
            <form action="" method="POST">
                <div class="user">
                    <label class=user-head" for="uName">Username </label>
                    <br>
                    <input type="text" name="uName" id="uName">
                </div>
                <div class="password">
                    <label for="Password">password</label>
                    <br>
                    <input type="password" name="Password" id="Password">
                </div>
                <button class="login-btn">log in</button>
                <p>New User? <a href="/signup.php">Register</a></p>
                <?php
                $db_server ="localhost";
                $db_username = 'chat_app';
                $db_pass= "Password#123";
                $db_dbname = "chat_app"; 
                $con = mysqli_connect($db_server,$db_username,$db_pass,$db_dbname);                
               
                $username = $password = "";
                $username_err = $password_err = "";
                
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                
                    // Check if username is empty
                    if(empty(trim($_POST["uName"]))){
                        alert("Enter Your username ");
                    } else{
                        $username = trim($_POST["uName"]);
                    }
                    
                    // Check if password is empty
                    if(empty(trim($_POST["Password"]))){
                    alert("Enter Your Password");
                    } else{
                        $password = trim($_POST["Password"]);
                    }
                    $sql = "select *from register where userName = '$username' and password = '$password'";  
                    $result = mysqli_query($con, $sql);  
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                    $count = mysqli_num_rows($result);  
                    
                    if($count == 1){  
                        header("Location:/home.php");  
                    }  
                    else{  
                        echo "<p>Invalid username or password</p>";
                                        }     
                }  
                
                
                       function alert($data){
                        echo '
                        <style>
                            .alert {
                            padding: 10px;
                            width:100%;
                            background-color: #f44336;
                            color: white;
                            opacity: 0.7;
                            transition: opacity 0.6s;
                            transform : translateY(-830%);
                           

                            }
                            .closebtn {
                            margin-left: 15px;
                            color: white;
                            font-weight: bold;
                            float: right;
                            font-size: 18px;
                            line-height: 20px;
                            cursor: pointer;
                            transition: 0.3s;
                            }

                            .closebtn:hover {
                            color: black;
                            }
                            </style>
                            </head>
                            <body>

                            <div class="alert">
                            <span class="closebtn">&times;</span>  
                            <strong>'.$data .'!</strong> 
                            </div>


                            <script>
                            var close = document.getElementsByClassName("closebtn");
                            var i;

                            for (i = 0; i < close.length; i++) {
                            close[i].onclick = function(){
                                var div = this.parentElement;
                                div.style.opacity = "0";
                                setTimeout(function(){ div.style.display = "none"; }, 600);

                            }
                            }
                            </script>';
                    }
                ?>
            </form>

          </div>
    </div>

</body>

</html>