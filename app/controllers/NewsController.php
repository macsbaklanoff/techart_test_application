<?php

require_once 'app/models/NewsModel.php';

class NewsController {
  public function show_news() {
    $id = $_GET["id"];

    $model = new NewsModel();

    $news = $model->getNewsById((int)$id);
    

    require_once __DIR__ . '/../views/NewsView.php';
  }
}