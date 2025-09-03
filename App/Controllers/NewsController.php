<?php

namespace App\Controllers;

use App\Models\NewsModel;

class NewsController
{

  public $countItemsPage = 4;
  public $totalNews;

  private $newsModel;

  private $offset;

  public function __construct() {
    $this->newsModel = new NewsModel();
  }

  public function showListNews($page)
  {
    $page = (int)$page;

    $lastNews = $this->newsModel->getLastNews();
    $this->totalNews = $this->newsModel->getCountNews();

    $this->offset = $page * $this->countItemsPage - $this->countItemsPage;

    $newsList = $this->newsModel->getAllNews($this->countItemsPage, $this->offset);
    
    foreach ($newsList as &$news) {
      $news['date'] = str_replace('-', '.', explode(' ', $news['date'])[0]);
    }
    unset($news);
    require_once __DIR__ . '/../Views/PageListNews.php';
  }

  public function showDetailPage($id) {

    $news = $this->newsModel->getNewsById((int) $id);
    $news['date'] = str_replace('-', '.', explode(' ', $news['date'])[0]);
    $breadCrumbs = [
      ['title' => 'Главная', 'url' => '/home?page=1'],
      ['title' => $news['title'], 'url' => 'home/news?id=' . (string) $news['id']]
    ];
    require_once __DIR__ .'/../Views/PageDetailNews.php';
    
  }

  public function redirectToFirstPage() {
    header("Location: /news/page-1/");
  }

}