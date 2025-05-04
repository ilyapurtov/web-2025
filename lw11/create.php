<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Опубликовать статью</title>
    <link rel="stylesheet" href="/lw11/css/main.css">
    <link rel="stylesheet" href="/lw11/css/create.css">
</head>
<body>
    <header class="create-header">
        <a href="/home" class="create-header__button">
            <img src="/lw11/img/icons/back.svg" alt="На главную">
        </a>
        <h1 class="create-header__title">Новый пост</h1>
    </header>
    <form id="create-form" action="" method="POST" class="create-form">
        <div class="create-form__image-preview">
            <img src="lw11/img/icons/image.png" class="image-preview__icon">
            <button type="button" class="image-preview__button button" onclick="uploadClicked()">Добавить фото</button>
            <input type="file" accept="image/*" name="" id="upload-image" onchange="displayImage(this)" hidden>
            <div class="slider image-preview__slider">
                <img class="slider__button slider__button_left" src="/lw11/img/icons/slider_button_default.svg" width="24" height="24" alt="next">
                <img class="slider__button slider__button_right" src="/lw11/img/icons/slider_button_default.svg" width="24" height="24" alt="prev">
                <span class="slider__label">
                    <span class="slider__label_current">1</span> из <span class="slider__label_length">3</span>
                </span>
            </div>
        </div>
        <button type="button" class="create-form__add-image link-button" onclick="uploadClicked()">
            <img src="/lw11/img/icons/plus_square.svg" class="button__icon">
            <span class="button__text">Добавить фото</span>
        </button>
        <textarea id="article-text" class="create-form__text" placeholder="Добавьте подпись..." oninput="checkForm()"></textarea>
        <button type="submit" disabled class="create-form__share button" id="submit-button">Поделиться</button>
    </form>

    <script src="/lw11/js/config.js"></script>
    <script src="/lw11/js/modules/Slider.js"></script>
    <script src="/lw11/js/create.js"></script>
</body>
</html>