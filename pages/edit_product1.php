<?php
include("database.php");

if(isset($_POST["update"]))
    {
        try{
            if(!empty($_POST["p_name"]) && !empty($_POST["price"]) 
            // && !empty($_POST["product_id"])
        )
            {
                //get username and password
                $id = $_POST["id"];
                $p_name = $_POST["p_name"];
                $price = $_POST["price"];
                // $product_id1 = $_POST["product_id"];
                // echo $username . "<br>". $password;
                //save it on database
                $sql = "UPDATE products SET p_name = '$p_name', price = '$price' WHERE id = $id";
                mysqli_query($conn,$sql);
                // echo "You are Signed Up!";
                header("Location:product_management.php");
                
            }
            else{
                echo "missing Product Name/Price";
            }
        }
        //for duplicate username error(username is unique)
        catch(mysqli_sql_exception){
            echo "error";
        }
    }


mysqli_close($conn);
?>