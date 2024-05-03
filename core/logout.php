<?php

include "../init.php";
session_start();

session_destroy();
$conn->close();

header("location: ../auth/login.php");
