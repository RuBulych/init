<?php

    $connect = mysqli_connect('127.0.0.1', 'root', 'root', 'project_init');
    if(!$connect){
        die('ошибка подключения к базе данных');
    }