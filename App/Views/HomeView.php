<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/Css/HomeStyle.css">
  <title>Techart.Web</title>
</head>

<body>
  <!-- <div class="main_news">
    <img class="main_news_image" src="/uploads/images/<?= htmlspecialchars($lastNews['image']) ?>">
    <div class="main_news_info">
      <h4 class="main_news_title"><?= htmlspecialchars($lastNews['title']) ?></h4>
      <?= str_replace('<p>', '<p class="main_news_description">', $lastNews['announce']) ?>
    </div>
  </div> -->
  <div class="main_content">
    <h4>Новости</h4>
    <p onclick="goToListNews()">Перейти к новостям</p>
  </div>
  <!-- <div class="news">
    <div class="news_header">
      <h4 class="news_header_headline">Новости</h4>
    </div>
    <div class="news_list-news">
      <?php foreach ($newsList as $news): ?>
        <div class="news_list-news_item-news" onclick="goToPageNews(<?= $news['id'] ?>)">
          <p class="news_list-news_item-news_date"><?= htmlspecialchars($news['date']) ?></p>
          <h5 class="news_list-news_item-news_title"><?= htmlspecialchars($news['title']) ?></h5>
          <?= str_replace('<p>', '<p class="news_list-news_item-news_announce">', $news['announce']) ?>
          <button class="news_list-news_item-news_more">
            Подробнее
            <img class="more-arrow" src="/uploads/icons/arrow-more.png">
          </button>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="news_pagination">
      <button class="news_pagination_item" onclick="paginationFunc(1)">1</button>
      <button class="news_pagination_item" onclick="paginationFunc(2)">2</button>
      <button class="news_pagination_item" onclick="paginationFunc(3)">
        <?= $this->currentPage < 3 ? 3 : htmlspecialchars($this->currentPage) ?>
      </button>
      <button
        class="<?= ($this->currentPage * $this->countItemsPage) >= $totalNews ? 'none-news' : 'news_pagination_next' ?>"
        onclick="paginationFunc(<?= $this->currentPage + 1 ?>)">
        <img class="arrow-next-page" src="/uploads/icons/arrow-next-page.png">
      </button>
    </div>
  </div> -->

</body>
<script>
  function goToListNews() {
    console.log('goToListNews');
    window.location.href = '/news/';
  }
</script>
<!-- <script>
  function paginationFunc(nextPage) {
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
</script> -->

</html>