<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="/style/stylecard.css">
    <link rel="stylesheet" href="/style/styleplay.css">
    <title>Registration</title>
</head>
<body>
<!-- <img src="/style/PhotoAndOther/4963909.jpg" class="background" /> -->
<img src="/FormRegistration/style/PhotoAndOther/quickbooks-backing-you.gif" alt="" class="fullscreen-gif">

<div class="overlay">
        <div class="header">
            <h1 class="name">Fastwin Casino</h1>
       </div>
</div>

<section class="wrapper">
        <div class="form singup">
            <header>Signup</header>
            <form action="regist.php" method="post">
                <input type="text" placeholder="Full name" name="full_name" required>
                <input type="email" placeholder="Email address" name="email" required>
                <input type="password" minlength="5" maxlength="10" placeholder="Password" name="password" required>
                <div class="checkbox">
                    <input type="checkbox" required id="signCheck">
                    <label for="signCheck">I accept all terms & conditions</label>
                </div>
                <input type="submit" value="Signup" />
            </form>
        </div>


        <div class="form login" >
            <header>Login</header>
            <form action="login.php" method="post">
                <input type="email" placeholder="Email address" name="email" required>
                <input type="password" minlength="5" maxlength="10" placeholder="Password" name="password" required>
                <a href="#">Forgot password?</a>
                <input type="submit" value="Login" />
            </form>
        </div>
<script>
    const wrapper = document.querySelector(".wrapper"),
            signupHeader = document.querySelector(".singup header"),
            loginHeader = document.querySelector(".login header");


            loginHeader.addEventListener("click", () => {
                wrapper.classList.add("active");
            })

            signupHeader.addEventListener("click", () => {
                wrapper.classList.remove("active");
            });
     
</script>
    </section>
    <!-- <footer>
    <img src="/style/PhotoAndOther/ebat-mellstroy.gif" alt="">
    </footer> -->
    
</body>
</html>