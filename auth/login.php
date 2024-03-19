<?php
session_start();
include "../init.php";
// cek apakah sudah login
// kalau sudah login arahkan ke halaman dashboard/index.php
if (isset($_SESSION['username'])) {
    header("location: ../dashboard/index.php");
}

// cek apakah ada pesan error
// kalau ada tampikan pesannya
if (isset($_SESSION['error_message'])) :
?>
    <div class="alert-message alert-error" id="alert">
        <ol>
            <?php
            foreach ($_SESSION['error_message'] as $error) :
                echo "<li>" . $error . "</li>";
            endforeach;
            ?>
        </ol>
    </div>
<?php
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>

    <main id="login">
        <section id="login">
            <h1>Login Dashboard Blog</h1>
            <form action="../core/login.php" method="POST">
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

    <script src="../public/js/script.js"></script>
</body>

</html>