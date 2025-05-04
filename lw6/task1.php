<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Високосный год</title>
</head>
<body>
    <form method="POST" action="task1.php">
        <label>
            Введите год:
            <input type="number" min="0" max="30000" name="year" placeholder="2007">
            <button type="submit">Отправить</button>
        </label>
        <?php

        if ($_POST)
        {
            $year = $_POST["year"];
            if (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0)
                echo "YES";
            else
                echo "NO";
        }

        ?>
    </form>
</body>
</html>