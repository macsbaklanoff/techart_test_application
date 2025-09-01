<?php

namespace App\Controllers\HomeController;

use App\Models\NewsModel;

// require_once 'app/models/NewsModel.php';

class HomeController {

  public $news_list;

  public $current_page = 1;
  public $count_items_page = 4;
  public $offset = 0;
  public $last_news;

  public $total_news;

  public function index(): void {
    $news_model = new NewsModel();
    $total_news = $news_model->getCountNews();
    $query_string = $_SERVER['QUERY_STRING'];
    $param = explode('=', $query_string);
    if (!is_numeric($param[1]) || $param[1] > ceil($total_news / $param[1]) + 1) {
      require_once 'app/views/PageNotFound.php';
      return;
    }

    $this->paginationData();

    $news_list = $news_model->getAllNews($this->count_items_page, $this->offset);
    $last_news = $news_model->getLastNews();
    $last_news['announce'] = substr($last_news['announce'],3, -4);
    $last_news['content'] = substr($last_news['content'],3, -4);

    foreach ($news_list as &$news) {
      $news['announce'] = substr($news['announce'],3, -4);
      $news['content'] = substr($news['content'],3, -4);
      $news['date'] = str_replace('-', '.',explode(' ', $news['date'])[0]);
    }
    unset($news); 
    require_once __DIR__ . '/../views/TemplateView.php';
    }
  public function redirectToHome() {
    header("Location: /home?page={$this->current_page}");
  }
  private function paginationData() {
    $this->current_page = (int)$_GET["page"];
    if ($this->current_page == 1) return;
    $this->offset = $this->current_page * $this->count_items_page - $this->count_items_page;
  }

}