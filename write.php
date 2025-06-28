<?php
error_reporting(E_ALL);
ini_set('display_errors', 1); // ← エラー表示ON（デバッグ用）

// 入力値を取得
$name = $_POST['name'];
$message = $_POST['message'];
$datetime = date("Y-m-d H:i:s");

// CSVに追記(a = appendモード)
$file = fopen("posts.csv", "a");
fputcsv($file, [$name, $message, $datetime]);
fclose($file);

// 一覧にリダイレクト
header("Location: read.php");
exit;