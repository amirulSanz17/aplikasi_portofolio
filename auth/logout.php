<?php

    // Proses Logout dengan Menghancurkan Session
    session_start();
    session_unset();
    session_destroy();
    header('Location: login.php');

?>