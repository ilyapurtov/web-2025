<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <form method="POST" action="task7.php">
        <label>
            Введите выражение в постфиксной записи:
            <input type="text" name="expression" placeholder="2 2 +">
            <button type="submit">Отправить</button>
        </label>
        <?php

        function evaluate(string $expression): int {
            $stack = [];
            foreach (explode(" ", $expression) as $token) {
                if (is_numeric($token)) {
                    array_push($stack, intval($token));
                } else {
                    $op2 = array_pop($stack);
                    $op1 = array_pop($stack);
                    array_push($stack, match($token) {
                        "+" => $op1 + $op2,
                        '-' => $op1 - $op2,
                        '*' => $op1 * $op2
                    });
                }
            }

            return $stack[0];
        }

        if ($_POST) {
            $expression = $_POST["expression"];
            echo evaluate($expression);
        }

        ?>
    </form>
</body>
</html>