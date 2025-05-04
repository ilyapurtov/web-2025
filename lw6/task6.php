<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Факториал числа</title>
</head>
<body>
    <form method="POST" action="task6.php">
        <label>
            Введите натуральное число:
            <input type="number" min="1" name="number">
            <button type="submit">Отправить</button>
        </label>
        <?php

        function factorial(int $number) {
            if ($number == 1)
                return 1;
            else
                return $number * factorial($number - 1);
        }

        if ($_POST) {
            $number = intval($_POST["number"]);
            echo factorial($number);            
        }

        ?>
    </form>
</body>
</html>