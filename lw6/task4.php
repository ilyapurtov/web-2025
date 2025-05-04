<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Знак зодиака (Дополнительное задание)</title>
</head>
<body>
    <form method="POST" action="task4.php">
        <label>
            Введите дату:
            <input type="text" name="date">
            <button type="submit">Отправить</button>
        </label>
        <?php

        $days = ["первое", "второе", "третье", "четвертое", "пятое", "шестое", "седьмое", "восьмое", "девятое",
                "десятое", "одиннадцатое", "двенадцатое", "тринадцатое", "четырнадцатое", "пятнадцатое", "шестнадцатое",
                "семнадцатое", "восемнадцатое", "девятнадцатое", "двадцатое", "тридцатое"];
        $months = ["января", "февраля", "марта", "апреля", "мая", "июня",
                   "июля", "августа", "сентября", "октября", "ноября", "декабря"];

        if ($_POST)
        {
            $date = $_POST["date"];

            # Замена слов на цифры
            for ($i = 0; $i < count($months); $i++)
            {
                $date = str_ireplace($months[$i], $i + 1, $date);
            }
            for ($i = 0; $i < count($days); $i++)
            {
                $date = str_ireplace($days[$i], $i + 1, $date);
            }
            $date = str_ireplace("двадцать ", "20", $date);
            $date = str_ireplace("тридцать ", "30", $date);

            # Парсинг даты
            $date = str_split($date);
            $parsed_date = ["0"];
            $i = 0;
            $is_previous_number = false;
            foreach ($date as $ch)
            {
                if (is_numeric($ch)) 
                {
                    $parsed_date[$i] .= $ch;
                } 
                elseif ($is_previous_number)
                {
                    $i++;
                    $parsed_date[$i] = "0";
                }
                $is_previous_number = is_numeric($ch);
            }

            if (count($parsed_date) < 2) 
            {
                exit("Ошибка, не удалось определить дату.");
            }

            $day = intval($parsed_date[0]);
            $month = intval($parsed_date[1]);
            
            // Овен (21 марта – 20 апреля)
            // Телец (21 апреля – 20 мая)
            // Близнецы (21 мая – 21 июня)
            // Рак (22 июня – 22 июля)
            // Лев (23 июля – 23 августа)
            // Дева (24 августа – 23 сентября)
            // Весы (24 сентября – 23 октября)
            // Скорпион (24 октября – 22 ноября)
            // Стрелец (23 ноября – 21 декабря)
            // Козерог (22 декабря – 20 января)
            // Водолей (21 января – 20 февраля)
            // Рыбы (21 февраля – 20 марта)

            if (($day >= 21 && $month == 3) || ($day <= 20 && $month == 4)) {
                echo "Овен";
            } elseif (($day >= 21 && $month == 4) || ($day <= 20 && $month == 5)) {
                echo "Телец";
            } elseif (($day >= 21 && $month == 5) || ($day <= 21 && $month == 6)) {
                echo "Близнецы";
            } elseif (($day >= 22 && $month == 6) || ($day <= 22 && $month == 7)) {
                echo "Рак";
            } elseif (($day >= 23 && $month == 7) || ($day <= 23 && $month == 8)) {
                echo "Лев";
            } elseif (($day >= 24 && $month == 8) || ($day <= 23 && $month == 9)) {
                echo "Дева";
            } elseif (($day >= 24 && $month == 9) || ($day <= 23 && $month == 10)) {
                echo "Весы";
            } elseif (($day >= 24 && $month == 10) || ($day <= 22 && $month == 11)) {
                echo "Скорпион";
            } elseif (($day >= 23 && $month == 11) || ($day <= 21 && $month == 12)) {
                echo "Стрелец";
            } elseif (($day >= 22 && $month == 12) || ($day <= 20 && $month == 1)) {
                echo "Козерог";
            } elseif (($day >= 21 && $month == 1) || ($day <= 20 && $month == 2)) {
                echo "Водолей";
            } elseif (($day >= 21 && $month == 2) || ($day <= 20 && $month == 3)) {
                echo "Рыбы";
            }
        }

        ?>
    </form>
</body>
</html>