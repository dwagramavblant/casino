<?php
session_start();

// Перевірка, чи є користувач у системі та встановлення початкового балансу
if (!isset($_SESSION['balance'])) {
    $_SESSION['balance'] = 100; // Початковий баланс користувача
}

// Логіка гри
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $betAmount = $_POST['betAmount'];
    $selectedNumber = $_POST['number']; // Обраний номер користувачем

    // Перевірка, чи є достатньо коштів для ставки
    if ($betAmount > $_SESSION['balance']) {
        echo "Недостатньо коштів для ставки!";
    } else {
        // Генерація випадкового числа (від 1 до 10)
        $randomNumber = rand(1, 10);

        // Логіка визначення переможця
        if ($selectedNumber == $randomNumber) {
            $_SESSION['balance'] += $betAmount * 10; // Користувач переміг
            $result = "Ви виграли! Випало число $randomNumber";
        } else {
            $_SESSION['balance'] -= $betAmount; // Користувач програв
            $result = "Ви програли! Випало число $randomNumber";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input[type="number"] {
            padding: 8px;
            margin: 5px 0;
            width: 100px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        p {
            margin-top: 20px;
            color: #333;
        }
    </style>
    <title>Roulette Game</title>
</head>

<body>
    <h1>Roulette Game</h1>
    <p>Ваш баланс: $<?php echo $_SESSION['balance']; ?></p>

    <form method="post">
        <label for="betAmount">Сума ставки:</label>
        <input type="number" id="betAmount" name="betAmount" min="1" max="<?php echo $_SESSION['balance']; ?>" required>
        <br>
        <label for="number">Оберіть номер (від 1 до 10):</label>
        <input type="number" id="number" name="number" min="1" max="10" required>
        <br>
        <button type="submit">Зробити ставку</button>
    </form>

    <?php if (isset($result)) : ?>
        <p><?php echo $result; ?></p>
    <?php endif; ?>
</body>

</html>
