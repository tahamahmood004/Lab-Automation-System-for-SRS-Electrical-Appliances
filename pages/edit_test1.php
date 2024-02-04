<?php
include("database.php");

if(isset($_POST["update"]))
{
    try{
        if(!empty($_POST["p_name"]) && !empty($_POST["testing_id"]) && !empty($_POST["product_id"]) && !empty($_POST["result"]) )
        {
            //get username and password
            $id = $_POST["id"];
            $p_name = $_POST["p_name"];
            $testing_id = $_POST["testing_id"];
            $product_id = $_POST["product_id"];
            $result = $_POST["result"];

            $sql = "UPDATE testing SET p_name = '$p_name', product_id = $product_id, testing_id = $testing_id, result = $result  WHERE id = $id";
            mysqli_query($conn,$sql);
            header("Location:testing_product.php");

        }
        else{
            echo "missing any field";
        }
    }
    //for duplicate username error(username is unique)
    catch(Exception $e){
        echo $e->getMessage();
    }
}

mysqli_close($conn);
?>