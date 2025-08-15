<?php

require_once 'app/models/NewsModel.php';

class HomeController {

  public $news_list;
  public static function index(): void {
    $news_model = new NewsModel();
    $news_list = $news_model->getAllNews();

    $i = 0;
    foreach ($news_list as &$news) {
      $news['announce'] = substr($news['announce'],3, -4);
      $news['content'] = substr($news['content'],3, -4);
      $news['date'] = str_replace('-', '.',explode(' ', $news['date'])[0]);
    }
    unset($news); 

    $news_list = array_slice($news_list, 0, 4);
    $last_news = $news_list[count($news_list) - 1];
    require_once __DIR__ . '/../views/TemplateView.php';
    }
}