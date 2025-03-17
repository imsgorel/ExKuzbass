<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "excursions_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Ошибка подключения: " . mysqli_connect_error());
} else {
    echo "Успешное подключение к БД: ";
} 
?>