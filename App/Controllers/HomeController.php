<?php

namespace App\Controllers;

use App\Models\NewsModel;
use Core\Controller;

class HomeController extends Controller
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

}