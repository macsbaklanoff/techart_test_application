<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="app/css/home_style.css">  
  <title>Document</title>
</head>
<body>
  <!-- <button onclick = "window.location.href = 'test'" class="test">
    Go to second page.
  </button> -->
  <?php foreach ($news_list as $news): ?>
    <div onclick="window.location.href='/news?id=<?= $news['id'] ?>'">
      <p><?= htmlspecialchars($news['date']) ?></p>
      <h2>
        <?= htmlspecialchars($news['title']) ?>
      </h2>
      <img src="/uploads/images/<?= htmlspecialchars($news['image']) ?>">
    </div>
    <?php endforeach; ?>
</body>
</html>