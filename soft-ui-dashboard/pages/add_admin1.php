<?php
include("database.php");
    if(isset($_POST["add"]))
    {
        try{
            if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"]))
            {
                //get username and password
                $name = $_POST["name"];
                $email = $_POST["email"];
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                // echo $username . "<br>". $password;
                //save it on database
                $admin_reg = "INSERT INTO admins(name , email , password) VALUES ('$name' ,'$email', '$password')";
                mysqli_query($conn, $admin_reg);
                // echo "You are Signed Up!";
                header("Location:admin_profiles.php");
                
            }
            else{
                echo "missing name, username or password";
            }
        }
        //for duplicate username error(username is unique)
        catch(mysqli_sql_exception){
            echo "this username is already taken";
        }
    }

    mysqli_close($conn);
?>