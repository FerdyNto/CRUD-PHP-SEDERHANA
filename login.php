<?php
session_start();
include "config/function.php";
notification();
if (isset($_SESSION['username'])) {
    header("location:dashboard/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main id="login">
        <section id="login">
            <h1>Login Dashboard Blog</h1>
            <form action="core/login.php" method="POST">
                <div>
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </div>

                <input type="submit" value="Masuk" name="masuk">
            </form>
        </section>
    </main>
</body>

</html>