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
    if (!$_FILES["images"])
    {
        exit("Нельзя опубликовать пост без картинки");
    }

    require_once "utils/database.php";
    $connection = connectDatabase();
    $user = findUserInDatabase($connection, $user_id);
    if (!$user)
    {
        exit("Ошибка, такого пользователя не существует.");
    }

    $images = $_FILES["images"];
    $uploaded_images = [];
    $file_count = count($images["name"]);
    for ($i = 0; $i < $file_count; $i++)
    {
        $file_uploaded = $images["error"][$i] == UPLOAD_ERR_OK;
        if ($file_uploaded)
        {
            $name = $images["name"][$i];
            $type = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            $allowed = ["jpg", "jpeg", "png", "webp"];
            if (!in_array($type, $allowed))
            {
                exit("Ошибка, файл должен быть картинкой");
            }
            $new_name = uniqid();
            if (move_uploaded_file($images["tmp_name"][$i], "userdata/images/posts/$new_name.$type"))
            {
                $uploaded_images[] = "$new_name.$type";
            }
            else
            {
                exit("Произошшла ошибка при загрузке картинки");
            }
        }
        else
        {
            exit("Произошла ошибка при загрузке картинки");
        }
    }
    
    $id = createPostInDatabase($connection, $user_id, $content, $uploaded_images);
    if (!$id)
    {
        exit("Произошла ошибка при создании публикации");
    }
    
    echo "OK";
    
}


?>