<?php

namespace App\Controllers;

use App\Models\NewsModel;

class NewsController {

  public $countItemsPage = 4;
  public $totalNews;

    public function showNews() {
    $id = $_GET["id"];
    $model = new NewsModel();
    $this->totalNews = $model->getCountNews();
    
    if ($id > $this->totalNews || !is_numeric($id)) {
      require_once 'App/Views/PageNotFound.php';
      return;
    }

    $news = $model->getNewsById((int)$id);

    $breadCrumbs = [
      ['title' => 'Главная', 'url'=> '/home?page=1'],
      ['title' => $news['title'], 'url' => 'home/news?id=' . (string)$news['id']]
    ];
    $news['announce'] = substr($news['announce'],3, -4);
    preg_match_all('/<p[^>]*>.*?<\/p>/', $news['content'],$matches);
    $paragraphs = $matches[0];
    
    $news['date'] = str_replace('-', '.',explode(' ', $news['date'])[0]);

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

  private function isAjaxRequest(): bool {
    return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
           strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}
}