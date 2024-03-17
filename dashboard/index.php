<?php
session_start();
include "../config/function.php";
notification();

if (!isset($_SESSION['username'])) {
    header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/style.css">
    <title>Dashboard Blog</title>
</head>

<body>
    <form action="../core/logout.php" method="POST">
        <input type="submit" name="keluar" value="Keluar">
    </form>
</body>

</html>