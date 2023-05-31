<?php
    session_start();
    require_once 'connect.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $name = $_POST['name'];
    $login = $_POST['login'];

    if ($password === $password_confirm) {

        $path = 'uploads/' . time() . $_FILES['avatar']['name'];
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
            $_SESSION['message'] = 'Ошибка при загрузке аватара';
            header('location: register.php');
        }

        $password = md5($password);

        mysqli_query($connect, "INSERT INTO `users` (`id`, `email`, `name`, `login`, `password`, `user_type`, `date_add`, `avatar`) VALUES (NULL, '$email', '$name', '$login', '$password', '1', NULL, '$path')");
        $_SESSION['message'] = 'Регистрация прошла успешно';
        header('location: form-authorization.php');

    }else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('location: register.php');
    }
?>