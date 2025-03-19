<?

$db = new PDO("mysql:host=localhost; dbname=excursions_db",
"root", "");

$info =[];

if($query = $db->query("SELECT * FROM excursions")) {
    $info = $query->fetchAll(PDO::FETCH_ASSOC);
} else {
    print_r($db->errorInfo());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ЭксКузбасс | Экскурсии</title>
    <link href="./styles/excursions.css" rel="stylesheet">
</head>
<body>

<!-- ----------------------------------------- ШАПКА САЙТА --------------------------------------------------------- -->
    <header class="head">
        <div id="headbtn1" class="head-btn-underline"><a class="head-btn" href="index.html">Главная</a><div></div></div>
        <div id="headbtn2" class="head-btn-underline"><a class="head-btn" href="excursions.php">Экскурсии</a><div></div></div>
    </header>

<!-- ----------------------------------------- ЗАГОЛОВОК И ОПИСАНИЕ ------------------------------------------------ -->
    <div class="main-block" id="MainBlock">
        <div class="main">

                <h1 id="MainTitle">Список достопримечательностей</h1>

            <?php foreach ($info as $data): ?>
            <div class="excursion">
                <img class="excursion-image" src="<?= $data['image'] ?>" alt="Загруженное изображение">
                <h2 id="ExName-sample"><?= $data['name'] ?></h2>
                <div class="description-block">
                    <p id="ExDesc-sample"><?= $data['description'] ?></p>
                </div>
                <div class="mesto">
                    <span class="material-icons">share_location</span>
                    <p id="ExC-sample">Место расположения: </p>
                    <p id="ExCountry-sample"><?= $data['country'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>

    <div class="modal" id="modal">
        <span class="close" id="close">&times;</span>
        <img class="modal-content" id="modal-img">
    </div>

<!-- ----------------------------------------- ДОСТОПРИМЕЧАТЕЛЬНОСТИ ----------------------------------------------- -->

<script src="./scripts/excursions.js"></script>
</body>
</html>