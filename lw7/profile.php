<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
    <link rel="stylesheet" href="/lw7/fonts/Golos-UI_Regular.ttf">
    <link rel="stylesheet" href="/lw7/fonts/Golos-UI_Medium.ttf">
    <link rel="stylesheet" href="/lw7/fonts/Golos-UI_Bold.ttf">
    <link rel="stylesheet" href="/lw7/css/main.css">
    <link rel="stylesheet" href="/lw7/css/profile.css">
</head>
<body>
    <?php
    include_once "templates/nav.html";

    function redirect()
    {
        header('Location: /home');
    }

    require_once "utils/validation.php";

    $posts = filterPosts(json_decode(file_get_contents("data/posts.json"), true));
    $users = filterUsers(json_decode(file_get_contents("data/users.json"), true));

    if (json_last_error() !== JSON_ERROR_NONE)
    {
        exit("Произошла ошибка при получении данных");
    }
    if (count($users["errors"]) > 0 || count($posts["errors"]) > 0)
    {
        print_r($users["errors"]);
        print_r($posts["errors"]);
        exit();
    }
    $users = $users["data"];
    $posts = $posts["data"];

    $user_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, ["options"=>["min_value" => 1]]);

    if (!$user_id)
        redirect();

    $user = NULL;
    foreach ($users as $u)
    {
        if ($user_id == $u["id"])
        {
            $user = $u;
            break;
        }
    }

    if (!isset($user))
        redirect();

    $posts = array_filter($posts, fn($p) => $p["user_id"] == $user_id);
    
    include "templates/profile.php";

    ?>
</body>
</html>