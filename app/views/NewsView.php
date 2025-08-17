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
            <p class="detail_news_info_text_content"><?=htmlspecialchars($news['content'])?></p>
          </div>
          <div class="detail_news_info_image">
            <img src="/uploads/images/<?=htmlspecialchars($news['image'])?>">
          </div>
        </div>
    </div>
  </div>
</body>
</html>