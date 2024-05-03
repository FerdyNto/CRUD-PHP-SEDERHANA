<?php
include "../init.php";
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
                    <?php
                    // pesan berhasil login
                    if (isset($_SESSION['success_message']['success_login'])) :
                        $ok = $_SESSION['success_message']['success_login'];
                    ?>
                        <div class="alert-message alert-success" id="alert">
                            <p><?= $ok ?></p>
                        </div>
                    <?php
                    endif;

                    // pesan berhasil menambahkan data blog
                    if (isset($_SESSION['success_message']['success_add_blog'])) :
                        $ok = $_SESSION['success_message']['success_add_blog'];
                    ?>
                        <div class="alert-message alert-success" id="alert">
                            <p><?= $ok ?></p>
                        </div>
                    <?php
                    endif;

                    // pesan berhasil hapus data blog
                    if (isset($_SESSION['success_message']['success_remove_blog'])) :
                        $ok = $_SESSION['success_message']['success_remove_blog'];
                    ?>
                        <div class="alert-message alert-success" id="alert">
                            <p><?= $ok ?></p>
                        </div>
                    <?php
                    endif;
                    ?>
                    <h1>Data Blog</h1>

                    <a href="form_tambah_blog.php" class="btn-tambah">Tambah Blog</a>
                    <table>
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Tanggal Post</th>
                                <th>User / Author</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $query = "SELECT * FROM blog_tbl INNER JOIN user_tbl ON blog_tbl.id_user=user_tbl.id_user";
                            $blogs = mysqli_query($conn, $query);
                            while ($blog = mysqli_fetch_array($blogs)) :
                            ?>
                                <tr>
                                    <td>
                                        <?php
                                        if (!$blog['gambar'] == "") :
                                        ?>
                                            <img width="200px" src="../public/img-blog/<?= $blog['gambar'] ?>" alt="<?= $blog['judul'] ?>">
                                        <?php
                                        else :
                                            echo "Tidak ada gambar";
                                        endif;
                                        ?>
                                    </td>
                                    <td><?= $blog['judul'] ?></td>
                                    <td><?= $blog['isi'] ?></td>
                                    <td><?= formatTanggalIndonesia($blog['tgl'])  ?></td>
                                    <td><?= $blog['nama'] ?></td>
                                    <td>
                                        <a href="form_edit_blog.php?id_blog=<?= $blog['id_blog'] ?>" style="color: orange; font-weight: bold; text-decoration: none;">Edit</a>
                                    </td>
                                    <td>
                                        <a href="../core/hapus_blog.php?id_blog=<?= $blog['id_blog'] ?>" style="color: red; font-weight: bold; text-decoration: none;" onclick="return confirm('Yakin ingin menghapus data <?= $blog['judul'] ?>')">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                            endwhile;
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </main>
    <script src="../js/script.js"></script>
</body>

</html>