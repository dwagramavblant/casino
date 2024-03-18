
<?php
session_start();
if (isset($_SESSION['full_name'])) {
    
} else {
    echo "You are not logged in.";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   
    <link rel="stylesheet" href="/style/stylecard.css">
    <link rel="stylesheet" href="/style/styleplay.css">
    <title>Document</title>
</head>
<body>
<div class="navbar">

        <div class="balance">
            Баланс 
        <?= $_SESSION['balance'] ?> $
        </div>
        <div class="links">
            <button class="top-up-button" onclick="openModal()">Поповнити</button>
            <a href="#"><?= $_SESSION['full_name'] ?></a>
            <a href="/admin/admin.php" class="logout-button">Вийти</a>
        </div>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
           
            <h2>Спосіб поповнення</h2>
<h3>TRC20</h3>
<img src="/FormRegistration/style/PhotoAndOther/qr.jpg" alt="">
<p id="copiableText" class="copiable">TBBWQHit6kJGBqyBYXegtteoVDzoGUqK8q</p>
<button class="copy-button" onclick="copyToClipboard()">Копіювати</button>
           
        </div>
    </div>

    <div class="gif-container">
    <img src="/FormRegistration/style/PhotoAndOther/ebat-mellstroy.gif" alt="">
    <div class="text-overlay">
        <h2>Бонус на перший депозит 100%</h2>
      
    </div>
</div>

<div class="card-container">
    <div class="card">
        <img src="/photo/blackandwhite.jpg" alt="">
        <h2>Black and White</h2>
        <a href="/games/Black_and_white.php" class="button">Play Now</a>
    </div>
    <!-- Додаткові карточки будуть автоматично додаватися тут -->
    <div class="card">
        <img src="/photo/ruletka.jpg" alt="">
        <h2>Roulette</h2>
        <a href="/games/Roulette_game.php" class="button">Play Now</a>

    </div>
    <div class="card">
        <img src="/photo/OIG2.jpg" alt="">
        <h2>Crazy Fruit</h2>
        <a href="/games/Crazy_fruin.php" class="button">Play Now</a>
    </div>
</div>



    
    <script>
function openModal() {
    document.getElementById('myModal').style.display = "block";
}

function closeModal() {
    document.getElementById('myModal').style.display = "none";
}



function copyToClipboard() {
    var text = document.querySelector("#copiableText").textContent; // Змінив getElementById на querySelector для використання класу або ідентифікатора
    var tempInput = document.createElement("textarea");
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);
    alert("Текст скопійовано в буфер обміну!");
}

    </script>
</body>
</html>





