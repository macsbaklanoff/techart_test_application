<?php

namespace App\Controllers;

use App\Models\NewsModel;
use Core\Controller;

class NewsController extends Controller
{
    // public $current = ' current';

    private $offset;

    public function showListNews($page)
    {
        $page = (int) $page;

        if ($page > ceil($this->totalCountNews / $this->countItemsPage) || $page < 1) {
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
        $id = (int) $id;

        if ($id < 1) {
            $this->showPageNotFount();
            return;
        }
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