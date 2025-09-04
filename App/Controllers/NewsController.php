<?php

namespace App\Controllers;

use App\Models\NewsModel;
use Core\Controller;
use App\Routes\NewsRouter;

class NewsController extends Controller
{
    private $offset;

    public $test = 1;

    public function showListNews($page)
    {

        $page = (int) $page;

        if ($this->isNotCorrectPage($page))
        {
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

        ob_start();

        include __DIR__ . '/../../Views/BannerView.phtml';
        include __DIR__ . '/../../Views/ListNews.phtml';

        $content = ob_get_clean();

        require_once __DIR__ . '/../Layout/LayoutView.php';
    }

    public function showDetailPage($id)
    {
        $id = (int) $id;

        if ($this->isNotCorrectId($id)) 
        {
            $this->showPageNotFount();
            return;
        }

        $news = $this->newsModel->getNewsById((int) $id);

        $news['date'] = str_replace('-', '.', explode(' ', $news['date'])[0]);

        $breadCrumbs = [
            ['title' => 'Главная', 'url' => '/news/'],
            ['title' => $news['title'], 'url' => '/news/' . (string) $news['id']]
        ];

        ob_start();

        include __DIR__ . '/../../Views/DetailView.phtml';

        $content = ob_get_clean();

        require_once __DIR__ . '/../Layout/LayoutView.php';

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