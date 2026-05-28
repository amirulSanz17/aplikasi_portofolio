<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $profileImage = '../assets/image/admin.png';

    if (!empty($_SESSION['foto'])) {
        $profileImage = '../assets/image/users/' . basename($_SESSION['foto']);
    }
    ?>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Brand -->
        <a class="navbar-brand ps-3" href="index.php">
            Aplikasi Portofolio
        </a>
        <!-- Sidebar Toggle -->
        <button 
            class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0"
            id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
        <!-- Right Navbar -->
        <ul class="navbar-nav ms-auto me-3">
            <li class="nav-item dropdown">
                <!-- FOTO PROFIL -->
                <a 
                    class="nav-link p-0 border-0"
                    href="#"
                    id="navbarDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                >
                    <img 
                        src="<?= $profileImage ?>"
                        width="40"
                        height="40"
                        class="rounded-circle shadow"
                        style="object-fit: cover; border:2px solid white;"
                    >
                </a>
                <!-- DROPDOWN -->
                <ul class="dropdown-menu dropdown-menu-end shadow">
                    <li class="dropdown-header text-center">
                        <?= $_SESSION['username'] ?>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item text-danger" href="../auth/logout.php">
                            <i class="fas fa-sign-out-alt me-2"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>