<aside>
    <div>
        <img src="../public/img-profil/profil.jpg" alt="Foto Profil" class="foto-profil">
        <h3><?= $_SESSION['nama'] ?></h3>
    </div>
    <div>
        <a href="../dashboard/index.php">Dashboard</a>
    </div>
    <form action="../core/logout.php" method="POST" onclick="return confirm('Yakin ingin keluar?')">
        <input type="submit" name="keluar" value="Keluar" class="btn-keluar">
    </form>
</aside>