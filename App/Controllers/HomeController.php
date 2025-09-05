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

        include Application::basePathToTemplate('home/home');

        $content = ob_get_clean();

        require_once Application::basePathToTemplate('layout');
    }

}