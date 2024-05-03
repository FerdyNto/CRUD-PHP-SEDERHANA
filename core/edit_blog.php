<?php

include "../init.php";
session_start();

// cek adakah id_blog ditemukan
if (isset($_GET['id_blog'])) {
    $id_blog = $_GET['id_blog'];
}

// ambil gambar
$query_gambar = "SELECT gambar FROM blog_tbl WHERE id_blog = $id_blog";
$data = mysqli_query($conn, $query_gambar);
$data_gambar = mysqli_fetch_array($data);
$nama_gambar = $data_gambar['gambar'];


$errors = [];
// cek apakah tombol tambah sudah ditekan
if (isset($_POST['edit'])) {
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

    // cek apakah inputan gambar kosong atau tidak
    if (empty($_FILES['gambar']['name'])) {
        // kalau kosong simpan nama gambar lama ke database
        $gambar = $nama_gambar;
    } else {
        // kalau tidak kosong
        // cek upload gambar
        if (upload_gambar() === 'ekstensi_invalid') {
            $errors['gambar'] = 'Ekstensi tidak sesuai';
        } else {
            // hapus gambar lama
            unlink("../public/img-blog/{$nama_gambar}");
            // simpan data gambar baru
            $gambar = upload_gambar();
        }
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
        $query = "UPDATE `blog_tbl` SET `judul`='$judul',`isi`='$isi',`tgl`='$tgl',`gambar`='$gambar' WHERE id_blog= {$id_blog}";

        // eksekusi
        $result = mysqli_query($conn, $query);

        if ($result) {
            // sukses tambah data blog
            header("location: ../dashboard/index.php");
            $success['success_add_blog'] = "Berhasil Edit Blog";
            $_SESSION['success_message'] = $success;
        }
    }
}
