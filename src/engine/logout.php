<?php
    session_start();

    include('config.php');

    unset($_SESSION['name']);
    unset($_SESSION['id']);
    unset($_SESSION['email']);
    unset($_SESSION['user_group']);
    
    session_destroy();

    Header('Location: ../');
?>