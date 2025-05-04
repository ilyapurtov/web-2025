<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
    <link rel="stylesheet" href="/lw11/fonts/Golos-UI_Regular.ttf">
    <link rel="stylesheet" href="/lw11/fonts/Golos-UI_Medium.ttf">
    <link rel="stylesheet" href="/lw11/fonts/Golos-UI_Bold.ttf">
    <link rel="stylesheet" href="/lw11/css/main.css">
    <link rel="stylesheet" href="/lw11/css/profile.css">
</head>
<body>
    <?php
    include_once "templates/nav.html";

    function redirect()
    {
        header('Location: /home');
    }

    require_once "utils/database.php";

    $connection = connectDatabase();
    $user_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if (!$user_id)
        redirect();

    $posts = getPostsOfUserFromDatabase($connection, $user_id);
    $user = findUserInDatabase($connection, $user_id);

    if (!$user)
        redirect();
    
    include "templates/profile.php";

    ?>
</body>
</html>