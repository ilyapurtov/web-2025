<?php

date_default_timezone_set('Europe/Moscow');

function connectDatabase(): PDO
{
    $dsn = 'mysql:host=127.0.0.1;dbname=blog';
    $user = 'root';
    $password = '';
    return new PDO($dsn, $user, $password);
}

function findPostInDatabase(PDO $connection, int $id): ?array
{
    $query = <<<SQL
        SELECT
            id, user_id, content, posted_at, likes
        FROM post
        WHERE id = $id

        SQL;
    
    $statement = $connection->query($query);
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    return $row ?: null;
}

function findUserInDatabase(PDO $connection, int $id): ?array
{
    $query = <<<SQL
        SELECT
            id, username, bio
        FROM user
        WHERE id = $id

        SQL;
    
    $statement = $connection->query($query);
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    return $row ?: null;
}

function getPostsFromDatabase(PDO $connection): ?array
{
    $query = <<<SQL
        SELECT
            id, user_id, content, posted_at, likes
        FROM post

        SQL;
    $statement = $connection->query($query);
    $posts = [];
    while ($post = $statement->fetch(PDO::FETCH_ASSOC)) {
        $posts[] = $post;
    }

    return $posts;
}

function getPostsOfUserFromDatabase(PDO $connection, int $user_id): ?array
{
    $query = <<<SQL
        SELECT
            id, user_id, content, posted_at, likes
        FROM POST
        WHERE user_id = $user_id

        SQL;
    
    $statement = $connection->query($query);
    $posts = [];
    while ($post = $statement->fetch(PDO::FETCH_ASSOC)) {
        $posts[] = $post;
    }

    return $posts;
}

function createPostInDatabase(PDO $connection, int $user_id, string $content): ?int
{
    $query = <<<SQL
        INSERT INTO
            post (
                user_id,
                content,
                posted_at
            )
            VALUES (?, ?, ?)
        SQL;
    $statement = $connection->prepare($query);
    $statement->execute([
        $user_id,
        $content,
        date('Y-m-d h:m:s')
    ]);
    return $connection->lastInsertId();
}

?>