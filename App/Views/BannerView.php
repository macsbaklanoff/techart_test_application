<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Css/BannerStyle.css">
    <title>Document</title>
</head>

<body>
    <div class="main_news">
        <img class="main_news_image" src="/uploads/images/<?= htmlspecialchars($lastNews['image']) ?>">
        <div class="main_news_info">
            <h4 class="main_news_title"><?= htmlspecialchars($lastNews['title']) ?></h4>
            <?= str_replace('<p>', '<p class="main_news_description">', $lastNews['announce']) ?>
        </div>
    </div>
</body>

</html>