<?php

namespace App\Controllers;

use App\Models\NewsModel;
use Core\Controller;

class NewsController extends Controller
{

  public $countItemsPage = 4;

  public $totalNews;

  // public $current = ' current';

  private $newsModel;

  private $offset;

  public function __construct()
  {
    $this->newsModel = new NewsModel();
  }

  public function showListNews($page)
  {
    $page = (int) $page;
    $this->totalNews = $this->newsModel->getCountNews();

    if ($page > ceil($this->totalNews / $this->countItemsPage) || $page < 1) {
      $this->showPageNotFount();
      return;
    }

    $lastNews = $this->newsModel->getLastNews();

    $this->offset = $page * $this->countItemsPage - $this->countItemsPage;

    $newsList = $this->newsModel->getAllNews($this->countItemsPage, $this->offset);

    foreach ($newsList as &$news) {
      $news['date'] = str_replace('-', '.', explode(' ', $news['date'])[0]);
    }
    unset($news);
    require_once __DIR__ . '/../Views/PageListNews.php';
  }

  public function showDetailPage($id)
  {

    $news = $this->newsModel->getNewsById((int) $id);
    $news['date'] = str_replace('-', '.', explode(' ', $news['date'])[0]);
    $breadCrumbs = [
      ['title' => 'Главная', 'url' => '/news/'],
      ['title' => $news['title'], 'url' => '/news/' . (string) $news['id']]
    ];
    require_once __DIR__ . '/../Views/PageDetailNews.php';

  }

  public function redirectToFirstPage()
  {
    header("Location: /news/page-1/");
  }

}