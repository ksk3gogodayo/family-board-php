<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>投稿フォーム,</title>
  </head>
<body>
  <h1>📝 投稿フォーム</h1>
  <form action="write.php" method="post">
    <label>名前：<input type="text" name="name" required></label><br><br>
    <label>メッセージ：<br>
      <textarea name="message" rows="4" cols="40" required></textarea>
    </label><br><br>
    <button type="submit">投稿する</button>
  </form>
  <p><a href="read.php">投稿一覧を見る</a></p>
</body>
</html>
