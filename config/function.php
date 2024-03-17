<?php
// Notifikasi Sukses / Gagal dengan session
function notification()
{
    // cek apakah ada sesi notifikasi yg diterima
    if (isset($_SESSION['notification'])) {
        // tangkap sesi dan simpan dalam variabel
        $notification = $_SESSION['notification'];

        // cek notification sesuai dengan value nya 
        if ($notification === "gagal masuk") {
            echo "<script>alert('Username atau Password yang dimasukkan salah!')</script>";
        } elseif ($notification === 'berhasil masuk') {
            echo "<script>alert('Selamat Datang')</script>";
        }
    }
    // hapus sesi notifikasi
    unset($_SESSION['notification']);
}
