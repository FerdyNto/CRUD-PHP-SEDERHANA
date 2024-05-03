<?php
session_start();

// cek apakah sudah login
if (isset($_SESSION['id_user'])) {
    header("location: ../dashboard/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "../templates/head.php";
    ?>
</head>

<body>
    <?php
    if (isset($_SESSION['error_message']['login_failed'])) :
        $err = $_SESSION['error_message']['login_failed'];
        // echo "<p style='color:red;'>{$err}</p>";
    ?>
        <div class="alert-message alert-error" id="alert">
            <p><?= $err ?></p>
        </div>
    <?php
    else :
        echo "<p></p>";
    endif;
    ?>
    <main id="login">
        <section id="login">
            <h1>Login Dashboard Blog</h1>
            <form action="../core/login.php" method="POST">
                <div>
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username">
                    <?php
                    if (isset($_SESSION['error_message']['username'])) :
                        $err = $_SESSION['error_message']['username'];
                        echo "<p style='color:red;'>{$err}</p>";
                    else :
                        echo "<p></p>";
                    endif;
                    ?>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                    <?php
                    if (isset($_SESSION['error_message']['password'])) :
                        $err = $_SESSION['error_message']['password'];
                        echo "<p style='color:red;'>{$err}</p>";
                    else :
                        echo "<p></p>";
                    endif;
                    ?>
                </div>

                <input type="submit" value="Masuk" name="masuk">
            </form>
        </section>
    </main>

    <script src="../js/script.js"></script>
</body>

</html>