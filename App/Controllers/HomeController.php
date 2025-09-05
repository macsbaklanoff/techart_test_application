<?php

namespace App\Controllers;

use App\Models\NewsModel;
use Core\Controller;
use Core\Application;

class HomeController extends Controller
{

    public $newsList;

    public $countItemsPage = 4;

    public $offset = 0;

    public function showHome(): void
    {
        $lastNews = $this->newsModel->getLastNews();

        ob_start();

        include Application::basePath('home/home');
        // include __DIR__ . '/../../Templates/Home/home.phtml';

        $content = ob_get_clean();

        require_once Application::basePath('layout');
        // require_once __DIR__ . '/../../Templates/layout.php';
    }

}