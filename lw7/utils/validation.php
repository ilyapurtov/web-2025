<?php

define("MAX_LENGTH_USER_NAME",      30);
define("MAX_LENGTH_USER_BIO",       150);
define("MAX_LENGTH_POST_CONTENT",   4000);
define("MAX_COUNT_POST_IMAGES",     7);

function filterUsers($users)
{
    $filtered_users = [];
    $errors = [];
    foreach ($users as $user)
    {
        $filtered_user = [];
        foreach ($user as $key => $value)
        {
            $filtered_user[$key] = match ($key) {
                "id" => filterId($value),
                "name" => filterUserName($value),
                "bio" => filterUserBio($value),
                "image" => $value
            };
            if (!$filtered_user[$key])
                $errors[] = "Данные \"$key\": \"$value\" невалидны.";
        }
        $filtered_users[] = $filtered_user;
    }

    return ["data" => $filtered_users, "errors" => $errors];
}

function filterPosts($posts)
{
    $filtered_posts = [];
    $errors = [];
    foreach ($posts as $post)
    {
        $filtered_post = [];
        foreach ($post as $key => $value)
        {
            $filtered_post[$key] = match ($key) {
                "id" => filterId($value),
                "user_id" => filterId($value),
                "content" => filterPostContent($value),
                "images" => filterPostImages($value),
                "likes" => filterPostLikes($value),
                "time" => filterPostTime($value)
            };
            if (!$filtered_post[$key])
                $errors[] = "Данные \"$key\": \"$value\" невалидны.";
        }
        $filtered_posts[] = $filtered_post;
    }

    return ["data" => $filtered_posts, "errors" => $errors];
}

function filterUserName($s)
{
    if (isset($s) && strlen($s) <= MAX_LENGTH_USER_NAME)
    {
        return htmlentities($s);
    }
    return false;
}

function filterUserBio($s)
{
    if (isset($s) && strlen($s) <= MAX_LENGTH_USER_BIO)
    {
        return htmlentities($s);
    }
    return false;
}

function filterId($s)
{
    if (isset($s) && is_int($s) && $s >= 1)
    {
        return $s;
    }
    return false;
}

function filterPostContent($s)
{
    if (isset($s) && strlen($s) <= MAX_LENGTH_POST_CONTENT)
    {
        return htmlentities($s);
    }
    return false;
}

function filterPostImages($s)
{
    if (isset($s) && count($s) <= MAX_COUNT_POST_IMAGES)
    {
        return $s;
    }
    return false;
}

function filterPostLikes($s)
{
    if (isset($s) && is_int($s) && $s >= 0)
    {
        return $s;
    }
    return false;
}

function filterPostTime($s)
{
    if (isset($s) && is_int($s) && $s <= time())
    {
        return $s;
    }
    return false;
}

?>