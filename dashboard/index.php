<?php
session_start();
include "../init.php";

// cek apakah sudah login
if (!isset($_SESSION['username'])) {
    header("location:../auth/login.php");
}

// cek pesan sukses
if (isset($_SESSION['success_message'])) :
    $success = $_SESSION['success_message'];
?>
    <div class="alert-message alert-success" id="alert">
        <?= $success; ?>
    </div>
<?php
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../template/head_dashboard.php"; ?>
</head>

<body>
    <main id="dashboard">
        <?php include "../template/side_navbar.php"; ?>
        <div>
            <?php include "../template/navbar.php"; ?>
            <section id="blog">
                <h1>Tabelnya disini ya</h1>
            </section>
        </div>
    </main>
    <script src="../public/js/script.js"></script>
</body>

</html>