<?php

const SERVERNAME = "localhost";
const USERNAME = "root";
const PASSWORD = '';
const DB_NAME = "coba_buat_db";

// buat koneksi
$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DB_NAME);

// Cek Koneksi
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
