<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <?php
    $title = "Кондратенко Андрей, Группа 241-351 | Лабораторная работа А-1";
    $current_page = "index";
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
        <h1>Динамический сайт на PHP</h1>

        <h2>О лабораторной работе</h2>
        <p>Данная лабораторная работа посвящена изучению основ языка программирования PHP и его использованию для
            создания динамических веб-страниц. PHP (Hypertext Preprocessor) - это скриптовый язык программирования,
            который широко используется для разработки веб-приложений.</p>

        <h2>Задачи работы</h2>
        <p>Основная задача лабораторной работы - преобразование статического HTML-кода в динамический с использованием
            PHP. Это включает в себя динамическое формирование заголовков, меню, таблиц и других элементов страницы в
            зависимости от различных условий.</p>

        <div class="table-container">
            <h2>Пример динамической таблицы</h2>
            <table>
                <?php
                echo "<tr>";
                echo "<th>Название технологии</th>";
                echo "<th>Год создания</th>";
                echo "<th>Основное назначение</th>";
                echo "</tr>";

                ?>
                <tr>
                    <td><?php echo "PHP"; ?></td>
                    <td><?php echo "1995"; ?></td>
                    <td><?php echo "Веб-разработка"; ?></td>
                </tr>
            </table>
        </div>

        <h2>Галерея фотографий</h2>
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

        <h2>Особенности PHP</h2>
        <p>PHP выполняется на стороне сервера, что позволяет генерировать динамический контент перед отправкой страницы
            пользователю. Это отличает его от клиентских языков, таких как JavaScript, которые выполняются в браузере
            пользователя.</p>

        <p>Одной из ключевых особенностей PHP является его простота и удобство для новичков. Синтаксис языка интуитивно
            понятен, а обширная документация и большое сообщество разработчиков делают его отличным выбором для начала
            изучения веб-программирования.</p>

        <p>PHP поддерживает различные базы данных, включая MySQL, PostgreSQL, SQLite и другие, что позволяет создавать
            сложные веб-приложения с хранением и обработкой данных. Также язык имеет встроенные функции для работы с
            файлами, сессиями, cookies и другими важными аспектами веб-разработки.</p>
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