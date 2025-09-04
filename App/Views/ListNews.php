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
                <a href=<?=$this->getViewUrl($news['id'])?> class="news_list-news_item-news">
                    <p class="news_list-news_item-news_date"><?= htmlspecialchars($news['date']) ?></p>
                    <h5 class="news_list-news_item-news_title"><?= htmlspecialchars($news['title']) ?></h5>
                    <?= str_replace('<p>', '<p class="news_list-news_item-news_announce">', $news['announce']) ?>
                    <button class="news_list-news_item-news_more">
                        Подробнее
                        <img class="more-arrow" src="/uploads/icons/arrow-more.png">
                    </button>
                </a>
            <?php endforeach; ?>
        </div>
        <div class="news_pagination">
            <a href=<?= $this->getListUrl(1) ?> class="news_pagination_item">1</a>
            <a href=<?= $this->getListUrl(2) ?> class="news_pagination_item">2</a>
            <a href=<?= $this->getListUrl(3) ?> class="news_pagination_item">
                <?= $page < 3 ? 3 : htmlspecialchars($page) ?>
            </a>
            <a href=<?= $this->getListUrl($page + 1)?>
                class="<?= ($page * $this->countItemsPage)>= $this->totalCountNews ? 'none-news' : 'news_pagination_next' ?>">
                <img class="arrow-next-page" src="/uploads/icons/arrow-next-page.png">
            </a>
            <!-- <a <?=$this->getListUrl($page + 1) ? "href=$this->getListUrl($page + 1) class='news_pagination_next'" : "href=' ' class='none-news'"?>>
                <img class="arrow-next-page" src="/uploads/icons/arrow-next-page.png">
            </a> -->
        </div>
    </div>
</body>

</html>