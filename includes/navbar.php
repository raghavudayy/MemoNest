<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (isset($_SESSION['user_id'])) {
    require_once 'navbar_user.php';
} else {
    require_once 'navbar_guest.php';
}
?>
