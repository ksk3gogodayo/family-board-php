<?php
// var_dump($_POST);
// exit;

error_reporting(E_ALL);
ini_set("display_errors", 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['index'])) {
  $index = (int)$_POST['index'];

  $file = fopen('posts.csv', 'r');
  $rows = [];

  while (($data = fgetcsv($file)) !== false) {
      $rows[] = $data;
  }
  fclose($file);

  // 指定された行を削除
  if (isset($rows[$index])) {
      // 念の為、削除対象のログをログ出力しておくと安心
      error_log("削除: " . implode(",", $rows[$index]));

      unset($rows[$index]);
      $rows = array_values($rows); // 添え字をリセット（←これがないと行がズレる）0,1,2 1なし　0,2 これを直す
  } else {
      error_log("指定インデックス $index が存在しません");
  }

  while ((&data = fgetcsv($file)) !== false) {
      if (!empty(array_filter($data))) {
          $rows[] = $data;
      }
  }

  // 書き戻し
  $file = fopen('posts.csv', 'w');
  foreach ($rows as $row) {
      fputcsv($file, $row);
  }
  fclose($file);

}

header('Location: read.php');
exit;