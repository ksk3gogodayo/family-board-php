<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

//ファイルを開く
$file = fopen("posts.csv", "r");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>投稿一覧</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>📝 投稿一覧</h1>
  <table border="1" cellpadding="8">
    <tr>
      <th>名前</th>
      <th>メッセージ</th>
      <th>日時</th>
    </tr>

    <?php
    //一行ずつ読み込みながら表示
    while (($data = fgetcsv($file)) !== false) {
      echo "<tr>";
      foreach ($data as $cell) {
        echo "<td>" . htmlspecialchars($cell, ENT_QUOTES, 'UTF-8') . "</td>";
      }
      echo "</tr>";
    }

    //ファイルを閉じる
    fclose($file);
    ?>
  </table>
</body>
</html>