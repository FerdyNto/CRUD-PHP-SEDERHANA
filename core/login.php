<?php

include "../init.php";
session_start();

$errors = [];
$success = [];

// cek apakah tombol masuk sudah ditekan
if (isset($_POST['masuk'])) {
    // validasi form
    // username
    if (empty($_POST['username'])) {
        $errors['username'] = "Username harus diisi!";
    } else {
        // simpan data dalam variabel
        $username = $_POST['username'];
    }

    // password
    if (empty($_POST['password'])) {
        $errors['password'] = "Password harus diisi!";
    } else {
        // simpan data dalam variabel
        $password = $_POST['password'];
    }

    // cek apakah ada error
    if (count($errors) > 0) {
        // kalau ada error
        // arahkan kembali ke tampilan login
        header("location: ../auth/login.php");
        // simpan pesan error dalam sesi
        $_SESSION['error_message'] = $errors;
    } else {
        // tidak ada error
        // cek user di database
        $query = "SELECT * FROM user_tbl WHERE username = '{$username}' AND passwd = '{$password}'";

        // eksekusi query
        $result = mysqli_query($conn, $query);

        // cek apakah ada user ditemukan
        if ($result->num_rows == 0) {
            // tidak ada user
            // arahkan kembali ke tampilan login
            header("location: ../auth/login.php");
            $errors['login_failed'] = "Username atau Password salah!";
            $_SESSION['error_message'] = $errors;
        } else {
            // ada user
            // simpan data yg ditemukan dalam variable
            // pecahkan data dalam bentuk array
            $user = mysqli_fetch_array($result);

            // simpan data yg ditemukan dalam sesi
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['nama'] = $user['nama'];

            // arahkan ke dasboard index
            header("location: ../dashboard/index.php");
            $success['success_login'] = "Selamat Datang";
            $_SESSION['success_message'] = $success;
        }
    }
}
