<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <?php
    $title = "Кондратенко Андрей, Группа 241-351 | Лабораторная работа А-1";
    $current_page = "page3";
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
        <h1>Третья страница динамического сайта</h1>

        <h2>Преимущества PHP</h2>
        <p>PHP предлагает множество преимуществ для веб-разработчиков. Одним из главных преимуществ является его
            кроссплатформенность - PHP работает на различных операционных системах, включая Windows, Linux, macOS и
            других.</p>

        <h2>Простота изучения</h2>
        <p>PHP считается одним из самых простых языков для начала изучения веб-программирования. Его синтаксис понятен и
            логичен, а обширная документация и множество учебных материалов помогают быстро освоить основы.</p>

        <div class="table-container">
            <h2>Сравнение технологий</h2>
            <table>
                <?php
                echo "<tr>";
                echo "<th>Технология</th>";
                echo "<th>Тип</th>";
                echo "<th>Основное применение</th>";
                echo "</tr>";

                ?>
                <tr>
                    <td><?php echo "PHP"; ?></td>
                    <td><?php echo "Серверный язык"; ?></td>
                    <td><?php echo "Веб-приложения"; ?></td>
                </tr>
            </table>
        </div>

        <h2>Динамические фотографии</h2>
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

        <h2>Интеграция с базами данных</h2>
        <p>PHP отлично интегрируется с различными системами управления базами данных, включая MySQL, PostgreSQL, SQLite,
            Oracle и другие. Это позволяет создавать динамические веб-приложения, которые могут хранить, извлекать и
            манипулировать данными.</p>

        <p>Расширения PDO (PHP Data Objects) и MySQLi предоставляют безопасные и эффективные способы работы с базами
            данных, поддерживая подготовленные выражения, которые защищают от SQL-инъекций.</p>

        <p>PHP также поддерживает работу с NoSQL базами данных, такими как MongoDB, Redis и другими, что делает его
            универсальным инструментом для различных типов проектов - от простых блогов до сложных корпоративных систем.
        </p>

        <h2>Будущее PHP</h2>
        <p>Несмотря на появление новых технологий, PHP продолжает оставаться востребованным языком. Регулярные
            обновления, улучшение производительности и добавление современных функций обеспечивают его
            конкурентоспособность в современной веб-разработке.</p>
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