<?php
    /// delete the session variable
    /// forward to sign in page

    session_start();

    unset($_SESSION['order_id']);
    

    echo "<script>window.location.assign('homepage.php');</script>";
?>