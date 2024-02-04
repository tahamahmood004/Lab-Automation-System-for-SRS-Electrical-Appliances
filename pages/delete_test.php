<?php 
include("database.php");
if(isset($_GET["deleteid"])){
    $id = $_GET["deleteid"];
    $sql = "DELETE FROM `testing` WHERE id =$id";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location:testing_product.php");
    }
    else{
        echo"error";
    }
}
mysqli_close($conn);
?>