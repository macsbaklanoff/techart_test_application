<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="app/css/detail.css">
  <title>Document</title>
</head>
<body>
  <div class="main_content">
    <div class="line_detail_news"></div>
    <div class="bread">
      <p class="bread-info">Главная / Возвращение этнографа</p>
    </div>
    <div class="detail_news">
        <h1 class="detail_news_headline"><?= htmlspecialchars($news['title'])?></h1>
        <p class="detail_news_date"><?= htmlspecialchars($news['date'])?></p>
        <div class="detail_news_info">
          <div class="detail_news_info_text">
            <h4 class="detail_news_info_text_headline"><?=htmlspecialchars($news['announce'])?></h4>
            <div class="detail_news_info_text_content">
              <?php foreach ($paragraphs as $paragraph) :?>
                <?= str_replace('<p>', '<p class="detail_news_info_text_content_paragraph">', $paragraph) ?>
              <?php endforeach;?>
            </div>
          </div>
          <div class="detail_news_info_image">
            <img src="/uploads/images/<?=htmlspecialchars($news['image'])?>">
          </div>
        </div>
        <button class="detail_news_back_page" onclick="window.location.href = `/home?page=1`">
          <img class="arrow_back_page" src="/uploads/icons/arrow-back-page.png">
          назад к новостям
        </button>
    </div>
  </div>
</body>
</html>