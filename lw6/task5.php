<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Счастливые билеты</title>
</head>
<body>
    <form method="POST" action="task5.php">
        <label>
            Начальный номер:
            <input type="number" name="start_number">
        </label><br>
        <label>
            Конечный номер:
            <input type="number" name="end_number">
        </label><br>
        <button type="submit">Отправить</button><br>
        <?php

        if ($_POST) {
            $start_number = intval($_POST["start_number"]);
            $end_number = intval($_POST["end_number"]);

            if ($start_number > $end_number) {
                exit("Ошибка, неверные входные данные.");
            }

            $lucky_found = false;
            for ($i = $start_number; $i <= $end_number; $i++) 
            {
                $i_str = strval($i);
                $num = str_split(str_repeat("0", (6 - strlen($i_str))) . $i_str);
                $sum1 = 0;
                $sum2 = 0;
                for ($j = 0; $j < count($num); $j++)
                {
                    if ($j < 3) $sum1 += intval($num[$j]);
                    else $sum2 += intval($num[$j]);
                }

                if ($sum1 == $sum2)
                {
                    if (!$lucky_found)
                        echo "<h3>Счастливые числа в заданном диапазоне:</h3>";
                    $lucky_found = true;
                    echo "<p>$i_str</p>";
                } 
            }
            if (!$lucky_found) {
                echo "В заданном диапазон нет счастливых чисел.";
            }
        }

        ?>
    </form>
</body>
</html>