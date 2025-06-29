<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$rows = [];

// ファイルを開いて読み込み
if (($file = fopen("posts.csv", "r")) !== false) {
  while (($data = fgetcsv($file)) !== false) {
    $rows[] = $data;
  }  
  fclose($file);
  // 新しい順に並べ替え
  $rows = array_reverse($rows);
}  
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>投稿一覧</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h1 class="mb-4 border-start border-primary ps-3">📝 投稿一覧</h1>

    <table class="table table-bordered table-striped bg-white">
      <thead class="table-light">
        <tr>
          <th>名前</th>
          <th>メッセージ</th>
          <th>日時</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($rows)): ?>
          <?php foreach ($rows as $rows): ?>
            <tr>
              <?php foreach ($rows as $cell): ?>
                <td><?= htmlspecialchars($cell, ENT_QUOTES, 'UTF-8') ?></td>
              <?php endforeach; ?>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="3">データがありません</td></tr>
        <?php endif; ?>
      </tbody>
    </table>

    <p><a href="post.php" class="link-secondary">← 投稿フォームに戻る</a></p>
  </div>
</body>
</html>