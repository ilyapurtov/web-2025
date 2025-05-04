<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Переводчик</title>
</head>
<body>
    <form method="POST" action="task2.php">
        <label>
            Введите цифру (0-9):
            <input type="number" min="0" max="9" name="digit" placeholder="0">
            <button type="submit">Отправить</button>
        </label>
        <?php

        if ($_POST) {
            $digit = intval($_POST["digit"]);
            $translated = match($digit)
            {
                0 => "Ноль",
                1 => "Один",
                2 => "Два",
                3 => "Три",
                4 => "Четыре",
                5 => "Пять",
                6 => "Шесть",
                7 => "Семь",
                8 => "Восемь",
                9 => "Девять"
            };
            echo $translated;
        }

        ?>
    </form>
</body>
</html>