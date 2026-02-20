<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <?php
    $title = "Кондратенко Андрей, Группа 241-351 | Лабораторная работа А-1";
    $current_page = "page2";
    ?>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <div class="logo">Лабораторная работа А-1</div>
        <nav>
            <ul>
                <?php
                $menu_items = [
                    'index.php' => 'Главная',
                    'page2.php' => 'Вторая страница',
                    'page3.php' => 'Третья страница'
                ];

                foreach ($menu_items as $link => $text) {
                    $active_class = ($current_page == basename($link, '.php')) ? 'selected_menu' : '';
                    echo "<li><a href=\"$link\" class=\"$active_class\">$text</a></li>";
                }
                ?>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Вторая страница динамического сайта</h1>

        <h2>О языке PHP</h2>
        <p>PHP был создан Расмусом Лердорфом в 1995 году как набор CGI-скриптов на языке Perl для учёта посещений его
            онлайн-резюме. Изначально аббревиатура PHP расшифровывалась как Personal Home Page Tools (Инструменты для
            персональных домашних страниц).</p>

        <h2>Развитие PHP</h2>
        <p>Со временем PHP превратился в полноценный язык программирования. В 1997 году вышла вторая версия,
            переписанная на языке C. В 1998 году вышла третья версия, и тогда же название стало расшифровываться как
            PHP: Hypertext Preprocessor (PHP: Препроцессор Гипертекста).</p>

        <div class="table-container">
            <h2>Версии PHP</h2>
            <table>
                <?php
                echo "<tr>";
                echo "<th>Версия PHP</th>";
                echo "<th>Год выпуска</th>";
                echo "<th>Основные нововведения</th>";
                echo "</tr>";

                ?>
                <tr>
                    <td><?php echo "PHP 5"; ?></td>
                    <td><?php echo "2004"; ?></td>
                    <td><?php echo "Улучшенная объектная модель"; ?></td>
                </tr>
            </table>
        </div>

        <h2>Фотографии на этой странице</h2>
        <div class="photos">
            <?php
            echo '<img src="https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg" alt="Логотип PHP">';

            $second = date('s');
            if ($second % 2 == 0) {
                $photo = 'https://developer.asustor.com/uploadIcons/0020_999_1725444614_apache_256.png';
            } else {
                $photo = 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5b/HTTP_logo.svg/2560px-HTTP_logo.svg.png';
            }
            echo '<img src="' . $photo . '" alt="Меняющаяся фотография">';
            ?>
        </div>

        <h2>Современный PHP</h2>
        <p>Сегодня PHP продолжает активно развиваться. Последние версии языка приносят значительные улучшения
            производительности и новые возможности. PHP 8.x включает такие функции как JIT-компиляция, атрибуты,
            сопоставление с образцом и многое другое.</p>

        <p>PHP остаётся одним из самых популярных языков для веб-разработки благодаря своей простоте, мощным
            возможностям и обширной экосистеме. Фреймворки вроде Laravel, Symfony, Yii и других позволяют разрабатывать
            сложные приложения, следуя современным практикам программирования.</p>

        <p>Сообщество PHP активно развивается, регулярно проводятся конференции, выпускаются новые библиотеки и
            инструменты. Язык продолжает адаптироваться к современным требованиям веб-разработки, сохраняя при этом
            обратную совместимость и простоту изучения для новичков.</p>
    </main>

    <footer>
        <?php
        date_default_timezone_set('Europe/Moscow');
        $date_time = date('d.m.Y в H:i:s');
        echo "Сформировано $date_time";
        ?>
    </footer>
</body>

</html>