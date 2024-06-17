<?php
    $hostname = "localhost";
    $database_name = "loginPHP";
    $username = "root";
    $password = "";
    $pdo = "";

    try{
        $pdo = new PDO("mysql:host={$hostname};dbname={$database_name}", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $pdo_exception){
        echo "Connect database failed " . $pdo_exception;
    }
?>