<?php

include "../init.php";
session_start();

if (isset($_GET['id_blog'])) {
    $id_blog = $_GET['id_blog'];
}

// ambil gambar
$query_gambar = "SELECT gambar FROM blog_tbl WHERE id_blog = $id_blog";
$data = mysqli_query($conn, $query_gambar);
$data_gambar = mysqli_fetch_array($data);
$nama_gambar = $data_gambar['gambar'];

// hapus gambar
unlink("../public/img-blog/{$nama_gambar}");

$query = "DELETE FROM blog_tbl WHERE id_blog = $id_blog";

$hapus = mysqli_query($conn, $query);

if ($hapus) {
    header("location: ../dashboard/index.php");
    $success['success_remove_blog'] = "Berhasil Hapus Blog";
    $_SESSION['success_message'] = $success;
}
