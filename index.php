<?php

if (isset($_SESSION['username'])) {
    header("location: dashboard/index.php");
}

if (!isset($_SESSION['username'])) {
    header("location: auth/login.php");
}
