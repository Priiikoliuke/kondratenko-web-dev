<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Кондратенко Андрей, Группа 241-351 | Лабораторная работа А-2</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Лабораторная работа А-2</h1>
        <p>Кондратенко Андрей Сергеевич, группа 241-351, вариант 9</p>
    </header>

    <main>
        <?php
        // 1. Получаем тип верстки из GET-параметра
        $type = isset($_GET['type']) ? $_GET['type'] : 'A';
        // Проверяем, что тип верстки один из допустимых
        $allowed_types = ['A', 'B', 'C', 'D', 'E'];
        if (!in_array($type, $allowed_types)) {
            $type = 'A'; // Значение по умолчанию, если передан неверный тип
        }
        
        // 2. Явная инициализация остальных переменных
        $start_value = -10;        // начальное значение аргумента
        $encounting = 20;          // количество вычисляемых значений
        $step = 2;                 // шаг изменения аргумента
        $min_limit = -2000;        // минимальное значение функции для остановки
        $max_limit = 500;         // максимальное значение функции для остановки

        $x = $start_value;         // текущий аргумент
        $sum = 0;                  // сумма значений
        $count = 0;                // количество вычисленных числовых значений
        $min = null;               // минимальное значение
        $max = null;               // максимальное значение

        // 3. Форма для выбора типа верстки
        echo '<div class="type-selector">';
        echo '<form method="GET" action="">';
        echo '<label for="type">Выберите тип верстки: </label>';
        echo '<select name="type" id="type">';
        foreach ($allowed_types as $t) {
            $selected = ($t == $type) ? 'selected' : '';
            echo "<option value=\"$t\" $selected>$t</option>";
        }
        echo '</select>';
        echo '<button type="submit">Применить</button>';
        echo '</form>';
        echo '</div>';

        // 4. Начало вывода в зависимости от типа верстки
        if ($type == 'B') echo '<ul>';
        if ($type == 'C') echo '<ol>';
        if ($type == 'D') echo '<table><tr><th>№</th><th>x</th><th>f(x)</th></tr>';
        if ($type == 'E') echo '<div class="block-container">';

        // 5. Цикл вычислений
        for ($i = 0; $i < $encounting; $i++) {
            // Вычисление функции по варианту 9
            if ($x <= 10) {
                $f = pow($x, 2) * ($x - 2) + 4;
            } elseif ($x > 10 && $x < 20) {
                $f = 11 * $x - 55;
            } else { // x >= 20
                if ($x == 100) {
                    $f = 'error'; // деление на ноль
                } else {
                    $f = ($x - 100) / (100 - $x) - $x / 10 + 2;
                }
            }

            // Обработка числовых значений
            if (is_numeric($f)) {
                $f = round($f, 3); // округление до 3 знаков
                $sum += $f;
                $count++;

                if ($min === null || $f < $min) {
                    $min = $f;
                }
                if ($max === null || $f > $max) {
                    $max = $f;
                }
            }

            // 6. Вывод в соответствии с типом верстки
            switch ($type) {
                case 'A':
                    echo "f($x) = $f<br>";
                    break;
                case 'B':
                case 'C':
                    echo "<li>f($x) = $f</li>";
                    break;
                case 'D':
                    $num = $i + 1;
                    echo "<tr><td>$num</td><td>$x</td><td>$f</td></tr>";
                    break;
                case 'E':
                    echo "<div class='block'>f($x) = $f</div>";
                    break;
            }

            // 7. Проверка на выход за пределы (остановка вычислений)
            if (is_numeric($f) && ($f >= $max_limit || $f <= $min_limit)) {
                break;
            }

            $x += $step; // увеличение аргумента
        }

        // 8. Закрытие тегов основной верстки
        if ($type == 'B') echo '</ul>';
        if ($type == 'C') echo '</ol>';
        if ($type == 'D') echo '</table>';
        if ($type == 'E') echo '</div>';

        // 9. Вывод статистики в том же стиле, что и основная верстка
        if ($count > 0) {
            $average = round($sum / $count, 3);
            $stats = [
                "Минимальное значение: $min",
                "Максимальное значение: $max", 
                "Среднее арифметическое: $average",
                "Сумма: $sum"
            ];
            
            // Вывод заголовка статистики
            if ($type == 'A') echo "<br><strong>Статистика:</strong><br>";
            if ($type == 'B') echo "<br><strong>Статистика:</strong><ul>";
            if ($type == 'C') echo "<br><strong>Статистика:</strong><ol>";
            if ($type == 'D') echo '<table><tr><th>Статистика</th><th>Значение</th></tr>';
            if ($type == 'E') echo '<div class="block-container" style="margin-top:20px;"><strong>Статистика:</strong>';
            
            // Вывод статистических данных
            foreach ($stats as $stat) {
                switch ($type) {
                    case 'A':
                        echo "$stat<br>";
                        break;
                    case 'B':
                        echo "<li>$stat</li>";
                        break;
                    case 'C':
                        echo "<li>$stat</li>";
                        break;
                    case 'D':
                        $parts = explode(": ", $stat);
                        echo "<tr><td>$parts[0]</td><td>$parts[1]</td></tr>";
                        break;
                    case 'E':
                        echo "<div class='block'>$stat</div>";
                        break;
                }
            }
            
            // Закрытие тегов статистики
            if ($type == 'B') echo '</ul>';
            if ($type == 'C') echo '</ol>';
            if ($type == 'D') echo '</table>';
            if ($type == 'E') echo '</div>';
        } else {
            // Если нет вычисленных значений
            switch ($type) {
                case 'A':
                    echo "<br>Нет вычисленных значений для статистики<br>";
                    break;
                case 'B':
                    echo "<br><li>Нет вычисленных значений для статистики</li>";
                    break;
                case 'C':
                    echo "<br><li>Нет вычисленных значений для статистики</li>";
                    break;
                case 'D':
                    echo '<tr><td colspan="3">Нет вычисленных значений для статистики</td></tr>';
                    break;
                case 'E':
                    echo '<div class="block">Нет вычисленных значений для статистики</div>';
                    break;
            }
        }
        ?>
    </main>

    <footer>
        <p>Тип верстки: <?php echo $type; ?></p>
        <p>Лабораторная работа А-2, вариант 9</p>
    </footer>
</body>
</html>