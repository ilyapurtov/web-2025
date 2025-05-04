<article>
    <div class="article__header">
        <img class="article__user-icon" src="/lw7/img/<?php echo $user["image"]; ?>" width="32" height="32" alt="<?php echo $user["name"]; ?>">
        <span class="article__user-name"><?php echo $user["name"]; ?></span>
        <img class="article__edit-button" src="/lw7/img/icons/edit.svg" alt="редактировать">
    </div>
    <div class="article__slider">
        <p class="article__slider-label">1/3</p>
        <img class="article__slider-image" src="/lw7/img/posts/<?php echo $post["images"][0]["filename"]; ?>" width="474" height="474" alt="картинка поста">
        <img class="article__slider-button left" src="/lw7/img/icons/slider_button_default.svg" width="24" height="24" alt="next">
        <img class="article__slider-button right" src="/lw7/img/icons/slider_button_default.svg" width="24" height="24" alt="prev">
    </div>
    <button class="article__like-button">
        ❤️ <?php echo $post["likes"]; ?>
    </button>
    <h2 class="article__text">
        <?php echo $post["content"]; ?>
    </h2>
    <button class="article__more-button">ещё</button>
    <span class="article__time"><?php echo date("d-m-Y", $post["time"]); ?></span>
</article>