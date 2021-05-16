<?php
    include('database.php');

    $id = $_GET['q'];
    $query = "DELETE FROM `contacts` WHERE id = '$id' ";
    if(mysqli_query($database, $query)){
        header("location: index.php");
    } else {
        echo "Cannot Delete";
    };
?>