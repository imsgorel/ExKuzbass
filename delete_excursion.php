<?php
 require_once('db.php');
$id = $_POST['id'];



if (empty($id)){
    session_start();
    $_SESSION['enter_id_message'] = "Укажите ID удаляемой записи!";
    header("Location: adminPage.php");
    exit();
} else 
{
$sql = "DELETE FROM `excursions` WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        session_start();
        $_SESSION['success_delete_message'] = "Достопримечательность успешно удалена!";
        header("Location: adminPage.php");
        exit();
    } else {
        echo "Ошибка удаления записи: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>