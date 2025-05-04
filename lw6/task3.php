<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Знак зодиака</title>
</head>
<body>
    <form method="POST" action="task3.php">
        <label>
            Выберите дату:
            <input type="date" name="date">
            <button type="submit">Отправить</button>
        </label>
        <?php

        if ($_POST)
        {
            $date = explode('-', $_POST["date"]);
            $day = intval($date[2]);
            $month = intval($date[1]);
            
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

            if (($day >= 21 && $month == 3) || ($day <= 20 && $month == 4))
                echo "Овен";
            elseif (($day >= 21 && $month == 4) || ($day <= 20 && $month == 5))
                echo "Телец";
            elseif (($day >= 21 && $month == 5) || ($day <= 21 && $month == 6))
                echo "Близнецы";
            elseif (($day >= 22 && $month == 6) || ($day <= 22 && $month == 7))
                echo "Рак";
            elseif (($day >= 23 && $month == 7) || ($day <= 23 && $month == 8))
                echo "Лев";
            elseif (($day >= 24 && $month == 8) || ($day <= 23 && $month == 9))
                echo "Дева";
            elseif (($day >= 24 && $month == 9) || ($day <= 23 && $month == 10))
                echo "Весы";
            elseif (($day >= 24 && $month == 10) || ($day <= 22 && $month == 11))
                echo "Скорпион";
            elseif (($day >= 23 && $month == 11) || ($day <= 21 && $month == 12))
                echo "Стрелец";
            elseif (($day >= 22 && $month == 12) || ($day <= 20 && $month == 1))
                echo "Козерог";
            elseif (($day >= 21 && $month == 1) || ($day <= 20 && $month == 2))
                echo "Водолей";
            elseif (($day >= 21 && $month == 2) || ($day <= 20 && $month == 3))
                echo "Рыбы";
        }

        ?>
    </form>
</body>
</html>