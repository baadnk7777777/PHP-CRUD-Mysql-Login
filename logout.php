<?php 
    session_start();
    // ทำลาย session ['name]
    session_destroy();
    header("location: index.php");
    exit(0);
?>