<?php
 require_once('db.php');
$image = $_POST['image'];
$name = $_POST['name'];
$description = $_POST['description'];
$country = $_POST['country'];



if (empty($name) || empty($description) || empty($country)){
    session_start();
    $_SESSION['notall_message'] = "Заполните все поля!";
    header("Location: adminPage.php");
    exit();
} else 
{
$sql = "INSERT INTO `excursions` (image,name,description,country) VALUES ('$image', '$name', '$description', '$country')";

    if ($conn -> query($sql) === TRUE) {
        session_start();
        $_SESSION['success_message'] = "Достопримечательность успешно опубликована!";
        header("Location: adminPage.php");
        exit();
    }
    else {
        echo "Ошибка: " . $conn->error;
    }

}
?>
