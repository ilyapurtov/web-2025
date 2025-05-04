<header class="profile-header">
    <img class="profile-header__user-image" src="/lw11/userdata/images/users/<?php echo $user["id"]; ?>.png" alt="<?php echo htmlentities($user["username"]); ?>">
    <h2 class="profile-header__user-name"><?php echo htmlentities($user["username"]); ?></h2>
    <p class="profile-header__user-desc"><?php echo htmlentities($user["bio"]); ?></p>
    <button class="posts-button">
        <img class="posts-button__image" src="/lw11/img/icons/image.svg" width="16" height="16" alt="Картинка">
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
            <img src="/lw11/userdata/images/posts/<?php echo json_decode($post["images"])[0]; ?>" width="321" height="321" alt="Пост">
        </a>
    <?php
    }
    ?>
</main>