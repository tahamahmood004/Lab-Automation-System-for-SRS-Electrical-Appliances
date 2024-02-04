<?php
include("database.php");
    if(isset($_POST["add"]))
    {
        try{
            if(!empty($_POST["product_id"]))
            {
                $id = $_POST["product_id"];
                $sql = "SELECT `id`, `p_name`, `price`, `product_id` FROM `products` WHERE id = $id";
                $fetch = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($fetch);

                $p_name = $row["p_name"];
                // $product_id = $row["product_id"];  
                $testing_id = mt_rand(100000000000,999999999999);
                $add_product = "INSERT INTO  testing(p_name,product_id,testing_id,result) VALUES ('$p_name', $id, $testing_id,3)";
                mysqli_query($conn,$add_product);
                header("Location:testing_product.php");
            }
            else{
                echo "<script>alert(Missing Product Name/Price);</script>";
            }
        }
        //for duplicate username error(username is unique)
        catch(Exception $e){
            echo "<br><br>No Product Exist with id =".$id."<br><br>". $e->getMessage();
        }
    }

    mysqli_close($conn);
?>