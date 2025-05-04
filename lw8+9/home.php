<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="/lw8/fonts/Golos-UI_Regular.ttf">
    <link rel="stylesheet" href="/lw8/fonts/Golos-UI_Medium.ttf">
    <link rel="stylesheet" href="/lw8/fonts/Golos-UI_Bold.ttf">
    <link rel="stylesheet" href="/lw8/css/main.css">
    <link rel="stylesheet" href="/lw8/css/home.css">
</head>
<body>
    <?php include_once "templates/nav.html" ?>
    <main class="home-page">
        <?php

        require_once 'utils/database.php';

        $connection = connectDatabase();
        $posts = getPostsFromDatabase($connection);

        foreach ($posts as $post)
        {
            $user = findUserInDatabase($connection, $post['user_id']);
            if (!$user)
                continue;

            include "templates/post.php";
        }

        if (count($posts) == 0)
        {
            ?>
            <p class="no-posts">Здесь пусто...</p>
            <?php
        }

        ?>
    </main>
</body>
</html>