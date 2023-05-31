<?php
    session_start();

    require_once 'connect.php';
    $email = $_SESSION['email'];
    $password = md5($_SESSION['password']);

    $check_user = mysqli_query($connect, "SELECT * FROM 'users' WHERE 'login' = '$login' AND 'password' = '$password' ");
    echo mysqli_num_rows($check_user);
?>