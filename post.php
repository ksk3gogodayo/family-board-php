<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>投稿フォーム</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h1 class="mb-4 border-start border-warning ps-3">📝 投稿フォーム</h1>

    <form action="write.php" method="post">
      <div class="mb-3">
        <label for="name" class="form-label">名前：</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>

      <div class="mb-3">
        <label for="message" class="form-label">メッセージ：</label>
        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
      </div>

      <button type="submit" class="btn btn-primary">投稿する</button>
    </form>

    <p class="mt-3"><a href="read.php" class="link-secondary">投稿一覧を見る</a></p>
  </div>
</body>
</html>