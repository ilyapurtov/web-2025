<section class="article">
    <div class="article__header">
        <img class="article__user-icon" src="/lw11/userdata/images/users/<?php echo $user["id"]; ?>.png"
             width="32" height="32" alt="<?php echo htmlentities($user["username"]); ?>">
        <span class="article__user-name"><?php echo htmlentities($user["username"]); ?></span>
        <img class="article__edit-button" src="/lw11/img/icons/edit.svg" alt="редактировать">
    </div>
    <div class="article__slider slider">
        <span class="article__slider-label slider__label">
            <span class="slider__label_current">1</span>/<span class="slider__label_length">3</span>
        </span>
    <?php
    $images = json_decode($post["images"]);
    if ($images == NULL)
        $images = [];
    
    foreach ($images as $image): ?>
        <img class="article__slider-image slider__item" src="/lw11/userdata/images/posts/<?php echo htmlentities($image); ?>"
             alt="картинка поста" onclick="zoomImage(event)">
    <?php endforeach; ?>
        <img class="slider__button left slider__button_left" src="/lw11/img/icons/slider_button_default.svg" width="24" height="24" alt="next">
        <img class="slider__button right slider__button_right" src="/lw11/img/icons/slider_button_default.svg" width="24" height="24" alt="prev">
    </div>
    <button class="article__like-button">
        ❤️ <?php echo $post["likes"]; ?>
    </button>
    <p class="article__text">
        <?php echo htmlentities($post["content"]); ?>
    </p>
    <span class="article__time"><?php echo $post["posted_at"]; ?></span>
</section>