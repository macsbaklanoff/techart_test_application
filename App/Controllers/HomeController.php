<?php

namespace App\Controllers;

use App\Models\NewsModel;

class HomeController
{

  public $newsList;

  public $currentPage = 1;
  public $countItemsPage = 4;
  public $offset = 0;
  public $lastNews;

  public $totalNews;

  public function index(): void
  {
    $newsModel = new NewsModel();
    $totalNews = $newsModel->getCountNews();
    $queryString = $_SERVER['QUERY_STRING'];
    $param = explode('=', $queryString);
    if (!is_numeric($param[1]) || $param[1] > ceil($totalNews / $param[1]) + 1) {
      require_once 'App/Views/PageNotFound.php';
      return;
    }

    $this->paginationData();

    $newsList = $newsModel->getAllNews($this->countItemsPage, $this->offset);
    $lastNews = $newsModel->getLastNews();
    $lastNews['announce'] = substr($lastNews['announce'], 3, -4);
    $lastNews['content'] = substr($lastNews['content'], 3, -4);

    foreach ($newsList as &$news) {
      $news['announce'] = substr($news['announce'], 3, -4);
      $news['content'] = substr($news['content'], 3, -4);
      $news['date'] = str_replace('-', '.', explode(' ', $news['date'])[0]);
    }
    unset($news);
    require_once __DIR__ . '/../Views/TemplateView.php';
  }
  public function redirectToHome()
  {
    header("Location: /home?page={$this->currentPage}");
  }
  private function paginationData()
  {
    $this->currentPage = (int) $_GET["page"];
    if ($this->currentPage == 1)
      return;
    $this->offset = $this->currentPage * $this->countItemsPage - $this->countItemsPage;
  }
}