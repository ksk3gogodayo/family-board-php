<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['index'])) {
    $index = (int)$_POST['index'];
    $rows = [];

    if (($file = fopen('posts.csv', 'r')) !== false) {
        while (($data = fgetcsv($file)) !== false) {
            $rows[] = $data;
        }
        fclose($file);
    }

    $rows = array_reverse($rows);

    $rows = array_values($rows); // 添え字をリセット（←これがないと行がズレる）0,1,2 1なし　0,2 これを直す

  // 指定された行を削除
    if (isset($rows[$index])) {
        unset($rows[$index]);
        $rows = array_values($rows);
    }

    $rows = array_reverse($rows);
    $file = fopen('posts.csv', 'w');
    foreach ($rows as $row) {
        fputcsv($file, $row);
    }
    fclose($file);
}

header('Location: read.php');
exit;
?>