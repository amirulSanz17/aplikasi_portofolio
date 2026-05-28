<?php
    $profileImage = '../assets/image/no_image.png';
    if (!empty($_SESSION['foto'])) {
        $profileImage = '../assets/image/users/' . basename($_SESSION['foto']);
    }
    ?>
    <div class="profile-menu">
        <div class="profile-icon">
            <img 
                src="<?= htmlspecialchars($profileImage) ?>" 
                alt="Profile"
            >
        </div>
        <a href="../auth/logout.php" class="logout-btn">
            Logout
        </a>
</div>