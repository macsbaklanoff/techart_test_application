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

  public function showHome(): void
  {
    $newsModel = new NewsModel();
    // $totalNews = $newsModel->getCountNews();
    // $queryString = $_SERVER['QUERY_STRING'];
    // $param = explode('=', $queryString);
    // if (count($param) < 2 || !is_numeric($param[1]) || (int) $param[1] < 1 || $param[1] > ceil($totalNews / $param[1]) + 1 || $param[0] != 'page') {
    //   require_once 'App/Views/PageNotFound.php';
    //   http_response_code(404);
    //   return;
    // }

    // $this->paginationData();

    // $newsList = $newsModel->getAllNews($this->countItemsPage, $this->offset);
    $lastNews = $newsModel->getLastNews();

    // foreach ($newsList as &$news) {
    //   $news['date'] = str_replace('-', '.', explode(' ', $news['date'])[0]);
    // }
    // unset($news);
    // var_dump('show Home');
    require_once __DIR__ . '/../Views/TemplateView.php';
  }

  public function showPageNotFount() {
    var_dump('pageNotFound');
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