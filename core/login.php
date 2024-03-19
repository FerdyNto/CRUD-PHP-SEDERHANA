<?php

include "../init.php";
// memulai sesi
session_start();

$error = []; #inisialiasi array untuk menyimpan pesan error

if (isset($_POST['masuk'])) {

    // validasi form dan menangkap data dari form
    if (empty($_POST['username'])) {
        $error['username'] = "Username harus diisi";
    } else {
        $username = data_input($_POST['username']);
    }

    if (empty($_POST['password'])) {
        $error['password'] = "Password Harus diisi";
    } else {
        $password = data_input($_POST['password']);
    }


    if (count($error) == 0) {
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
            $_SESSION['success_message'] = 'berhasil masuk';
            exit();
        }
    } else {
        // header("location:../login.php?notification=gagalmasuk");
        header("location:../auth/login.php");
        $_SESSION['error_message'] = $error;
    }
}
