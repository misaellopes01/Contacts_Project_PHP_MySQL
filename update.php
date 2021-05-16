<?php
include('database.php');

$id = $_GET['q'];

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$query = "UPDATE `contacts` SET name = '$name', email = '$email', phone = '$phone' WHERE id = '$id' ";

if(mysqli_query($database, $query)){
    header("location: index.php");
} else {
    echo 'Failed to update';
};


?>