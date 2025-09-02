<?php

namespace App\Controllers;

use App\Models\NewsModel;

class DetailNewsController {

  public $countItemsPage = 4;
  public $totalNews;

  public function showDetailNews()
  {
    if (!isset($_GET["id"])) {
      http_response_code(404);
      return;
    }
    $id = $_GET["id"];
    $model = new NewsModel();
    $this->totalNews = $model->getCountNews();

    $queryString = $_SERVER['QUERY_STRING'];
    $param = explode('=', $queryString);

    if (!is_numeric($id) || count($param) < 2 || $id > $this->totalNews || $id < 1 || $param[0] != 'id') {
      require_once 'App/Views/PageNotFound.php';
      http_response_code(404);
      return;
    }

    $news = $model->getNewsById((int) $id);

    $breadCrumbs = [
      ['title' => 'Главная', 'url' => '/home?page=1'],
      ['title' => $news['title'], 'url' => 'home/news?id=' . (string) $news['id']]
    ];

    $news['date'] = str_replace('-', '.', explode(' ', $news['date'])[0]);

    if ($this->isAjaxRequest()) {
      ob_start();
      include __DIR__ . '/../Views/NewsView.php';
      $html = ob_get_clean();

      header('Content-Type: application/json');
      echo json_encode(['html' => $html]);
      exit;
    }
    require_once __DIR__ . '/../Views/FullNewsDetailView.php';
  }

  private function isAjaxRequest(): bool
  {
    return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
      strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
  }

}