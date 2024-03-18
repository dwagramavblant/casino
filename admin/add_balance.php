<?php
require_once("db.php");

// Перевірка підключення
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Отримання даних з форми адмін-панелі
$username = $_POST['username'];
$amount = $_POST['amount'];

// Оновлення балансу користувача
$sql = "UPDATE users SET balance = balance + $amount WHERE username = '$username'";

if ($conn->query($sql) === TRUE) {
    echo "Баланс користувача $username успішно поповнено на $amount";
} else {
    echo "Помилка поповнення балансу: " . $conn->error;
}

$conn->close();
?>
