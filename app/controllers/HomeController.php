<?php

require_once 'app/models/NewsModel.php';

class HomeController {

  public $news_list;
  public $current_page = 0;
  public $count_items_page = 4;
  public $offset = 0;
  public $last_news;

  public function index(): void {
    $news_model = new NewsModel();
    $news_list = $news_model->getAllNews($this->count_items_page, $this->offset);
    $last_news = $news_model->getLastNews();

    $last_news['announce'] = substr($last_news['announce'],3, -4);
    $last_news['content'] = substr($last_news['content'],3, -4);

    foreach ($news_list as &$news) {
      $news['announce'] = substr($news['announce'],3, -4);
      $news['content'] = substr($news['content'],3, -4);
      $news['date'] = str_replace('-', '.',explode(' ', $news['date'])[0]);
    }
    unset($news); 

    $news_list = array_slice($news_list, 0, 4);
    require_once __DIR__ . '/../views/TemplateView.php';
    }
}