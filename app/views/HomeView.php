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
            <img class="more-arrow" src="/uploads/icons/arrow-more.png">
          </button> 
        </div>
        <?php endforeach; ?>
    </div>
    <div class="news_pagination">
      <button class="news_pagination_item current" onclick="testFunc(1)">1</button>
      <button class="news_pagination_item" onclick="testFunc(2)">2</button>
      <button class="news_pagination_item" onclick="testFunc(3)">3</button>
      <p><?= htmlspecialchars($this->current_page) ?></p>
      <button class="news_pagination_next" onclick="testFunc()">
        <img class="arrow-next-page" src="/uploads/icons/arrow-next-page.png">
      </button>
    </div>
  </div>
</body>
<script>
  function testFunc(nextPage) {
    let newUrl;
    if (nextPage == undefined) {
      const currentPage = window.location.href[window.location.href.toString().length - 1]
      newUrl = window.location.href.substring(0, window.location.href.length - 1) + (Number(currentPage) + 1).toString();
      request(newUrl)
      return;
    }
    newUrl = `/home?page=${nextPage}`;
    request(newUrl)
  }
  function request(newUrl) {
    history.pushState(null, null, newUrl);
    fetch(newUrl)
        .then(response => response.text())
        .then(html => {
            document.body.innerHTML = html;
        })
  }
</script>
</html>