<?php
// Параметри підключення до бази даних
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// Підключення до бази даних
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка підключення
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Отримання даних з форми адмін-панелі
$full_name = $_POST['full_name'];
$balance = $_POST['balance'];

// Запит до бази даних для збереження даних
// Перевірка, чи не порожнє значення $full_name та $amount
if (!empty($full_name) && is_numeric($balance)) {
    // Запит до бази даних для збереження даних
    $sql = "INSERT INTO balance (full_name, balance) VALUES ('$full_name', '$balance')";
    session_start();

// Збереження логіну в сесії
$_SESSION['balance'] = $_POST['balance'];
    
    if ($conn->query($sql) === TRUE) {
        echo "Дані успішно збережені.";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Помилка: некоректні дані для вставки.";
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Адмін-панель</title>
</head>
<body>
    <h1>Адмін-панель</h1>
    <form action="" method="post">
        <label for="full_name">Повне ім'я:</label>
        <input type="text" id="full_name" name="full_name" required><br>
        <label for="balance">Сума для поповнення:</label>
        <input type="number" id="balance" name="balance" required><br>
        <button type="submit">Поповнити баланс</button>
    </form>
</body>
</html>