<link rel="stylesheet" href="../assets/css/layout.css">

<h2>Portofolio Saya</h2>

<div class="top-bar">
    <a href="tambah.php" class="button-link">Tambah Portofolio</a>
    <form method="GET" class="search-form">
        <input 
            type="text" 
            name="keyword" 
            placeholder="Cari judul..."
            value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>"
        >
        <button type="submit">Search</button>
    </form>
</div>

<?php
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
    $id_pengguna = $_SESSION['id_pengguna'];

    $sql = "SELECT 
        portofolio.*, 
        jenis_portofolio.nama_jenis
    FROM portofolio
    JOIN jenis_portofolio
        ON portofolio.id_jenis = jenis_portofolio.id
    WHERE portofolio.id_pengguna = '$id_pengguna'";

    if (!empty($keyword)) {
        $sql .= " AND judul LIKE '%$keyword%'";
    }

    $result = mysqli_query($conn, $sql);
?>

<?php if (mysqli_num_rows($result) == 0): ?>
    <p style="text-align:center; font-size:18px; color:#5b6b86;">Belum ada portofolio</p>
<?php else: ?>
    <div class="portofolio-grid">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <?php $foto = !empty($row['bukti']) ? $row['bukti'] : 'no_image.png'; ?>
            <div class="portofolio-card">
                <div class="media">
                    <img src="../assets/image/portofolio/<?= $foto ?>" alt="Foto Portofolio">
                </div>
                <div class="content">
                    <div class="meta">
                        Dibuat: <?= htmlspecialchars($row['created_at'] ?? '') ?>
                    </div>
                    <h3>
                        <?= htmlspecialchars($row['judul'] ?? '') ?>
                    </h3>
                    <div class="link">
                        <b>Link:</b>
                        <a href="<?= $row['link'] ?>" target="_blank">
                            Buka
                        </a>
                    </div>
                    <div class="actions">
                        <a class="btn" href="tampilkan.php?id=<?= $row['id'] ?>">
                            Tampilkan
                        </a>
                        <a class="btn secondary" href="edit.php?id=<?= $row['id'] ?>">
                            Edit
                        </a>
                        <a class="btn danger" href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('yakin hapus?')">
                            Delete
                        </a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>