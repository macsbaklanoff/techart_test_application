<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="main_content">
    <div class="line_detail_news"></div>
    <div class="bread">
      <?php
      $last_key = array_key_last($breadCrumbs);
      foreach ($breadCrumbs as $key => $breadCrumb): ?>
        <?php if ($key !== $last_key): ?>
          <a href="<?= htmlspecialchars($breadCrumb['url']) ?>" class="bread_item">
            <?= htmlspecialchars($breadCrumb['title']) ?>
          </a> /
        <?php else: ?>
          <span class="bread_item_last"><?= htmlspecialchars($breadCrumb['title']) ?></span>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
    <div class="detail_news">
      <h1 class="detail_news_headline"><?= htmlspecialchars($news['title']) ?></h1>
      <p class="detail_news_date"><?= htmlspecialchars($news['date']) ?></p>
      <div class="detail_news_info">
        <div class="detail_news_info_text">
           <?= str_replace('<p>', '<p class="detail_news_info_text_headline">', $news['announce']) ?>
          <div class="detail_news_info_text_content">
            <?= str_replace('<p>', '<p class="detail_news_info_text_content_paragraph">', $news['content']) ?>
          </div>
        </div>
        <div class="detail_news_info_image">
          <img src="/uploads/images/<?= htmlspecialchars($news['image']) ?>">
        </div>
      </div>
      <button class="detail_news_back_page" onclick="window.location.href = `/news/`">
        <img class="arrow_back_page" src="/uploads/icons/arrow-back-page.png">
        назад к новостям
      </button>
    </div>
  </div>
</body>
</html>