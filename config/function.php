<?php
// upload gambar
function upload_gambar()
{
    $ekstensi_diizinkan = ['png', 'jpg', 'jpeg'];
    $nama_gambar = $_FILES['gambar']['name'];
    $x = explode('.', $nama_gambar);
    $ekstensi = strtolower(end($x));
    // mengubah nama gambar agar nama gambar tidak ada yg sama
    $nama_gambar_baru = "img_blog" . date('ymdhis') . "." . $ekstensi;
    $file_tmp = $_FILES['gambar']['tmp_name'];

    // cek apakah ektensi diizinkan
    if (in_array($ekstensi, $ekstensi_diizinkan) == true) {
        // diizinkan
        // pindahkan file ke folder img-blog
        move_uploaded_file($file_tmp, "../public/img-blog/" . $nama_gambar_baru);
        return $nama_gambar_baru;
    } elseif (empty($nama_gambar)) { #cek apakah ada gambar yg diterima
        // file kosong
        return 'image_empty';
    } else {
        // ekstensi tidak diizinkan
        return 'ekstensi_invalid';
    }
}

// format tanggal
function formatTanggalIndonesia($tanggal)
{
    // Pisahkan tanggal, bulan, dan tahun
    $tanggal = explode('-', $tanggal);
    $tahun = $tanggal[0];
    $bulan = $tanggal[1];
    $hari = $tanggal[2];

    // Daftar nama bulan dalam bahasa Indonesia
    $namaBulan = [
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
    ];

    // Format tanggal
    $tanggalIndonesia = $hari . ' ' . $namaBulan[$bulan] . ' ' . $tahun;

    return $tanggalIndonesia;
}
