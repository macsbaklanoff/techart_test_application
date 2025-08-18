<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/app/css/main_content_style.css">
  <title>Techart.Web</title>
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
        <div class="news_list-news_item-news" onclick="goToPageNews(<?=$news['id']?>)">
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
      <button class="news_pagination_item" onclick="testFunc(1)">1</button>
      <button class="news_pagination_item" onclick="testFunc(2)">2</button>
      <button class="news_pagination_item" onclick="testFunc(3)">
        <?=$this->current_page < 3 ? 3 :htmlspecialchars($this->current_page)?>
      </button>
      <button class="<?= ($this->current_page * $this->count_items_page) >= $total_news ? 'none-news' : 'news_pagination_next' ?>"  onclick="testFunc(<?=$this->current_page + 1?>)">
        <img class="arrow-next-page" src="/uploads/icons/arrow-next-page.png">
      </button>
    </div>
  </div>

</body>
<script>
  function testFunc(nextPage) {
    let newUrl;
    newUrl = `/home?page=${nextPage}`;
    request(newUrl, nextPage)
  }

  function request(newUrl, nextPage) {
    history.pushState(null, null, newUrl);
    fetch(newUrl)
        .then(response => response.text())
        .then(data => {
            document.body.innerHTML = data;
            let pages = document.querySelectorAll('.news_pagination_item')
            if (nextPage - 1 < 3) pages[nextPage - 1].classList.add('current');
            else pages[2].classList.add('current');
        })
  }
  function goToPageNews(id) {
    console.log(id)
    const newUrl = `/home/news?id=${id}`;
    fetch(newUrl, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        }).then(response => {
            return response.json()
        }).then(data => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(data.html, 'text/html');
            const newsDetail = doc.querySelector('.main_content');
            const currentMainContent = document.querySelector('.main_content')
            currentMainContent.innerHTML = newsDetail.innerHTML
            history.pushState(null, null, newUrl);
        })
  }
</script>
</html>