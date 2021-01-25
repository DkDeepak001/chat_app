<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="/css/signup.css">
</head>

<body>
    <div class="Landing-page">
        <div class="container">
            <form method="POST" >
                <div class="form-design">
                    <h1 class="h1-sigin-in">Create An Account</h1>
                    <div class="name">
                        <div class="first-name">
                            <label for="firstName">fisrtname:</label>
                            <input type="text" name="firstName" id="firstName" required value="<?=$_POST['firstName'];?>">
                        </div>
                        <div class="last-name">
                            <label for="lastName">lastname:</label>
                            <input type="text" name="lastName" id="lastName" required value="<?=$_POST['lastName'];?>">
                        </div>
                    </div>
                    <div class="username">
                        <label for="userName">Username:</label>
                        <input type="text" name="userName" id="userName" required value="<?=$_POST['userName'];?>">
                    </div>
                    <div class="details">
                        <div class="email">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email"  required value="<?=$_POST['email'];?>"  >
                        </div>
                        <div class="Rol-no">
                            <label for="rollNo">Roll No:</label>
                            <input type="text" name="rollNo" id="rollNo" required value="<?=$_POST['rollNo'];?>">
                        </div>
                    </div>
                    <div class="password">
                        <label for="pswd">password:</label>
                        <input type="password" name="pswd" id="pswd">
                    </div>
                    <div class="c-password">
                        <label for="c-password">Re-type:</label>
                        <input type="password" name="c-password" id="c-password" >
                    </div>
                    <div class="dep">
                        <div class="year">
                            <label for="year">Year:</label>
                            <select name="year" id="year">
                                <option ></option>
                                <option>I</option>
                                <option>II</option>
                                <option>III</option>
                            </select>
                        </div>
                        <div class="Department">
                            <label for="dept">Department:</label>
                            <select name="dept" id="dept" >
                                <option></option>
                                <option>Bsc ct</option>
                                <option>Bsc cs</option>
                                <option>Bsc ca</option>
                            </select>
                        </div>
                        <div class="Section">
                            <label for="sec">Section:</label>
                            <select type="text" name="sec" id="sec">
                                <option></option>
                                <option>A</option>
                                <option>B</option>
                            </select>
                        </div>
                    </div>
                    <div class="phone-number">
                        <label for="phno">phone number:</label>
                        <input type="tel" name="phno" id="phno" value="<?=$_POST['phno'];?>">
                    </div>
                    <button class="sign-in" type="submit">sign in</button>
                    <p class=" log-in">Already hav an account? <a href="/login.php">log-in</a></p>
                    <?php 
                    $username = $firstname = $lastname = $email =$rollno = $password = $cpassword = $year = $dept =$sec =$phonenumber ="";

                 

                    $username = ($_POST["userName"]);
                    $firstname = ($_POST["firstName"]);
                    $lastname = ($_POST["lastName"]);
                    $email = ($_POST["email"]);
                    $rollno =($_POST["rollNo"]);
                    $password =($_POST["pswd"]);
                    $cpassword =($_POST["c-password"]);
                    $year =($_POST["year"]);
                    $dept =($_POST["dept"]);
                    $sec =($_POST["sec"]);
                    $phonenumber =$_POST["phno"];
                    
                    
                    if (strpos($email,"skasc.ac.in") !== false){

                    }
                    else{
                        if($email == NULL){

                        }else{
                        alert("Incorrect Email (ex:example@skasc.ac.in)");
                        }
                    }
                    if($password == $cpassword ){
                      
                    }else{
                        if($password == NULL){

                        }else{
                        alert("Password Mismatched");
                        }
                    }
                    if(strlen($phonenumber)== 10){
                    }else{
                       alert("incorrect phone number");
                    }   
                     if ((strpos($email,"skasc.ac.in") !== false)&&($password == $cpassword) &&($password != NULL)&&(strlen($phonenumber)== 10)){
                            $db_server ="localhost";
                            $db_username = 'chat_app';
                            $db_pass= "Password#123";
                            $db_dbname = "chat_app";
                        $con = mysqli_connect($db_server,$db_username,$db_pass,$db_dbname);
                        if (!$con ){
                            echo "connection failed" . mysqli_connect_error();
                            die();
                        }else{
                            echo "connted";
                        }  
                    //  header('Location:/test_form.php');
                     $sql = "INSERT INTO `register` (`uid`, `userName`, `fName`, `lName`, `email`, `rollNo`, `password`, `year`, `department`, `section`, `phonenumber`) VALUES (NULL, '$username', '$firstname', '$lastname', '$email', '$rollno', '$password', '$year', '$dept', '$sec', '978978978' ) ";
                       if (mysqli_query($con, $sql)) {
                           header("Location:/login.php");
                           } else {
                            }
                     }
                     else{
                         alert("password not identified");
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
                            transform : translateY(-1400%);
                           

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
                    function sucess($data){
                        echo '
                        <style>
                            .alert {
                            padding: 10px;
                            width:100%;
                            background-color: #4CAF50;
                            color: white;
                            opacity: 0.7;
                            transition: opacity 0.6s;
                            transform : translateY(-1400%);
                           

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
                </div>

            </form>
        </div>
    </div>

</body>

</html>