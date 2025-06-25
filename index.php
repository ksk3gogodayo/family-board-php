<?php
$posts = [];
if (file_exists('posts.csv')) {
    $posts = array_reverse(file('posts.csv'));
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>家族掲示板</title>
</head>
<body>
    <h1>👨‍👩‍👧‍👦 家族掲示板</h1>
    <form action="submit.php" method="post">
        名前：<input type="text" name="name" required><br>
        メッセージ：<br>
        <textarea name="message" rows="4" cols="40" required></textarea><br>
        <button type="submit">投稿する</button>
    </form>

    <hr>
    <h2>投稿一覧</h2>
    <?php foreach ($posts as $line): ?>
        <?php list($name, $message, $date) = explode(',', trim($line)); ?>
        <p><strong><?= htmlspecialchars($name) ?></strong>：<?= nl2br(htmlspecialchars($message)) ?><br><small><?= $date ?></small></p>
        <hr>
    <?php endforeach; ?>
</body>
</html>