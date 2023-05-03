<?php

include_once('index.php');
include_once('common.php');


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET["table"])) {
        sendError("'table' parameter is not define.");
        return;
    }
    $table = $_GET["table"];
    if (empty($table)) {
        sendError("'table' parameter is empty.");
        return;
    }

    if ($table === 'users') {
        if (isset($_GET['username'])) {
            $username = $_GET['username'];
            $res = execQueryGetReturn($conn, "SELECT * FROM users WHERE username='$username'");
            $json = json_encode($res);
            echo $json;
        } else if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $res = execQueryGetReturn($conn, "SELECT * FROM users WHERE id='$id'");
            $json = json_encode($res);
            echo $json;
        } else if (isset($_GET['online'])) {
            $online = $_GET['online'];
            $res = execQueryGetReturn($conn, "SELECT * FROM users WHERE online='$online'");
            $json = json_encode($res);
            echo $json;
        } else if (isset($_GET['notifications'])) {
            $notifications = $_GET['notifications'];
            $res = execQueryGetReturn($conn, "SELECT * FROM users WHERE notifications='$notifications'");
            $json = json_encode($res);
            echo $json;
        } else {
            $res = execQueryGetReturn($conn, "SELECT * FROM users");
            $json = json_encode($res);
            echo $json;
        }
    } else if ($table === 'posts') {
        if (isset($_GET['author'])) {
            $author = $_GET['author'];
            $res = execQueryGetReturn($conn, "SELECT * FROM posts WHERE author='$author'");
            $json = json_encode($res);
            echo $json;
        } else if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $res = execQueryGetReturn($conn, "SELECT * FROM posts WHERE id='$id'");
            $json = json_encode($res);
            echo $json;
        } else if (isset($_GET['date'])) {
            echo "Search by date // TODO"; // TODO
            // $date = $_GET['date'];
            // $res = execQueryGetReturn($conn, "SELECT * FROM posts WHERE date='$date'");
            // $json = json_encode($res);
            // echo $json;
        } else {
            $res = execQueryGetReturn($conn, "SELECT * FROM posts");
            $json = json_encode($res);
            echo $json;
        }
    } else if ($table === 'comments') {
        if (isset($_GET['post'])) {
            $post = $_GET['post'];
            $res = execQueryGetReturn($conn, "SELECT * FROM comments WHERE post='$post'");
            $json = json_encode($res);
            echo $json;
        } else if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $res = execQueryGetReturn($conn, "SELECT * FROM comments WHERE id='$id'");
            $json = json_encode($res);
            echo $json;
        } else {
            $res = execQueryGetReturn($conn, "SELECT * FROM comments");
            $json = json_encode($res);
        }
    } else if ($table === 'superposable_images') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $res = execQueryGetReturn($conn, "SELECT * FROM superposable_images WHERE id='$id'");
            $json = json_encode($res);
            echo $json;
        } else {
            $res = execQueryGetReturn($conn, "SELECT * FROM superposable_images");
            $json = json_encode($res);
            echo $json;
        }
    } else {
        sendError("Unrecognized table.");
        return;
    }
}