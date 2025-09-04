<?php

namespace App\Controllers;

use App\Models\NewsModel;
use Core\Controller;
use App\Routes\NewsRouter;

class NewsController extends Controller
{
    private $offset;

    public $lastNews;

    public $page;

    public $newsList;

    public $id;

    public $news;

    public $breadCrumbs;

    public function showListNews($page)
    {

        $this->page = (int) $page;

        if ($this->isNotCorrectPage($page)) {
            $this->showPageNotFount();
            return;
        }

        $this->lastNews = $this->newsModel->getLastNews();

        $this->offset = $page * $this->countItemsPage - $this->countItemsPage;

        $this->newsList = $this->newsModel->getAllNews($this->countItemsPage, $this->offset);

        foreach ($this->newsList as &$news) {
            $news['date'] = str_replace('-', '.', explode(' ', $news['date'])[0]);
        }
        unset($news);

        $this->render('/../../Views/ListNews.phtml');
    }

    public function showDetailPage($id)
    {
        $this->id = (int) $id;

        if ($this->isNotCorrectId($id)) {
            $this->showPageNotFount();
            return;
        }

        $this->news = $this->newsModel->getNewsById((int) $id);

        $this->news['date'] = str_replace('-', '.', explode(' ', $this->news['date'])[0]);

        $this->breadCrumbs = [
            ['title' => 'Главная', 'url' => '/news/'],
            ['title' => $this->news['title'], 'url' => '/news/' . (string) $this->news['id']]
        ];

        $this->render('/../../Views/DetailView.phtml');
    }

    private function render($template)
    {
        ob_start();
        //extract
        include __DIR__ . $template; //имя шаблона без php

        $content = ob_get_clean();
        
        require_once __DIR__ . '/../../Layout/LayoutView.php';
    }

    private function isNotCorrectPage($page)
    {
        return $page > ceil($this->totalCountNews / $this->countItemsPage) || $page < 1;
    }

    private function isNotCorrectId($id)
    {
        return $id < 1 || $id > $this->totalCountNews;
    }
}