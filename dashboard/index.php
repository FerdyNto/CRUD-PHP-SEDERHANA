<?php
session_start();
include "../config/function.php";
notification();

if (!isset($_SESSION['username'])) {
    header("location:../auth/login.php");
}
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

</body>

</html>