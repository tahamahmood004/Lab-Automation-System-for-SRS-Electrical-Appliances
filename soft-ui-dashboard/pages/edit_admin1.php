<?php
include("database.php");
    if(isset($_POST["update"]))
    {
        try{
            if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"]))
            {
                //get username and password
                $id = $_POST["id"];
                $name = $_POST["name"];
                $email = $_POST["email"];
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                // echo $username . "<br>". $password;
                //save it on database
                $sql = "UPDATE admins SET name = '$name', email = '$email', password = '$password' WHERE id = $id";
                mysqli_query($conn,$sql);
                // echo "You are Signed Up!";
                header("Location:admin_profiles.php");
                
            }
            else{
                echo "missing name , email or password";
            }
        }
        //for duplicate username error(username is unique)
        catch(mysqli_sql_exception){
            echo "this username is already taken";
        }
    }

    mysqli_close($conn);
?>