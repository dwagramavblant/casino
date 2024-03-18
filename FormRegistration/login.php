<?php
require_once("db.php");

$pass = $_POST['password'];
$email = $_POST['email'];

if(empty($email) || empty($pass)){
    echo "Ви не можете зайти так як ви не заповнили всі поля";
} else {
    $sql = "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass' ";
    $result = $conn -> query($sql);

    if ($result -> num_rows > 0 ){
        while($row = $result -> fetch_assoc()){
            header('Location: ../GamePage_1/playground.php');
exit();

        }
    } else {
        echo "У вас немає облікового запису! ";
    }
}



