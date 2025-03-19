<?php
session_start();

if (isset($_SESSION['success_message'])) { //------------СООБЩЕНИЕ ОБ УСПЕШНОЙ ПУБЛИКАЦИИ
    echo "<script>alert('Достопримечательность успешно опубликована!')</script>";
    unset($_SESSION['success_message']);
}

if (isset($_SESSION['success_delete_message'])) { //------------СООБЩЕНИЕ ОБ УДАЛЕНИИ ПУБЛИКАЦИИ
    echo "<script>alert('Запись успешно удалена!')</script>";
    unset($_SESSION['success_delete_message']);
}
if (isset($_SESSION['enter_id_message'])) { //------------СООБЩЕНИЕ ОБ УКАЗАНИИ ID ПРИ УДАЛЕНИИ ПУБЛИКАЦИИ
    echo "<script>alert('Укажите ID удаляемой записи!');</script>";
    unset($_SESSION['enter_id_message']);
}

if (isset($_SESSION['notall_message'])) { //------------СООБЩЕНИЕ ОБ УСПЕШНОЙ ПУБЛИКАЦИИ
    echo "<script>alert('Заполните все поля!')</script>";
    unset($_SESSION['notall_message']);
}

//----------ПОДКЛЮЧЕНИЕ К БД И ИЗВЛЕЧЕНИЕ ДАННЫХ
$db = new PDO("mysql:host=localhost; dbname=excursions_db",
"root", "");

$info =[];

if($query = $db->query("SELECT * FROM excursions")) {
    $info = $query->fetchAll(PDO::FETCH_ASSOC);
} else {
    print_r($db->errorInfo());
}

$db = new PDO("mysql:host=localhost; dbname=ex_users_db",
"root", "");

$info2 =[];

if($query = $db->query("SELECT * FROM users")) {
    $info2 = $query->fetchAll(PDO::FETCH_ASSOC);
} else {
    print_r($db->errorInfo());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php foreach ($info2 as $data) ?> <!-- ПАРОЛЬ ОТ АДМИНКИ ИЗ БД EX_USERS_DB -->
    <option style="display: none;" id="passConst" value="<?= $data['pass'] ?>" selected></option>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/adminPage.css">
    <title>ЭксКузбасс | Админ-Панель</title>
</head>
<body>
<!-- ------------------------------Блок с паролем------------------------ -->
<object id="PasswordBlock-Background" class="pb-background">
    <section class="password-block" id="passwordBlock">

        <div class="password-win" id="passwordWin">
            <a>Введите пароль для доступа к админ-панели:</a>
            <input id="inputPasswordAdmin" placeholder="Пароль" type="password"required>
            <div class="btnbtnbtn">
                <button id="authButtonAdmin" type="submit">Войти</button>
            </div>

            <div style="margin-bottom: 0px;">
                <a class="gohome" href="index.html">Вернуться на главную страницу
                    <i class="fa-solid fa-house"></i>
                </a>
            </div>
        </div>

    </section>
</object>
<!-- ----------------------------СЕКЦИЯ С АДМИН-ПАНЕЛЬЮ-------------------------- -->
    <section class="admin-panel-section" id="AdminSection">
        <div class="admin-panel" id="adminPanel">
            <h1>Админ-панель <i class="fa-solid fa-gear"></i></h1>

                <div class="image-block">
                    <img id="ex_image" alt="Изображение достопримечательности">
                </div>

                <div class="loadImage-block">
                    <button id="LoadImage" type="submit">
                        Проверить<i class="fa-sharp fa-solid fa-arrow-up-from-bracket"></i>
                    </button>
                    <button id="RemoveImage" type="submit">
                        Удалить<i class='fa fa-remove'></i>
                    </button>
                </div>

            <form action="save_excursion.php" method="post">
                <div class="url-image-block">
                    <input id="ImageURL" type=text placeholder="URL Картинки" name="image" require>
                </div>

                <div class="name-block">
                    <input id="nameInput" type=text placeholder="Название" name="name" require>
                </div>

                <div class="desc-block">
                    <textarea id="descriptionInput" type="text" placeholder="Описание" name="description" require></textarea>
                </div>

                <div class="country-block">
                    <input id="countryInput" type="text" placeholder="Место расположения" name="country" require>
                </div>

                <div class="public-block">
                    <button id="publicExcursions" type="submit">Опубликовать</button>
                </div>

                <div id="gohome1" style="margin-bottom: 10px;">
                    <a href="index.html">Вернуться на главную страницу
                        <i class="fa-solid fa-house"></i>
                    </a>
                </div>

            </form>

            <div class="delete-ex-link-a" id="delExLnk" style="margin-bottom: 10px;">
                <a id="deleteExLink">Удаление достопримечательностей
                    <i class="fa-solid fa-trash"></i>
                </a>
            </div>

            <form id="deleteForm" action="delete_excursion.php" method="post">
                <div class="delete-ex-id-block">
                    <select class="select-del-excursions" id="deleteExInputPlace" type="text" name="id">
                        <option disabled selected>Выберите ID записи для удаления</option>
                        <?php foreach ($info as $data): ?>
                        <option value="<?= $data['id'] ?>">
                            <?= $data['id'] ?>: <?= $data['name'] ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    
                </datalist>
                </div>

                <div class="delete-ex-button-block">
                    <button type="submit" id=deleteExcursions>Удалить</button>
                </div>

                <div id="gohome2" style="margin-bottom: 0px;">
                    <a href="index.html">Вернуться на главную страницу
                        <i class="fa-solid fa-house"></i>
                    </a>
                </div>
            </form>

        </div>
        
    </section>

    <script src="./scripts/adminPage.js"></script>
</body>
</html>