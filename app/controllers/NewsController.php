<?php

require_once 'app/models/NewsModel.php';

class NewsController {
  public function show_news() {
    $id = $_GET["id"];

    $model = new NewsModel();

    $news = $model->getNewsById((int)$id);

    $news['announce'] = substr($news['announce'],3, -4);
    $news['content'] = substr($news['content'],3, -4);
    $news['date'] = str_replace('-', '.',explode(' ', $news['date'])[0]);

    if ($this->isAjaxRequest()) {
        ob_start();
        include __DIR__ . '/../views/NewsView.php';
        $html = ob_get_clean();
        
        header('Content-Type: application/json');
        echo json_encode(['html' => $html]);
      exit;
    }
    require_once __DIR__ . '/../views/TemplateView.php';
  }

  private function multiexplode ($delimiters,$string) {

    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}

  private function isAjaxRequest(): bool {
    return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
           strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}
}