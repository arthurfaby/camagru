<?php
include_once('common.php');

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
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
    } else if ($table === 'posts') {
    } else if ($table === 'comments') {
    } else if ($table === 'superposable_images') {
    } else {
        sendError("Unrecognized table.");
        return;
    }
}