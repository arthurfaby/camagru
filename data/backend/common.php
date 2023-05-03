<?php

function sendError($message)
{
    $res = json_encode(["error" => $message]);
    echo $res;
}