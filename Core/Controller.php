<?php

namespace Core;
use App\Models\NewsModel;


class Controller
{
    public $countItemsPage = 4;

    public $totalCountNews;

    protected $newsModel;

    public function __construct()
    {
        $this->newsModel = new NewsModel();
        $this->totalCountNews = $this->newsModel->getCountNews();
    }

    public function showPageNotFount()
    {
        require_once __DIR__ . '/../Views/PageNotFound.phtml';
        http_response_code(404);
    }

    public function render($template, $args) {
        {
        $pathToFile = '/../Templates/';
        $ext = '.phtml';

        $fullPath = $pathToFile . $template . $ext;
        
        extract($args);

        ob_start();
        include __DIR__ . $fullPath; //имя шаблона без php
        $content = ob_get_clean();
        
        require_once __DIR__ . '/../Layout/layoutView.php';
    }
    }

}