<?php
session_start();

// cek apakah belum login
if (!isset($_SESSION['id_user'])) {
    header("location: ../auth/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
include "../templates/head.php";
?>

<body>
    <main id="dashboard">
        <?php
        include "../templates/sidemenu.php";
        ?>
        <div>
            <?php
            include "../templates/navbar.php";
            ?>
            <section id="blog">

                <div class="container">

                    <h1>Form Tambah Blog</h1>


                    <form action="../core/tambah_blog.php" method="POST" enctype="multipart/form-data">
                        <div>
                            <label for="judul">Judul</label>
                            <input type="text" id="judul" name="judul" value="<?php
                                                                                if (empty($_SESSION['judul'])) :
                                                                                    echo "";
                                                                                else :
                                                                                    echo $_SESSION['judul'];
                                                                                endif;
                                                                                /*
                                                                                kode diatas digunakan untuk menyimpan data inputan
                                                                                ketika ada salah satu dari inputan yg lain tidak sesuai
                                                                                maka data inputan yg sesuai akan disimpan dan tetap di tampilkan
                                                                                di dalam form inputnya masing-masing
                                                                                */
                                                                                ?>">

                            <?php
                            // kode di bawah ini akan menampilkan pesan error pada setiap inputan dalam form
                            if (isset($_SESSION['error_message']['judul'])) :
                                $err = $_SESSION['error_message']['judul'];
                                echo "<p style='color:red;'>{$err}</p>";
                            else :
                                echo "<p></p>";
                            endif;
                            ?>
                        </div>
                        <div>
                            <label for="isi">Isi</label>
                            <textarea name="isi" id="isi"><?php
                                                            if (empty($_SESSION['isi'])) :
                                                                echo "";
                                                            else :
                                                                echo $_SESSION['isi'];
                                                            endif;
                                                            ?></textarea>
                            <?php
                            if (isset($_SESSION['error_message']['isi'])) :
                                $err = $_SESSION['error_message']['isi'];
                                echo "<p style='color:red;'>{$err}</p>";
                            else :
                                echo "<p></p>";
                            endif;
                            ?>
                        </div>
                        <div>
                            <label for="tgl">Tanggal Post</label>
                            <input type="date" id="tgl" name="tgl" value="<?php
                                                                            if (empty($_SESSION['tgl'])) :
                                                                                echo "";
                                                                            else :
                                                                                echo $_SESSION['tgl'];
                                                                            endif;
                                                                            ?>">
                            <?php
                            if (isset($_SESSION['error_message']['tgl'])) :
                                $err = $_SESSION['error_message']['tgl'];
                                echo "<p style='color:red;'>{$err}</p>";
                            else :
                                echo "<p></p>";
                            endif;
                            ?>
                        </div>
                        <div>
                            <label for="gambar">Gambar</label>
                            <img src="" alt="" id="img" width="200px">
                            <input type="file" id="gambar" name="gambar">
                            <?php
                            if (isset($_SESSION['error_message']['gambar'])) :
                                $err = $_SESSION['error_message']['gambar'];
                                echo "<p style='color:red;'>{$err}</p>";
                            else :
                                echo "<p></p>";
                            endif;
                            ?>
                        </div>

                        <input type="submit" name="tambah" value="Tambah" class="btn-tambah">
                    </form>
                </div>
            </section>
        </div>
    </main>
    <script>
        // priview gambar
        const img = document.querySelector('#img');
        const input_img = document.querySelector('#gambar');

        input_img.addEventListener('change', () => {
            img.src = URL.createObjectURL(input_img.files[0]);
        });
    </script>
</body>

</html>