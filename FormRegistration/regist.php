<?php 
require_once('db.php'); 
$login = $_POST['full_name'];
$pass = $_POST['password'];
$email = $_POST['email'];



$_SESSION['user']=[
    "full_name"=>$login["full_name"] 
];



$sql = "INSERT INTO `users` (full_name,password,email) VALUES ('$login', '$pass', '$email')";
if($conn -> query($sql) === TRUE){
    // Початок сесії
session_start();

// Збереження логіну в сесії
$_SESSION['full_name'] = $_POST['full_name'];

// Перенаправлення на сторінку індексу
header('Location: ../GamePage_1/playground.php');
exit();

exit();}
    else{
        echo "Щось пішло не так " . $conn -> error ;
    }
    // ../GamePage_1/playground.php