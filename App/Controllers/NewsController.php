<?php

namespace App\Controllers;

use App\Models\NewsModel;
use Core\Controller;
use App\Routes\NewsRouter;

class NewsController extends Controller
{
    private $offset;

    public function showListNews($page)
    {

        $page = (int) $page;

        if ($this->isNotCorrectPage($page)) {
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

        $args = [
            'page' => $page,
            'lastNews' => $lastNews, 
            'newsList' => $newsList,
        ];

        $this->render('/../../Views/ListNews.phtml', $args);
    }

    public function showDetailPage($id)
    {
        $id = (int) $id;

        if ($this->isNotCorrectId($id)) {
            $this->showPageNotFount();
            return;
        }

        $news = $this->newsModel->getNewsById((int) $id);

        $news['date'] = str_replace('-', '.', explode(' ', $news['date'])[0]);

        $breadCrumbs = [
            ['title' => 'Главная', 'url' => '/news/'],
            ['title' => $news['title'], 'url' => '/news/' . (string) $news['id']]
        ];

        $args = [
            'id' => $id,
            'news' => $news,
            'breadCrumbs' => $breadCrumbs,
        ];

        $this->render('/../../Views/DetailView.phtml', $args);
    }

    private function render($template, $args)
    {
        ob_start();
        
        extract($args);

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