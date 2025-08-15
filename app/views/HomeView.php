<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="app/css/home_style.css">  
  <title>Document</title>
</head>
<body>
  <div class="main_news">
    <img class="main_news_image" src="/uploads/images/<?=htmlspecialchars($last_news['image'])?>">
    <div class="main_news_info">
      <h4 class="main_news_title"><?= htmlspecialchars($last_news['title'])?></h4>
      <p class="main_news_description"><?= htmlspecialchars($last_news["announce"])?></p>
    </div>
  </div>
  <div class="news">
    <div class="news_header">
      <h4 class="news_header_headline">Новости</h4>
    </div>
    <div class="news_list-news">
      <?php foreach ($news_list as $news): ?>
        <div class="news_list-news_item-news">
          <p class="news_list-news_item-news_date"><?= htmlspecialchars($news['date'])?></p>
          <h5 class="news_list-news_item-news_title"><?= htmlspecialchars($news['title'])?></h5>
          <p class="news_list-news_item-news_announce"><?= htmlspecialchars($news['announce'])?></p>
          <button class="news_list-news_item-news_more">
            Подробнее 
            <div class="more-arrow"></div>
          </button>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="news_pagination">
      <button class="news_pagination_item">1</button>
      <button class="news_pagination_item">2</button>
      <button class="news_pagination_item">3</button>
    </div>
  </div>
</body>
</html>