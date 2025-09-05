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

        $args = [
            'lastNews' => $lastNews,
        ];
        
        $this->render('home/home', $args);
    }

}