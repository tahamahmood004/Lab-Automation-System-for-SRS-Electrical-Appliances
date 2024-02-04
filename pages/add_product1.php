<?php
include("database.php");

    if(isset($_POST["add"]))
    {
        try{
            if(!empty($_POST["p_name"]) && !empty($_POST["price"])
            //  && !empty($_POST["image"])
            )
            {
                $p_name = $_POST["p_name"];
                $price = $_POST["price"];
                $product_id = mt_rand(1000000000,9999999999);
                // var_dump($product_id);
                $add_product = "INSERT INTO  products(p_name,price,product_id) VALUES ('$p_name',$price,$product_id)";
                mysqli_query($conn,$add_product);
                header("Location:product_management.php");
            }
            else{
                echo "Missing Product Name/Price";
            }
        }
        //for duplicate username error(username is unique)
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    mysqli_close($conn);
?>