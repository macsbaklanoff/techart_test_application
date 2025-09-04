<?php

namespace App\Controllers;

use App\Models\NewsModel;
use Core\Controller;

class HomeController extends Controller
{

    public $newsList;

    public $countItemsPage = 4;

    public $offset = 0;

    public $lastNews;

    public function showHome(): void
    {
        $lastNews = $this->newsModel->getLastNews();
        
        ob_start();

        include __DIR__ . '/../../Views/BannerView.phtml';
        include __DIR__ . '/../../Views/HomeView.phtml';

        $content = ob_get_clean();

        require_once __DIR__ . '/../Layout/LayoutView.php';
        // require_once __DIR__ . '/../Views/PageHomeView.php';
    }

}