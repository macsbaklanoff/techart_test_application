<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/Css/ListNewsStyle.css">
  <title>Document</title>
</head>

<body>
  <div class="news">
    <div class="news_header">
      <h4 class="news_header_headline">Новости</h4>
    </div>
    <div class="news_list-news">
      <?php foreach ($newsList as $news): ?>
        <div class="news_list-news_item-news" onclick="goToDetailPageNews(<?= $news['id'] ?>)">
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
      <!-- <button class=<?= $page == 1 ? "news_pagination_item current" : "news_pagination_item" ?> onclick="paginationFunc(1)">1</button> -->
      <button class="news_pagination_item" onclick="paginationFunc(1)">1</button>
      <button class="news_pagination_item" onclick="paginationFunc(2)">2</button>
      <button class="news_pagination_item" onclick="paginationFunc(3)">
        <?= $page < 3 ? 3 : htmlspecialchars($page) ?>
      </button>
      <button class="<?= ($page * $this->countItemsPage) >= $this->totalNews ? 'none-news' : 'news_pagination_next' ?>"
        onclick="paginationFunc(<?= $page + 1 ?>)">
        <img class="arrow-next-page" src="/uploads/icons/arrow-next-page.png">
      </button>
    </div>
  </div>
</body>
<script>

  function goToDetailPageNews(id) {
    window.location.href = `/news/${id}/`;
  }

  function paginationFunc(newPage) {
    console.log(newPage);
    window.location.href = `/news/page-${newPage}/`;
  }

</script>

</html>