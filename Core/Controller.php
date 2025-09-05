<?php

namespace Core;
use App\Models\NewsModel;
use Core\Application;

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
        require_once Application::basePathToTemplate('pageNotFound');
        http_response_code(404);
    }

    public function render($template, $args)
    {
        extract($args);

        ob_start();
        include Application::basePathToTemplate($template);
        $content = ob_get_clean();

        require_once Application::basePathToTemplate('layout');
    }
}