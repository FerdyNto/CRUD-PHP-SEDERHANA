<?php

const SERVERNAME = 'localhost';
const USERNAME = 'root';
const PASSWD = '';
const DB_NAME = 'my_blog_rpl1_db';

// buat koneksi
$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWD, DB_NAME);

// cek koneksi apakah error
if ($conn->connect_error) {
    die("Connection Failed:" . $conn->connect_error);
}
