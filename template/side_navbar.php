<aside>
    <div>
        <img src="../public/img/profil.jpg" alt="Foto Profil" class="foto-profil">
        <h3><?= $_SESSION['username'] ?></h3>
    </div>
    <div>
        <a href="">Dashboard</a>
        <a href="">User Info</a>
    </div>
    <form action="../core/logout.php" method="POST">
        <input type="submit" name="keluar" value="Keluar">
    </form>
</aside>