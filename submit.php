<?php
file_put_contents('debug.txt', 'submit動いた' . PHP_EOL, FILE_APPEND);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $message = $_POST['message'];
    $date = date('Y-m-d H:i:s');

    $line = "{$name},{$message},{$date}\n";
    file_put_contents('posts.csv', $line, FILE_APPEND);
    header('Location: index.php');
    exit;
}