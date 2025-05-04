<section class="article">
    <div class="article__header">
        <img class="article__user-icon" src="/lw8/userdata/images/users/<?php echo $user["id"]; ?>.png"
             width="32" height="32" alt="<?php echo htmlentities($user["username"]); ?>">
        <span class="article__user-name"><?php echo htmlentities($user["username"]); ?></span>
        <img class="article__edit-button" src="/lw8/img/icons/edit.svg" alt="редактировать">
    </div>
    <div class="article__slider">
        <p class="article__slider-label">1/3</p>
        <img class="article__slider-image" src="/lw8/userdata/images/posts/<?php echo $post["id"]; ?>.png"
             width="474" height="474" alt="картинка поста">
        <img class="article__slider-button left" src="/lw8/img/icons/slider_button_default.svg" width="24" height="24" alt="next">
        <img class="article__slider-button right" src="/lw8/img/icons/slider_button_default.svg" width="24" height="24" alt="prev">
    </div>
    <button class="article__like-button">
        ❤️ <?php echo $post["likes"]; ?>
    </button>
    <h2 class="article__text">
        <?php echo htmlentities($post["content"]); ?>
    </h2>
    <button class="article__more-button">ещё</button>
    <span class="article__time"><?php echo $post["posted_at"]; ?></span>
</section>