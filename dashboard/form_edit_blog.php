<?php
include "../init.php";
session_start();

// cek apakah belum login
if (!isset($_SESSION['id_user'])) {
    header("location: ../auth/login.php");
}
// cek adakah id_blog ditemukan
if (isset($_GET['id_blog'])) {
    $id_blog = $_GET['id_blog'];
}
$query = "SELECT * FROM blog_tbl WHERE id_blog = {$id_blog}";
$blogs = mysqli_query($conn, $query);
$blog = mysqli_fetch_array($blogs);
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


                    <form action="../core/edit_blog.php?id_blog=<?= $blog['id_blog'] ?>" method="POST" enctype="multipart/form-data">
                        <div>
                            <label for="judul">Judul</label>
                            <input type="text" id="judul" name="judul" value="<?= $blog['judul'] ?>">

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
                            <textarea name="isi" id="isi"><?= $blog['isi'] ?></textarea>
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
                            <input type="date" id="tgl" name="tgl" value="<?= $blog['tgl'] ?>">
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
                            <img src="../public/img-blog/<?= $blog['gambar'] ?>" width="200px" id="img">
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

                        <input type="submit" name="edit" value="Edit" class="btn-edit">
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