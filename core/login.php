<?php

// panggil koneksi database
include "../config/connection.php";
// memulai sesi
session_start();

if (isset($_POST['masuk'])) {
    // menangkap data dari input login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // pengecekan user apakah tersedia di database
    $query_login = "select username, password from user where username='{$username}' and password='{$password}'";
    // eksekusi database
    $result = mysqli_query($conn, $query_login);

    // cek apakah ada user ditemukan
    if ($result->num_rows > 0) {
        // memecah data user menjadi sebuah array
        $user = mysqli_fetch_array($result);
        // menyimpan data user ke sesi ke dalam sesi
        $_SESSION['username'] = $user['username'];
        $_SESSION['nama'] = $user['nama'];
        // jika ditemukan user pindah ke halaman dashboard/index.php
        header("location: ../dashboard/index.php");
        $_SESSION['notification'] = 'berhasil masuk';
        exit();
    } else {
        // header("location:../login.php?notification=gagalmasuk");
        header("location:../login.php");
        $_SESSION['notification'] = 'gagal masuk';
    }
}
