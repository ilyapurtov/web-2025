<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="/lw11/fonts/Golos-UI_Regular.ttf">
    <link rel="stylesheet" href="/lw11/fonts/Golos-UI_Medium.ttf">
    <link rel="stylesheet" href="/lw11/fonts/Golos-UI_Bold.ttf">
    <link rel="stylesheet" href="/lw11/css/main.css">
    <link rel="stylesheet" href="/lw11/css/home.css">
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

    <!-- <div class="modal">
        <div class="modal__content">
            <img src="/lw11/img/icons/cross.svg" class="modal__close">
            <div class="slider modal-slider">
                <img class="slider__item modal-slider__item" src="/lw11/userdata/images/posts/1.png" alt="картинка поста">
                <img class="slider__button slider__button_left" src="/lw11/img/icons/slider_button_default.svg" width="24" height="24" alt="next">
                <img class="slider__button slider__button_right" src="/lw11/img/icons/slider_button_default.svg" width="24" height="24" alt="prev">
                <span class="slider__label modal-slider__label">
                    <span class="slider__label_current">1</span> из <span class="slider__label_length">3</span>
                </span>
            </div>
        </div>
    </div> -->
    <script src="/lw11/js/config.js"></script>
    <script src="/lw11/js/modules/Slider.js"></script>
    <script src="/lw11/js/modules/Modal.js"></script>
    <script src="/lw11/js/home.js"></script>
</body>
</html>