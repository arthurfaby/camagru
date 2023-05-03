<?php

include_once('common.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_GET["table"])) {
        sendError("'table' parameter is not define.");
        return;
    }
    $table = $_GET["table"];
    if (empty($table)) {
        sendError("'table' parameter is empty.");
        return;
    }
    $data = json_decode(file_get_contents("php://input"));
    if ($table === 'users') {
        if (
            !isset($data->username)
            || !isset($data->email)
            || !isset($data->password)
            || !isset($data->notifications)
            || !isset($data->online)
        ) {
            sendError("User structure is not complete.");
        } else {
            execQuery($conn, "INSERT INTO users (username, email, password, notifications, online) VALUES ('$data->username', '$data->email', '$data->password', '$data->notifications', '$data->online')");
            return;
        }
    } else if ($table === 'posts') {
        if (
            !isset($data->likes)
            || !isset($data->author)
            || !isset($data->photo_url)
            || !isset($data->superposable_image)
        ) {
            sendError("Post structure is not complete.");
        } else {
            execQuery($conn, "INSERT INTO posts (likes, author, photo_url, superposable_image) VALUES ('$data->likes', '$data->author', '$data->photo_url', '$data->superposable_image')");
            return;
        }
    } else if ($table === 'comments') {
    } else if ($table === 'superposable_images') {
    } else {
        sendError("Unrecognized table.");
        return;
    }
}