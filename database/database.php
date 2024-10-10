<?php

$server = 'localhost';
$username = "root";
$password = "";
$database = "torpetarna";
$port = "3306";

$connection;

try {
    $connection = mysqli_connect(
        $server,
        $username,
        $password,
        $database,
        $port
    );
} catch (\Throwable $th) {
    die("Problem during connect, contact admin.");
}

