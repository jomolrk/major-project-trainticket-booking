<?php
    session_start();
    session_destroy();
    echo "<script>
        alert('logout successfully');
        window.location.href='../index.php';
    </script>";
?>