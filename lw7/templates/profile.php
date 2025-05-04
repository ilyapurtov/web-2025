<header class="profile-header">
    <img class="profile-header__user-image" src="/lw7/img/<?php echo $user["image"]; ?>" alt="<?php echo $user["name"]; ?>">
    <h2 class="profile-header__user-name"><?php echo $user["name"]; ?></h2>
    <p class="profile-header__user-desc"><?php echo $user["bio"]; ?></p>
    <button class="posts-button">
        <img class="posts-button__image" src="/lw7/img/icons/image.svg" width="16" height="16" alt="Картинка">
        <span><?php echo count($posts); ?> постов</span>
    </button>
</header>
<main class="posts">
    <?php

    if (count($posts) == 0)
    {
    ?>
        <p class="no-posts">здесь пусто...</p>
    <?php
    }

    foreach ($posts as $post)
    {
    ?>
        <a href="/post?id=<?php echo $post["id"];?>">
            <img src="/lw7/img/posts/<?php echo $post["images"][0]["filename"]; ?>" width="321" height="321" alt="Пост">
        </a>
    <?php
    }
    ?>
</main>