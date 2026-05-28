            <?php
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            // Menentukan Gambar Profil Default dan Menggunakan Foto dari Session Jika Tersedia
            $profileImage = '../assets/image/admin.png';
            if (!empty($_SESSION['foto'])) {
                $profileImage = '../assets/image/users/' . basename($_SESSION['foto']);
            }
            ?>
            <!-- Sidebar Navigasi untuk Role Admin -->
                <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="./index.php?page=dashboard_admin">
                                <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="./index.php?page=pengguna">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Pengguna
                            </a>
                            <a class="nav-link" href="./index.php?page=jenis_portofolio">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                Jenis Portofolio
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer text-center py-3">
                    <div class="mt-2 small text-light">Logged in as</div>
                    <div class="fw-bold">
                        <?= $_SESSION['username'] ?>
                    </div>
                </div>
                </nav>
            </div>