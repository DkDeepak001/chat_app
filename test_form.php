 <?php
                $db_server ="localhost";
                $db_username = 'chat_app';
                $db_pass= "Password#123";
                $db_dbname = "chat_app"; 
                $con = mysqli_connect($db_server,$db_username,$db_pass,$db_dbname);                
               
                $username = $password = "";
                $username_err = $password_err = "";
                $username = ($_POST["uName"]);
                echo $username;
                
                ?>