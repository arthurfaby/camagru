<?php

global $conn;

/**
 * @param $conn mysqli instance
 * @param $query query which will be executed
 * @return bool|mysqli_result result of the query method of $conn
 */
function execQuery($conn, $query)
{
    if ($result = $conn->query($query)) {
        // echo "<br>Query '$query' executed.";
    } else {
        die("<br>Query failed: " . $conn->error);
    }
    return $result;
}

/**
 * @param $conn mysqli instance
 * @param $query query which will be executed
 * @return array Array containing the rows of the executed query 
 */
function execQueryGetReturn($conn, $query)
{
    $res = array();
    $result = execQuery($conn, $query);
    while ($data = $result->fetch_object()) {
        $res[] = $data;
    }
    return $res;
}

function init_database($conn)
{
    execQuery($conn, "CREATE TABLE IF NOT EXISTS `users` (
        `id` INTEGER PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,
        `username` VARCHAR(50),
        `email` TEXT,
        `password` TEXT,
        `notifications` BOOL,
        `online` BOOL
    )");
    execQuery($conn, "CREATE TABLE IF NOT EXISTS `posts` (
        `id` INTEGER PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,
        `created_at` DATETIME DEFAULT NOW(),
        `likes` INTEGER,
        `author` INTEGER,
        `photo_url` TEXT,
        `superposable_image` INTEGER
    )");
    execQuery($conn, "CREATE TABLE IF NOT EXISTS `comments` (
        `id` INTEGER PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,
        `post` INTEGER,
        `comment` INTEGER,
        `on_post` BOOL,
        `sender` INTEGER,
        `content` TEXT,
        `likes` INTEGER
    )");
    execQuery($conn, "CREATE TABLE IF NOT EXISTS `superposable_images` (
        `id` INTEGER PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,
        `url` TEXT
    )");
    execQuery($conn, "ALTER TABLE `posts` ADD FOREIGN KEY (`author`) REFERENCES `users` (`id`)");
    execQuery($conn, "ALTER TABLE `comments` ADD FOREIGN KEY (`sender`) REFERENCES `users` (`id`)");
    execQuery($conn, "ALTER TABLE `comments` ADD FOREIGN KEY (`post`) REFERENCES `posts` (`id`)");
    execQuery($conn, "ALTER TABLE `posts` ADD FOREIGN KEY (`superposable_image`) REFERENCES `superposable_images` (`id`)");
    execQuery($conn, "ALTER TABLE `comments` ADD FOREIGN KEY (`comment`) REFERENCES `comments` (`id`)");
}

$conn = new mysqli("database", "root", "rootpass", "camagru"); // TODO remove credentials
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

init_database($conn);


require_once('get.php');
require_once('post.php');
require_once('put.php');
require_once('delete.php');
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $data = json_decode(file_get_contents("php://input"));
//     echo json_encode(["message" => $data->test]);
// }

// echo json_encode(execQueryGetReturn($conn, "SELECT * FROM test"));