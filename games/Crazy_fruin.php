<?php
session_start();

// Оголошення символів слот-машини
$symbols = array("🍒", "🍊", "🍋", "🍉", "🍇", "🍎");

// Перевірка, чи є користувач у системі та встановлення початкового балансу
if (!isset($_SESSION['balance'])) {
    $_SESSION['balance'] = 100; // Початковий баланс користувача
}

// Перевірка, чи є вже збережена ставка у сесії
if (!isset($_SESSION['betAmount'])) {
    $_SESSION['betAmount'] = 1; // Початкова ставка
}

// Логіка гри
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['spin'])) {
    $betAmount = $_SESSION['betAmount']; // Отримання ставки з сесії
    
    // Перевірка наявності коштів для ставки
    if ($betAmount > $_SESSION['balance']) {
        $result = "Недостатньо коштів для ставки!";
    } else {
        $_SESSION['balance'] -= $betAmount; // Зменшення балансу на суму ставки
        $reels = array();
        for ($i = 0; $i < 3; $i++) {
            $reels[$i] = array_rand($symbols, 3);
        }
        
        // Перевірка виграшу
        if ($reels[0][0] == $reels[1][0] && $reels[0][0] == $reels[2][0]) {
            $_SESSION['balance'] += $betAmount * 10;
            $result = "Ви виграли!";
        } else {
            $result = "Ви програли!";
        }
    }
}

// Збереження ставки при її зміні
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['setBet'])) {
    $_SESSION['betAmount'] = $_POST['betAmount'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crazy fruit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        .reel {
            display: inline-block;
            margin: 20px;
            font-size: 2em;
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
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Crazy fruit</h1>
    <p>Ваш баланс: $<?php echo $_SESSION['balance']; ?></p>

    <div class="reel">
        <?php foreach ($reels[0] as $symbol) : ?>
            <?php echo $symbols[$symbol]; ?>
        <?php endforeach; ?>
    </div>
    <div class="reel">
        <?php foreach ($reels[1] as $symbol) : ?>
            <?php echo $symbols[$symbol]; ?>
        <?php endforeach; ?>
    </div>
    <div class="reel">
        <?php foreach ($reels[2] as $symbol) : ?>
            <?php echo $symbols[$symbol]; ?>
        <?php endforeach; ?>
    </div>

    <form method="post">
        <label for="betAmount">Сума ставки:</label>
        <input type="number" id="betAmount" name="betAmount" min="1" max="<?php echo $_SESSION['balance']; ?>" value="<?php echo $_SESSION['betAmount']; ?>" required>
        <button type="submit" name="setBet">Встановити ставку</button>
    </form>

    <form method="post">
        <button type="submit" name="spin">Spin</button>
    </form>

    <?php if (isset($result)) : ?>
        <p><?php echo $result; ?></p>
    <?php endif; ?>
</body>
</html>