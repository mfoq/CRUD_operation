<?php

    require_once "connect.php";

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];

        $qurey = "DELETE FROM `crud` WHERE `crud`.`id` = $id";

        $result = mysqli_query($con,$qurey);

        if($result){
            header("location:display.php");
        } else {
            die(mysqli_error($con));
        }
}
?>