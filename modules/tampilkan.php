<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header('Location: ../auth/login.php');
    exit;
}

include '../config/koneksi.php';
include '../includes/header.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
    header('Location: index.php');
    exit;
}

$id_pengguna = $_SESSION['id_pengguna'];

$sql = "SELECT portofolio.*, jenis_portofolio.nama_jenis
        FROM portofolio
        JOIN jenis_portofolio ON portofolio.id_jenis = jenis_portofolio.id
        WHERE portofolio.id = '$id' AND portofolio.id_pengguna = '$id_pengguna'
        LIMIT 1";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>

<link rel="stylesheet" href="../assets/css/tampilkan.css">


<main>
    <h2>Detail Portofolio</h2>

    <?php if (!$row): ?>
        <p style="text-align:center; font-size:18px; color:#5b6b86;">Portofolio tidak ditemukan.</p>
        <div style="text-align:center; margin-top:16px;">
            <a class="btn secondary" href="index.php">Kembali</a>
        </div>
    <?php else: ?>
        <?php $foto = $row['bukti'] ? $row['bukti'] : 'no_image.png'; ?>

        <div class="portofolio-detail-wrapper">
            <div class="portofolio-detail-layout">
                <div class="portofolio-detail-photo">
                    <img class="portofolio-detail-foto" src="../assets/image/portofolio/<?=$foto?>" alt="Foto Portofolio">
                </div>

                <div class="portofolio-detail-body">
                    <div class="portofolio-detail-meta">
                        <span class="badge">Dibuat: <?= htmlspecialchars($row['created_at'] ?? '') ?></span>
                        <span class="badge secondary">Jenis: <?= htmlspecialchars($row['nama_jenis'] ?? '') ?></span>
                    </div>

                    <h3 class="portofolio-detail-judul"><?= htmlspecialchars($row['judul'] ?? '') ?></h3>

                    <div class="portofolio-detail-keterangan">
                        <p class="portofolio-detail-deskripsi">
                            <?= nl2br(htmlspecialchars($row['deskripsi'] ?? '')) ?>
                        </p>

                        <div style="margin-top:14px;">
                            <div class="info-row" style="grid-template-columns: 70px 1fr; margin-bottom:0;">
                                <div class="label">Link</div>
                                <div class="value">
                                    <a href="<?=$row['link']?>" target="_blank" rel="noreferrer" class="portofolio-link">&nbsp;<?=$row['link']?></a>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="actions">
                        <a class="btn secondary" href="edit.php?id=<?=$row['id']?>">Edit</a>
                        <a class="btn danger" href="hapus.php?id=<?=$row['id']?>" onclick="return confirm('yakin hapus?')">Delete</a>
                        <a class="btn" href="index.php">Kembali</a>
                    </div>

                </div>
            </div>
        </div>


    <?php endif; ?>
</main>

<?php include '../includes/footer.php'; ?>

