<?php
// Обработка GET-параметров
$store = isset($_GET['store']) ? $_GET['store'] : '';       // текущее значение в окне
$counter = isset($_GET['counter']) ? (int)$_GET['counter'] : 0; // счётчик нажатий

if (isset($_GET['key'])) {
    $counter++; // увеличиваем счётчик при любом нажатии
    if ($_GET['key'] === 'reset') {
        $store = ''; // сброс
    } else {
        $store .= $_GET['key']; // добавляем цифру
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа №3</title>
    <style>
        .result {
            width: 250px;
            height: 60px;
            border: 3px solid #333;
            margin: 30px auto;
            text-align: center;
            line-height: 60px;
            font-size: 28px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }
        .buttons {
            text-align: center;
            margin: 20px;
        }
        .buttons a {
            display: inline-block;
            width: 50px;
            height: 50px;
            margin: 6px;
            background-color: #e0e0e0;
            border: 2px solid #888;
            text-decoration: none;
            color: #000;
            font-size: 24px;
            line-height: 50px;
            text-align: center;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.2s;
        }
        .buttons a:hover {
            background-color: #c0c0c0;
            border-color: #555;
        }
        .reset {
            width: 100px !important;
            background-color: #ffb6b6 !important;
            border-color: #d00 !important;
        }
        .reset:hover {
            background-color: #ff8a8a !important;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 20px;
            font-weight: bold;
            color: #444;
        }
    </style>
</head>
<body>
    <!-- Окно результата -->
    <div class="result"><?php echo htmlspecialchars($store); ?></div>

    <!-- Кнопки-цифры и сброс -->
    <div class="buttons">
        <?php for ($i = 0; $i <= 9; $i++): ?>
            <a href="?key=<?php echo $i; ?>&store=<?php echo urlencode($store); ?>&counter=<?php echo $counter; ?>">
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>
        <a class="reset" href="?key=reset&store=<?php echo urlencode($store); ?>&counter=<?php echo $counter; ?>">
            СБРОС
        </a>
    </div>

    <!-- Подвал со счётчиком нажатий -->
    <div class="footer">
        Всего нажатий: <?php echo $counter; ?>
    </div>
</body>
</html>