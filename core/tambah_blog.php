<?php

include "../init.php";
session_start();

$errors = [];
// cek apakah tombol tambah sudah ditekan
if (isset($_POST['tambah'])) {
    // validasi form
    // Validasi judul
    if (empty($_POST['judul'])) {
        $errors['judul'] = "Judul tidak boleh kosong.";
    } else {
        $judul = htmlspecialchars($_POST['judul']);
        $_SESSION['judul'] = $judul;
    }

    // Validasi isi
    if (empty($_POST['isi'])) {
        $errors['isi'] = "Isi tidak boleh kosong.";
    } else {
        $isi = htmlspecialchars($_POST['isi']);
        $_SESSION['isi'] = $isi;
    }

    // Validasi tanggal
    if (empty($_POST['tgl'])) {
        $errors['tgl'] = "Tanggal tidak boleh kosong.";
    } else {
        $tgl = htmlspecialchars($_POST['tgl']);
        $_SESSION['tgl'] = $tgl;
    }

    // cek upload gambar
    if (upload_gambar() === 'ekstensi_invalid') {
        $errors['gambar'] = 'Ekstensi tidak sesuai';
    } elseif (upload_gambar() === 'image_empty') {
        $errors['gambar'] = 'Gambar tidak boleh kosong';
    } else {
        // simpan data gambar
        $gambar = upload_gambar();
    }


    // simpan data user yg sedang login
    $id_user = $_SESSION['id_user'];

    // cek apakah ada error
    if (count($errors) > 0) {
        // kalau ada error
        // arahkan kembali ke tampilan login
        header("location: ../dashboard/form_tambah_blog.php");
        // simpan pesan error dalam sesi
        $_SESSION['error_message'] = $errors;
    } else {
        // kalau tidak ada error
        $query = "INSERT INTO `blog_tbl`(`judul`, `isi`, `tgl`, `gambar`, `id_user`) VALUES ('$judul','$isi','$tgl','$gambar',$id_user)";

        // eksekusi
        $result = mysqli_query($conn, $query);

        if ($result) {
            // sukses tambah data blog
            header("location: ../dashboard/index.php");
            $success['success_add_blog'] = "Berhasil Menambahkan Blog Baru";
            $_SESSION['success_message'] = $success;
        }
    }
}
