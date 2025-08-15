<?php

require_once 'app/models/NewsModel.php';

class HomeController {

  public $news_list;
  public static function index(): void {
    $news_model = new NewsModel();
    $news_list = $news_model->getAllNews();
    $last_news = $news_list[count($news_list) - 1];
    require_once __DIR__ . '/../views/TemplateView.php';
    }
}