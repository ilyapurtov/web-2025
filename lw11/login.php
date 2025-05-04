<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Войти</title>
    <link rel="stylesheet" href="/lw11/fonts/Golos-UI_Regular.ttf">
    <link rel="stylesheet" href="/lw11/fonts/Golos-UI_Medium.ttf">
    <link rel="stylesheet" href="/lw11/fonts/Golos-UI_Bold.ttf">
    <link rel="stylesheet" href="/lw11/css/main.css">
    <link rel="stylesheet" href="/lw11/css/login.css">
</head>
<body>
    <main class="login-page">
        <div class="login-image">
            <h1 class="header">Войти</h1>
            <img src="/lw11/img/login.png" alt="Войти" width="462" height="501">
        </div>
        <form method="POST" action="" class="form" onsubmit="submitForm(event)">
            <div class="form__item">
                <label class="form__label" for="email">Электропочта</label>
                <input class="form__input" name="email" id="email" placeholder="Почта" type="email" oninput="checkInput(this)">
                <small class="form__hint">Введите электропочту в формате *****@***.**</small>
            </div>
            <div class="form__item">
                <label class="form__label" for="password">Пароль</label>
                <input class="form__input" name="password" id="password" placeholder="Пароль" type="password" oninput="checkInput(this)">
                <img class="password-button" src="/lw11/img/icons/eye_off.svg" alt="скрыть/показать" onclick="togglePassword(this)">
            </div>
            <button class="form__button button">Продолжить</button>
        </form>
    </main>

    <script src="/lw11/js/config.js"></script>
    <script src="/lw11/js/login.js"></script>
</body>
</html>