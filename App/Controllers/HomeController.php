<?php

namespace App\Controllers;

use App\Models\NewsModel;

class HomeController
{

  public $newsList;

  public $countItemsPage = 4;
  public $offset = 0;
  public $lastNews;

  public function showHome(): void
  {
    $newsModel = new NewsModel();

    $lastNews = $newsModel->getLastNews();

    require_once __DIR__ . '/../Views/PageHomeView.php';
  }

  public function showPageNotFount() {
    // var_dump('pageNotFound');
    require_once __DIR__ . '/../Views/PageNotFound.php';
    http_response_code(404);
  }

}