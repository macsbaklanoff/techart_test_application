<?php

require_once 'app/models/NewsModel.php';

class NewsController {

  public $count_items_page = 4;
  public $total_news;

    public function show_news() {
    $id = $_GET["id"];
    $model = new NewsModel();
    $this->total_news = $model->getCountNews();

    $news = $model->getNewsById((int)$id);

    $bread_crumbs = [
      ['title' => 'Главная', 'url'=> '/home?page=1'],
      ['title' => $news['title'], 'url' => 'home/news?id=' . (string)$news['id']]
    ];
    $news['announce'] = substr($news['announce'],3, -4);
    // $news['content'] = substr($news['content'],3, -4);
    preg_match_all('/<p[^>]*>.*?<\/p>/', $news['content'],$matches);
    $paragraphs = $matches[0];
    
    $news['date'] = str_replace('-', '.',explode(' ', $news['date'])[0]);

    if ($this->isAjaxRequest()) {
        ob_start();
        include __DIR__ . '/../views/NewsView.php';
        $html = ob_get_clean();
        
        header('Content-Type: application/json');
        echo json_encode(['html' => $html]);
      exit;
    }
    require_once __DIR__ . '/../views/FullNewsDetailView.php';
  }

  private function isAjaxRequest(): bool {
    return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
           strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}
}