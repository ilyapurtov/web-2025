<?php

$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST")
{
    $data = json_decode($_POST["data"], true);

    if (json_last_error() !== JSON_ERROR_NONE)
    {
        exit("Произошла ошибка при получении данных");
    }

    $user_id = filter_var($data["user_id"], FILTER_VALIDATE_INT);
    $content = $data["content"];
    if (!$user_id)
    {
        exit("Неверный идентификатор пользователя.");
    }
    if (strlen($content) > 4000)
    {
        exit("Максимальная длина публикации - 4000 символов.");
    }
    $file_uploaded = $_FILES && $_FILES["image"]["error"] == UPLOAD_ERR_OK;
    if ($file_uploaded)
    {
        $name = $_FILES["image"]["name"];
        $type = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        if ($type != "png")
        {
            exit("Ошибка, файл должен быть png-картинкой");
        }
    }
    
    require_once "utils/database.php";
    $connection = connectDatabase();
    $user = findUserInDatabase($connection, $user_id);
    if (!$user)
    {
        exit("Ошибка, такого пользователя не существует.");
    }
    $id = createPostInDatabase($connection, $user_id, $content);

    if (!$id)
    {
        exit("Произошла ошибка при создании публикации");
    }

    if ($file_uploaded)
    {
        move_uploaded_file($_FILES["image"]["tmp_name"], "userdata/images/posts/$id.png");
    }

    echo "OK";
}


?>